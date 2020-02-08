<div class="container">
  <div class="row">
    <div class="card shadow p-3 mb-5 bg-white rounded">

      <div class="card-body">
        <h5 class="card-title text-center">Rincian Kegiatan</h5>
        <div class="table-responsive-sm mt-1">
          <table class="table table-sm">
            <tr>
              <th>Jenis Layanan</th>
              <td id="detilNama"><b>{{$activity->service->name}}</b></td>
            </tr>
            <tr>
              <th>Kegiatan</th>
              <td id="detilRating">{{$activity->name}}</td>
            </tr>
            <tr>
              <th>Biaya</th>
              @php
              $hasil_rupiah = "Rp " . number_format($activity->harga,2,',','.')
              @endphp
              <td id="detilKampus">{{$hasil_rupiah}}</td>
            </tr>
            <tr>
              <th>Keterangan</th>
              <td id="detilJurusan">{{$activity->keterangan}}</td>
            </tr>

          </table>
        </div>

        <h5 class="card-title text-center">Rincian Pilihan Asdos</h5>
        <div class="text-center">
          <img src="{{$asdos->archive->image_name}}" class="rounded" alt="Foto Asdos">
        </div>
        <div class="table-responsive-sm mt-1">
          <table class="table table-sm">
            <tr>
              <th>Nama</th>
              <td id="detilNama"><b>{{$asdos->name}}</b></td>
            </tr>
            <tr>
              <th>Rating</th>
              <td id="detilRating">Masih Sample</td>
            </tr>
            <tr>
              <th>Gender</th>
              <td id="detilKampus">{{$asdos->detail->gender}}</td>
            </tr>
            <tr>
              <th>Kampus</th>
              <td id="detilJurusan">{{$kampus->kampus}}</td>
            </tr>
            <tr>
              <th>Jurusan</th>
              <td id="detilJurusan">{{$asdos->detail->jurusan}}</td>
            </tr>
            <tr>
              <th>Semester</th>
              <td id="detilJurusan">{{$asdos->detail->semester}}</td>
            </tr>
          </table>
        </div>
        <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
      <div class="card-footer text-muted">
        2 days ago
      </div>
    </div>
  </div>
</div>
</div>