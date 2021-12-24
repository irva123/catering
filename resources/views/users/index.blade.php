<table class="table table-responsive table-striped">
 <thead>
 <tr>
 <th>Username</th> 
 <th>Name</th>
 <th>Email</th>
 <th>Role</th>
 <th>Action</th>
 </tr>
 </thead>
 <tbody>
 @foreach($user as $u)
 <tr>
 <td>{{ $u->username }}</td>
 <td>{{ $u->name }}</td>
 <td>{{ $u->email }}</td>
 <td>{{ $u->role }}</td>
 <td>
 <form action="/users/{{$u->id}}" method="post">
 <a href="/users/{{$u->id}}" class="btn btn-success">Show</a>
 <a href="/users/{{$u->id}}/edit" class="btn btn-warning">Edit</a>
 @csrf
 @method('DELETE')
 <button type="submit" name="delete" class="btn 
btn-danger">Delete</button>
 </form>
 </td>
 </tr>
 @endforeach
 </tbody>
</table>
