<div class="container">
  @handheld
  <script>
    $(document).ready(function() {
      $('#warningmodal').modal({
        backdrop: 'static',
        keyboard: false,
        show: true,
        focus: true
      });
    });
  </script>
  @endhandheld
  <div class="row d-flex justify-content-center">
    <div class="col-sm-6">
      <div class="card shadow p-3 mb-5 bg-white rounded">

        <div class="card-body">
          @if ($message = Session::get('success'))
          <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
          </div>
          @endif
          <h5 class="card-title text-center">Ubah Pesanan #<b>{{$transaction->id}}</b> milik ({{$dosen->name}})</h5>
          <dl class="row">
            <dt class="col-sm-3 border-top">Kontak Dosen</dt>
            <dd class="col-sm-9 border-top" id="kontakdosen">{{$dosen->wa}}</dd>

            <dt class="col-sm-3 border-top">Jenis Kegiatan</dt>
            <dd class="col-sm-9 border-top" id="jenisKegiatan"><b>{{$activity->service->name}} ({{$activity->name}})</b></dd>
            @php
            function convert($val){
            $val = "Rp " . number_format($val,2,',','.');
            return $val;
            }
            @endphp


            <dt class="col-sm-3 border-top">Biaya Satuan</dt>
            <dd class="col-sm-9 border-top" id="detilBiaya">{{convert($activity->harga)}} / {{$activity->satuan}}</dd>

            <dt class="col-sm-3 border-top">Keterangan</dt>
            <dd class="col-sm-9 border-top">{{$activity->keterangan}}</dd>

            <dt class="col-sm-3 border-top">Nama Asdos</dt>
            <dd class="col-sm-9 border-top">{{$asdos->name}}</dd>

            <dt class="col-sm-3 border-top">Gender</dt>
            <dd class="col-sm-9 border-top">{{$asdos->detail->gender}}</dd>

            <dt class="col-sm-3 border-top">Kampus</dt>
            <dd class="col-sm-9 border-top">{{$kampus->kampus}}</dd>

            <dt class="col-sm-3 border-top">Jurusan</dt>
            <dd class="col-sm-9 border-top">{{$asdos->detail->jurusan->name}}</dd>

            <dt class="col-sm-3 border-top">Semester</dt>
            <dd class="col-sm-9 border-top">{{$asdos->detail->semester}}</dd>

          </dl>

          <h5 class="card-title text-center">Rincian Pemesanan</h5>
          <form method="POST" name="orderForm" action="{{route('savechangedtransaction')}}">
            @csrf
            <div class="form-group">
              <label for="kodeasdos">Kode Asdos</label>
              <input required type="text" value="{{$transaction->asdos}}" class="form-control @error('kodeasdos') is-invalid @enderror" id="kodeasdos" aria-describedby="kodeasdoshelp" name="kodeasdos">
              @error('kodeasdos')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
              <small id="kodeasdoshelp" class="form-text text-muted">Masukan kode Asdos berupa angka.<br>
                @if(isset($filter->url))
                <div class="row ml-1">
                  <a href="{{$filter->url}}"><i class="far fa-edit float-sm-left"></i> Cari Dengan Kriteria</a>
                </div>
                @endif
                <div class="row ml-1"><a href="{{route('filterbyactivity',$transaction->activity_id)}}"><i class="far fa-edit float-sm-left"></i> Cari Berdasarkan Kegiatan.</a>
                </div>
                <div class="row ml-1"><a href="{{route('changetransaction',$transaction->id)}}"><i class="far fa-edit float-sm-left"></i> Lihat Seluruh Asdos</a>
                </div>
              </small>
            </div>


            <div class="form-group">
              <label for="biaya">Biaya</label>
              <input required type="text" value="{{$transaction->biaya}}" class="form-control @error('biaya') is-invalid @enderror" id="biaya" aria-describedby="biayahelp" name="biaya">
              @error('biaya')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
              <small id="biayahelp" class="form-text text-muted">Total biaya (belum dikurangi diskon)</small>
            </div>

            <div class="form-group">
              <label for="diskon">Diskon</label>
              <input required type="text" value="{{$transaction->total_discount}}" class="form-control @error('diskon') is-invalid @enderror" id="diskon" aria-describedby="diskonhelp" name="diskon">
              @error('diskon')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
              <small id="diskonhelp" class="form-text text-muted">Besaran yang akan mengurangi total biaya.</small>
            </div>

            <div class="form-group">
              <label for="keterangan">Rincian Tugas yang Akan Dikerjakan</label>
              <textarea required aria-describedby="keteranganHelp" placeholder="mis : Asisten nantinya akan membantu pemerisakaan nilai mahasiswa, dsb " name="keterangan" class="form-control @error('dateSampai') is-invalid @enderror" id="keterangan" rows="5">{{$transaction->keterangan}}</textarea>
              @error('keterangan')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
              <small id="keteranganHelp" class="form-text text-muted">Keterangan harap ditulis selengkap mungkin.</small>
            </div>
            <input type="hidden" name="id" value="{{$transaction->id}}">
            <button data-toggle="modal" data-target="#exampleModal" type="button" class="btn btn-primary btn-lg btn-block">Simpan Perubahan</button>
        </div>
        </form>
      </div>
    </div>
  </div>
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

  <div class="modal fade" id="warningmodal" tabindex="-1" role="dialog" aria-labelledby="warningmodaltitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="warningmodaltitle">Informasi</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Anda mengakses halaman ini melalui perangkat smartphone/tablet. Jika ada teks terpotong, rotasikan gadget Anda menjadi <b>landscape</b> untuk hasil yang lebih optimal.
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
  </div>

</div>
</div>
<div class="modal fade" id="discountdialog" tabindex="-1" role="dialog" aria-labelledby="discounttitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="discounttitle">Kode Diskon</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div class="form-group">
          <label for="discountinput">Masukkan kode diskon :</label>
          <input required type="text" class="form-control" id="discountinput" aria-describedby="discounthelp" placeholder="Misal : ASDOSKU123">
          <small id="discounthelp" class="form-text text-muted">Huruf kapital tidak berpengaruh.</small>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="button" onclick="discount();" data-dismiss="modal" class="btn btn-success">Cek Diskon</button>
        <script>
          function discount() {
            var url = "{{route('discount')}}";
            url = url.concat("/").concat($("#discountinput").val());
            axios.get(url)
              .then(function(response) {
                // handle success
                var totaldiscount = response.data.discount * $("#biayacontent").text();
                //console.log(response.data.discount);
                console.log(response);
                $("#discountsuccess").removeAttr("hidden");
                $("#discountsuccess").text("Kode voucher ".concat(response.data.code).concat(" berhasil digunakan. Anda mendapat potongan harga sebesar Rp. ").concat(totaldiscount));
                $("#discountbtnbasic").remove();
                $("#discounthelp").remove();
                $("#discountcode").val(response.data.id);
                update($("#biayacontent").text(), totaldiscount);
              })
              .catch(function(error) {
                // handle error
                console.log(error);
                Toastify({
                  text: "Maaf, kode voucher tidak bisa digunakan.",
                  duration: 3000,
                  newWindow: true,
                  close: true,
                  gravity: "bottom", // `top` or `bottom`
                  position: 'center', // `left`, `center` or `right`
                  backgroundColor: "linear-gradient(to right, #ff416c, #ff4b2b)",

                }).showToast();
              })
              .then(function() {
                // always executed
              });

          }
        </script>
      </div>
    </div>
  </div>
</div>