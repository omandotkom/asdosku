
<div class="container">
  <div class="row">
    <div class="col-sm-6">
      <div class="card shadow p-3 mb-5 bg-white rounded">

        <div class="card-body">
          <h5 class="card-title text-center">Rincian Kegiatan dan Asdos</h5>

          <div class="text-center">
            <img src="{{$asdos->archive->image_name}}" class="img-thumbnail img-fluid shadow p-3 mb-5 bg-white rounded" alt="Foto Asdos">
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
                function convert($val){
                $val = "Rp " . number_format($val,2,',','.');
                return $val;
                }
                @endphp
                <th>Biaya Satuan</th>
                <td id="detilBiaya">{{convert($activity->harga)}} / {{$activity->satuan}}</td>

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
                <td id="detilRating">@if(isset($rating)) {{$rating->rating}} @else - @endif</td>
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
                <td id="detilJurusan">{{$asdos->detail->jurusan->name}}</td>
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
            <script>
              function update(total, discount) {

                var result = total - discount;

                $("#biayacontent").text(result);
              }
            </script>
            @if(strtolower($activity->satuan) != "orang")

            <script>
              $(document).ready(function() {
                function calculateTotal(qty) {
                  var result = qty * "{{$activity->harga}}";

                  $("#biayacontent").text(result);
                }

                $("#orderqty").val("1");
                calculateTotal($("#orderqty").val());
                $("#orderqty").change(function() {
                  //alert($(this).val());
                  calculateTotal($(this).val());
                });
              });
            </script>
            <label for="orderqty">Jumlah {{$activity->satuan}}</label>
            <div class="input-group mb-3">
              <input required type="number" placeholder="Misal : 3" min="1" value="1" class="form-control" id="orderqty" aria-describedby="orderqtyhelp" name="orderqty">
              <div class="input-group-prepend">
                <label class="input-group-text" for="orderqty">{{$activity->satuan}}</label>
              </div>
            </div>
            @endif
            <div class="form-group">
              <label for="dateDari">Tanggal Tugas</label>
              <input required type="date" class="form-control @error('dateDari') is-invalid @enderror" id="dateDari" aria-describedby="dateDariHelp" name="dateDari">
              @error('dateDari')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
              <small id="dateDariHelp" class="form-text text-muted">Tanggal perkiraan asisten yang dipilih mulai bertugas.</small>
            </div>
            <div class="form-group">
              <label for="dateSampai">Tanggal Selesai</label>
              <input required type="date" class="form-control @error('dateSampai') is-invalid @enderror" id="dateSampai" aria-describedby="dateSelesaiHelp" name="dateSampai">
              @error('dateSampai')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
              <small id="dateSelesaiHelp" class="form-text text-muted">Tanggal perkiraan asisten yang dipilih selesai bertugas.</small>
            </div>
            <div class="form-group">
              <label for="keterangan">Rincian Tugas yang Akan Dikerjakan</label>
              <textarea required aria-describedby="keteranganHelp" placeholder="mis : Asisten nantinya akan membantu pemerisakaan nilai mahasiswa, dsb " name="keterangan" class="form-control @error('dateSampai') is-invalid @enderror" id="keterangan" rows="5"></textarea>
              @error('keterangan')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
              <small id="keteranganHelp" class="form-text text-muted">Keterangan harap ditulis selengkap mungkin.</small>
            </div>

            <div class="form-group">
              <div hidden id="discountsuccess" class="alert alert-success" role="alert">
                </div>
                <input type="hidden" id="discountcode" name="discountcode" value="0">
              
              <button type="button" id="discountbtnbasic" data-toggle="modal" data-target="#discountdialog" class="btn btn-sm btn-success">Punya Kode Diskon ?</button>
              <small id="discounthelp" class="form-text text-muted">Klik tombol di atas apabila Punya kode diskon.</small>
            </div>


            <div class="form-group">
              <label for="biaya">Perkiraan Biaya</label>
              @if(strtolower($activity->satuan)!= "orang")
              <label aria-describedby="biayahelp" id="biaya">Rp. <label id="biayacontent"></label></label>
              @else
              <label aria-describedby="biayahelp" id="biaya">Rp. <label id="biayacontent">{{$activity->harga}}</label></label>
              @endif
              <small id="biayahelp" class="form-text text-muted">*Biaya tersebut adalah biaya dasar belum termasuk biaya tambahan seperti print, beli pulpen, dll (jika ada).</small>
            </div>
            <button data-toggle="modal" data-target="#exampleModal" type="button" class="btn btn-primary btn-lg btn-block">Lanjutkan Pemesanan</button>
        </div>
        </form>
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