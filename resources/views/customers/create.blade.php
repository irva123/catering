<form action="/customers" method="post"> @csrf
<div class="form-group">
<label for="nim">Nama Lengkap</label>
<input type="text" class="form-control" required="required" name="nama_lengkap"></br>
</div>
<div class="form-group">
<label for="name">Alamat</label>
<input type="text" class="form-control" required="required" name="alamat"></br>
</div>
<div class="form-group">
<label for="name">No Handphone</label>
<input type="text" class="form-control" required="required" name="no_handphone"></br>
</div>
<div class="form-group">
<label for="name">Tanggal Pemesanan</label>
<input type="text" class="form-control" required="required" name="tanggal_pemesanan"></br>
</div>
<button type="submit" name="add" class="btn btn-primary float-right">Add Data</button>
</form>