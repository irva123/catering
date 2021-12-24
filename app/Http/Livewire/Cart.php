<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Haruncpi\laravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use DB;

use App\Models\Product as ProductModel; 
use App\Models\Transaction; 
use App\Models\ProductTransaction; 

class Cart extends Component
{

    public $tax = "0%";
    public function render()
    {
        $products = ProductModel::orderBy('created_at', 'DESC')->get();
        
        $condition = new \Darryldecode\Cart\CartCondition([
            'name' => 'pajak',
            'type' => 'tax',
            'target' => 'total',
            'value' => $this->tax,
            'order' => 1
        ]);

        \Cart::session(Auth()->id())->condition($condition);
        $items = \Cart::session(Auth()->id())->getContent()->sortBy(function($cart){
            return $cart->attributes->get('added_at');
        });

        if(\Cart::isEmpty()){
            $cartData = [];
        }else{
            foreach($items as $item){
                $cart[] = [
                'rowId' => $item->id,
                'name' => $item->name,
                'qty' => $item->quantity,
                'pricesingle' => $item->price,
                'price' => $item->getPriceSum(),
                ];
            }

            $cartData = collect($cart);
        }

        $sub_total = \Cart::session(Auth()->id())->getSubTotal();
        $total = \Cart::session(Auth()->id())->getTotal();

        $newCondition = \Cart::session(Auth()->id())->getCondition('pajak');
        $pajak = $newCondition->getCalculatedValue($sub_total);

        $summary = [
            'sub_total' => $sub_total,
            'pajak' => $pajak,
            'total' =>$total
        ];
        return view('livewire.cart',[
            'products' => $products,
            'carts' => $cartData,
            'summary' => $summary
        ]);
    }
    public function addItem($id){
        $rowId= "Cart".$id;
        $cart = \Cart::session(Auth()->id())->getContent();
        $cekItemId = $cart->whereIn('id', $rowId);

        if($cekItemId->isNotEmpty()){
            \Cart::session(Auth()->id())->update($rowId, [
                'quantity'=>[
                    'relative' => true,
                    'value' => 1
                ]
                ]);
        }else{
            $product = ProductModel::findOrFail($id);
            \cart::session(Auth()->id())->add([
                'id' => "Cart".$product->id,
                'name' => $product->nama,
                'price' => $product->harga,
                'quantity' => 1,
                'attributes' => [
                'added_at' => Carbon::now()
                ],
            ]);
        }
    }
    public function enableTax(){
        $this->tax ="10%";
    }
    public function disableTax(){
        $this->tax ="0%";
    }
    public function increaseItem($rowId){
        $idProduct = substr($rowId, 4,5);
        $product = ProductModel::find($idProduct);

        $cart = \Cart::session(Auth()->id())->getContent();

        $checkItem = $cart->whereIn('id', $rowId);
        
        if($product->jumlah == $checkItem[$rowId]->quantity){
            session()->flash('error', 'Jumlah item kurang');
        }else{
        \Cart::session(Auth()->id())->update($rowId, [
            'quantity'=>[
                'relative' => true,
                'value' => 1
            ]
        ]);
    }
}    

    public function decreaseItem($rowId){
        $idProduct = substr($rowId, 4,5);
        $product = ProductModel::find($idProduct);

        $cart = \Cart::session(Auth()->id())->getContent();

        $checkItem = $cart->whereIn('id', $rowId);
        if($checkItem[$rowId]->quantity == 1){
            $this->removeItem($rowId);
        }else{
        \Cart::session(Auth()->id())->update($rowId, [
            'quantity'=>[
                'relative' => true,
                'value' => -1
            ]
        ]);
    }
}
    public function removeItem($rowId){
        \Cart::session(Auth()->id())->remove($rowId);
}

    public function checkout(){
        $cartTotal= \Cart::session(Auth()->id())->getTotal();

        if($cartTotal >= 0){
            DB::beginTransaction();

            try{
                $allCart = \Cart::session(Auth()->id())->getContent();

                $filterCart = $allCart->map(function($item){
                    return[
                        'id' => substr($item->id, 4,5 ),
                        'quantity' => $item->quantity
                    ];
                });

                foreach($filterCart as $cart){
                    $product = ProductModel::find($cart['id']);

                    if($product->jumlah===0){
                        return session()->flash('error', 'Jumlah item kurang');
                    }

                    $product->decrement('jumlah', $cart['quantity']);
                }

                $id = IdGenerator::generate([
                    'table' => 'transaction',
                    'length' =>10,
                    'prefix' => 'PK-',
                    'field' =>'invoice_number'
                ]);

                Transaction::create([
                    'invoice_number' => $id,
                    'user_id' => Auth()->id(),
                    'total' => $cartTotal
                ]);

                foreach ($filterCart as $cart){
                    ProductTransaction::create([
                        'product_id' => $cart['id'],
                        'invoice_number' => $id,
                        'qty' => $cart['quantity']
                    ]);
                }

                \Cart::session(Auth()->id())->clear();




            DB::commit();
            } catch(\Throwable $th){
                DB::rollback();
                return session()->flash('error', $th);
            }

        }
    }
}


