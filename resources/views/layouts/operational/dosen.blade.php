

<div class="row">
  <div class="table-responsive-xl">
    <table class="table table-sm table-bordered table-dark">
      <thead>
        <tr>

          <th scope="col">ID</th>
          <th scope="col">Nama</th>
          <th scope="col">Kampus</th>
          <th scope="col">WhatsApp</th>
          <th scope="col">Pengenal</th>
          <th scope="col">Email</th>
          <th scope="col">Waktu Daftar</th>
        </tr>
      </thead>
      <tbody>
        @foreach($dosenlist as $user)
        <tr>
          <td>{{ $user->id}}</td>
          <td>{{ $user->name}}</td> 
          <td>{{ $user->detail->kampus }}</td>
          <td>{{ $user->detail->wa }}</td>
          <td>{{ $user->detail->nik }}</td>
          <td>{{ $user->email }}</td>
          <td>{{ $user->created_at }}</td>
        </tr>

        @endforeach
      </tbody>
    </table>

  </div>
  {{$dosenlist->links()}}
  
</div>
</div>