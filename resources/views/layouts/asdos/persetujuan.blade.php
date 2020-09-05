<div class="row">
  <div class="table-responsive-xl">
    <table class="table table-bordered table-dark">
      <thead>
        <tr>

          <th scope="col">Nama</th>
          <th scope="col">Email</th>
          <th scope="col">Gender</th>
          <th scope="col">Kampus</th>
          <th scope="col">Jurusan</th>
          <th scope="col">Semester</th>
          <th scope="col">Prefer</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach($belum_disetujui as $user)
        <tr>
          <td>{{ $user->name}}</td>
          <td>{{ $user->email }}</td>
          <td>{{ $user->detail->gender}}</td>
          <td>{{ $user->detail->kampus }}</td>
          <td>{{ $user->detail->jurusan }}</td>
          <td>{{ $user->detail->semester }}</td>
          <td>{{ $user->detail->prefer }}</td>

          <td>
            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModalCenter">Setujui</button>
            <button type="button" class="btn btn-secondary btn-sm">Tidak Disetujui</button>


          </td>
        </tr>
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Konfirmasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">

                Konfirmasi {{$user->name}} sebagai anggota Asdosku ?
              </div>
              <div class="modal-footer">
                  <input type="hidden" id="custId" name="id" value="{{ $user->id }}">

                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                  <button type="button" class="btn btn-primary" onclick="updateStatus('{{$user->id}}')">Terima</button>
                  
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </tbody>
    </table>
  </div>
<script>
  document.getElementById("judulHalaman").innerHTML = "Persetujuan";
    
  function updateStatus(id){
    var url = "{{url('/dashboard/index/hrd/persetujuan/update')}}";
    url = url.concat("/");
    url = url.concat(id);
    //console.log(url);
    window.location = url;
     }
</script>
</div>
</div>