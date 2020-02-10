<div class="container">
  <div class="row">
    <div class="col-sm-6">
      <div class="card shadow p-3 mb-5 bg-white rounded">

        <div class="card-body">
          <h5 class="card-title text-center">Rincian Kegiatan dan Asdos</h5>

          <div class="text-center">
            <img src="{{$asdos->archive->image_name}}" class="img-thumbnail shadow p-3 mb-5 bg-white rounded" alt="Foto Asdos">
          </div>
          <div class="table-responsive-sm mt-1">
            <table class="table table-sm">
              <tr class="table-success">
                <th>Jenis Kegiatan</th>
                <td id="jenisKegiatan"><b>{{$activity->service->name}}</b></td>
              </tr>
              <tr>
                <th>Kegiatan</th>
                <td id="kegiatan">{{$activity->name}}</td>
              </tr>
              <tr>
                @php
                $hasil_rupiah = "Rp " . number_format($activity->harga,2,',','.')
                @endphp
                <th>Biaya</th>
                <td id="detilBiaya">{{$hasil_rupiah}}</td>
              </tr>
              <tr>
                <th>Keterangan</th>
                <td id="detilJurusan">{{$activity->keterangan}}</td>
              </tr>
              <tr class="table-success">
                <th>Nama Asdos</th>
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
        </div>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Pemesanan</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              Apakah semua informasi sudah benar ?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Periksa Lagi</button>
              <button type="button" onclick="document.orderForm.submit();" class="btn btn-primary">Ya, Lanjutkan</button>
            </div>
          </div>
        </div>
      </div>
      <div class="card shadow p-3 mb-5 bg-white rounded">

        <div class="card-body">
          <h5 class="card-title text-center">Rincian Pemesanan</h5>
          <form method="POST" name="orderForm" action="{{route('storeTransaction',['activity' => $activity->id,'asdos' => $asdos->id])}}">
          @csrf 
          <div class="form-group">
              <label for="dateDari">Tanggal Tugas</label>
              <input required type="date" class="form-control" id="dateDari" aria-describedby="dateDariHelp" name="dateDari">
              <small id="dateDariHelp" class="form-text text-muted">Tanggal perkiraan asisten yang dipilih mulai bertugas.</small>
            </div>
            <div class="form-group">
              <label for="dateSampai">Tanggal Selesai</label>
              <input required type="date" class="form-control" id="dateSelesai" aria-describedby="dateSelesaiHelp" name="dateSampai">
              <small id="dateSelesaiHelp" class="form-text text-muted">Tanggal perkiraan asisten yang dipilih selesai bertugas.</small>
            </div>
            <div class="form-group">
              <label for="keterangan">Rincian Tugas yang Akan Dikerjakan</label>
              <textarea required aria-describedby="keteranganHelp" placeholder="mis : Asisten nantinya akan membantu pemerisakaan nilai mahasiswa, dsb " 
              name="keterangan" class="form-control" id="keterangan" rows="5"></textarea>
              <small id="keteranganHelp" class="form-text text-muted">Keterangan harap ditulis selengkap mungkin.</small>
            </div>
            <input type="hidden" id="biaya" name="biaya" value="{{$activity->harga}}">
            <button data-toggle="modal" data-target="#exampleModal" type="button" class="btn btn-primary btn-lg btn-block">Lanjutkan Pemesanan</button>
        </div>
        </form>
      </div>
    </div>
  </div>

</div>
</div>