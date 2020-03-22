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

        Konfirmasi sebagai anggota Asdosku ?
      </div>
      <div class="modal-footer">

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="button" onclick="updateStatus();" class="btn btn-primary">Terima</button>

      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="rejectmodal" tabindex="-1" role="dialog" aria-labelledby="rejectmodaltitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="rejectmodaltitle">Tolak Pengajuan Asdosku ?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        Konfirmasi bahwa asdos ini tidak disetujui sebagai Anggota asdos di Asdosku ?
      </div>
      <div class="modal-footer">

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="button" onclick="rejectStatus();" class="btn btn-danger">Tolak</button>

      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="input-group mb-3">
    <input type="text" id="namesearch" class="form-control" placeholder="Nama Depan" name="name" aria-label="Recipient's username" aria-describedby="basic-addon2">
    <div class="input-group-append">
      <button class="btn btn-success" id="cari" type="button">Cari</button>
      <button class="btn btn-primary" onclick="gotoPersetujuanView();" type="button">Semua</button>
    </div>
  </div>
</div>
<div class="row">
  <div class="table-responsive-xl">
    <table class="table table-sm table-bordered table-dark">
      <thead>
        <tr>

          <th scope="col">Nama</th>
          <th scope="col">Kontak</th>
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
          <td>
            <ul>
              <li>{{$user->email}}</li>
              <li>{{$user->detail->wa}}</li>
            </ul>
          </td>
          <td>{{ $user->detail->gender}}</td>
          <td>{{ $user->detail->kampus->name }}</td>
          <td>{{ $user->detail->jurusan->name }}</td>
          <td>{{ $user->detail->semester }}</td>
          <td>{{ $user->detail->prefer }}</td>

          <td>
            <button type="button" class="btn btn-success btn-sm" onclick="selectedID='{{$user->id}}';" data-toggle="modal" data-target="#exampleModalCenter">Setujui</button>
            <button type="button" class="btn btn-secondary btn-sm" onclick="selectedID='{{$user->id}}';" data-toggle="modal" data-target="#rejectmodal">Tidak Disetujui</button>


          </td>
        </tr>

        @endforeach
      </tbody>
    </table>

  </div>
  {{$belum_disetujui->links()}}
  <script>
    var selectedID;
    document.getElementById("judulHalaman").innerHTML = "Persetujuan";

    function updateStatus() {
      var url = "{{url('/dashboard/index/hrd/persetujuan/update')}}";
      url = url.concat("/");
      url = url.concat(selectedID);
      //console.log(url);
      window.location = url;
    }

    function rejectStatus() {
      var url = "{{route('rejectpersetujuan')}}";
      url = url.concat("/");
      url = url.concat(selectedID);
      window.location = url;
    }

    $(document).ready(function() {
      $("#cari").click(function() {
        var keyword = $("#namesearch").val();
        var searchurl = "{{route('viewpersetujuanbyname')}}";
        searchurl = searchurl.concat("/").concat(keyword);
        window.location = searchurl;

      });
    });

    function gotoPersetujuanView() {
      window.location = "{{ route('viewpersetujuan') }}";
    }
  </script>
</div>
</div>