

<div class="row">
  @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
  <div class="table-responsive">
    <table class="table  table-hover">
      <thead>
        <tr>

          <th scope="col">ID</th>
          <th scope="col">Nama</th>
          <th scope="col">Kampus</th>
          <th scope="col">WhatsApp</th>
          <th scope="col">Pengenal</th>
          <th scope="col">Foto KTP</th>
          <th scope="col">Email</th>
          <th scope="col">Waktu Daftar</th>
          <th scope="col">Kirim Email</th>
        </tr>
      </thead>
      <tbody>
        @foreach($dosenlist as $user)
        <tr>
          <td>{{ $user->id}}</td>
          <td>{{ $user->name}}</td> 
          <td>{{ $user->detail->kampus_dosen }}</td>
          <td>{{ $user->detail->wa }}</td>
          <td>{{ $user->detail->nik }}</td>
          <td>
            @isset($user->detail->identitas)
             <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample{{$user->id}}" aria-expanded="false" aria-controls="collapseExample">
              Lihat KTP
            </button>
            <div class="collapse" id="collapseExample{{$user->id}}">
                <div class="card card-body">
                   <img src="{{asset('storage/images/dosenidentity/245/'.$user->detail->identitas)}}"  > 
                </div>
              </div>
           
            @endif
          </td>
          <td>{{ $user->email }}</td>
          <td>{{ $user->created_at }}</td>
          <td><button type="button" class="btn btn-warning btn_email" data-toggle="modal" data-email="{{ $user->email }}" data-target="#exampleModal">
              Kirim Email
            </button>
          </td>
        </tr>

        @endforeach
      </tbody>
    </table>
    {{ $dosenlist->links() }}

  </div>
 
  
</div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('kirim-email')}}" method="post">
          @csrf
          <div class="form-group">
            <label for="exampleInputEmail1">Alamat Email</label>
            <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Mohon Tunggu Beberapa saat" aria-describedby="emailHelp" readonly="">
          </div>
           <div class="form-group">
            <label for="subject">Subject Pesan</label>
            <input type="text" class="form-control" id="subject" name="subject" placeholder="Subjek email" aria-describedby="emailHelp" >
          </div>
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Isi Pesan</label>
            <textarea class="form-control" name="message" id="exampleFormControlTextarea1" rows="5"></textarea>
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Kirim Email</button>
      </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
 $( document ).ready(function() {
  $(".btn_email").on("click",function(){
      var coba = $(this).attr("data-email");
      $("#exampleInputEmail1").val(coba);

  });
   
});
</script>