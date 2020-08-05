<div class="container">
  @handheld
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
    <div class="card shadow p-1 mb-5 bg-white rounded">

      <div class="card-body">
        <h5 class="card-title text-center">Rincian Kegiatan dan Asdos</h5>

        <div class="text-center">
          <img src="{{$asdos->archive->image_name}}" class="img-thumbnail img-fluid shadow p-3 mb-5 bg-white rounded" alt="Foto Asdos">
        </div>
        <dl class="row">

          <dt class="col-sm-3 border-top">Jenis Kegiatan </dt>
          <dd class="col-sm-9 border-top" id="jenisKegiatan"><b>{{$activity->service->name}}</b></dd>

          <dt class="col-sm-3 border-top">Kegiatan</dt>
          <dd class="col-sm-9 border-top" id="kegiatan">{{$activity->name}}</dd>
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

          <dt class="col-sm-3 border-top">Rating</dt>
          <dd class="col-sm-9 border-top">@if(isset($rating)) {{$rating->rating}} @else - @endif</dd>

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
        <form method="POST" name="orderForm" action="{{route('storeTransaction',['activity' => $activity->id,'asdos' => $asdos->id])}}">
          @csrf
          <script>
            function update(total, discount) {

              var result = total - discount;

              $("#biayacontent").text(result);
            }
          </script>
          @if($activity->multiquantity)

          <script>
            $(document).ready(function() {
              function calculateTotal(qty) {
                var result = qty * "{{$activity->harga}}";

                $("#biayacontent").text(result);
              }

              function isNormalInteger(str) {
                var n = Math.floor(Number(str));
                return n !== Infinity && String(n) === str && n >= 0;
              }

              $("#orderqty").val("1");
              calculateTotal($("#orderqty").val());
              $("#orderqty").change(function() {
                //alert($(this).val());
                calculateTotal($(this).val());
              });
              $("#orderqty").keyup(function() {
                //alert($(this).val());
                if (isNormalInteger($(this).val())) {
                  calculateTotal($(this).val());
                }

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
          @if(isset($bid))
          <div hidden class="form-group">
            <label for="bid">Kode Tawaran Pekerjaan</label>
            <input required type="text" class="form-control" value="{{$bid}}" id="bid" name="bid">
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
          <input type="hidden" value="{{$currenturl}}" name="currenturl" />

          <div class="form-group">
            <div hidden id="discountsuccess" class="alert alert-success" role="alert">
            </div>
            <input type="hidden" id="discountcode" name="discountcode" value="0">

            <button type="button" id="discountbtnbasic" data-toggle="modal" data-target="#discountdialog" class="btn btn-sm btn-success">Punya Kode Diskon ?</button>
            <small id="discounthelp" class="form-text text-muted">Klik tombol di atas apabila Punya kode diskon.</small>
          </div>

          
         
         @if($activity->service_id == 'asdoskuakademy')
          <div class="form-group">
            <label for="biaya">Perkiraan Biaya Rp {{ number_format($activity->harga,2)}}</label>
          </div>

         @else
          <div class="form-group">
            <label for="biaya">Perkiraan Biaya</label>
            @if(strtolower($activity->satuan)!= "orang")
            <label aria-describedby="biayahelp" id="biaya">Rp. <label id="biayacontent"></label></label>
            @else
            <label aria-describedby="biayahelp" id="biaya">Rp. <label id="biayacontent">{{$activity->harga}}</label></label>
            @endif
            <small id="biayahelp" class="form-text text-muted">*Biaya tersebut adalah biaya dasar belum termasuk biaya tambahan seperti print, beli pulpen, dll (jika ada).</small>
          </div>
          @endif


          <button data-toggle="modal" data-target="#exampleModal" type="button" class="btn btn-primary btn-lg btn-block">Lanjutkan Pemesanan</button>
      </div>
      </form>
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
            url = url.concat("/").concat($("#discountinput").val()).concat("/").concat($("#biayacontent").text());
            const options = {
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            };
            axios.post('{{route("discount")}}', {
                val: $("#biayacontent").text(),
                id: $("#discountinput").val(),
              }, options)
              .then(function(response) {
                // handle success
                //console.log(response.data.discount);
                console.log(response);
                $("#discountsuccess").removeAttr("hidden");
                $("#discountsuccess").text("Kode voucher ".concat(response.data.code).concat(" berhasil digunakan. Anda mendapat potongan harga sebesar Rp. ").concat(response.data.discount));
                $("#discountbtnbasic").remove();
                $("#discounthelp").remove();
                $("#discountcode").val(response.data.id);
                update($("#biayacontent").text(), response.data.discount);
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
            /*
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
            */
          }
        </script>
      </div>
    </div>
  </div>
</div>