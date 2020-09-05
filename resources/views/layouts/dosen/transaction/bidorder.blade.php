<div class="container">
  <script>
    $(document).ready(function() {

      $("#services").change(function() {
        var selectedservice = $(this).children("option:selected").val();
        if (selectedservice == "none") {
          return;
        }
        $("#services").prop("disabled", true);
        $("#activities").prop('disabled', true);
        $("#jeniskegiatanformgroup").prop('hidden', true);
        axios.get('{{route("showactivitiesbyservice")}}'.concat("/").concat(selectedservice))
          .then(function(response) {
            // handle success
            $('#activities').empty();
            $('#activities').append(`<option selected class="val" value="0"> 
                                      Pilih Jenis Kegiatan 
                                  </option>`);

            response.data.forEach(fillactivities);
            //only show when 200 ok response
            $("#jeniskegiatanformgroup").prop('hidden', false);
          })
          .catch(function(error) {
            // handle error
            console.log(error);

          })
          .then(function() {
            // always executed
            $("#services").prop("disabled", false);
            $("#activities").prop('disabled', false);

            $("#orderqtybody").prop("hidden", true);
            $("#labelorderqty").prop("hidden", true);
          });

      });
      $("#activities").change(function() {
        var selectedactivity = $(this).children("option:selected").val();

        if (selectedactivity == "none") {
          return;
        }
        $("#services").prop("disabled", true);
        $("#activities").prop('disabled', true);
        axios.get('{{route("showactivitybyid")}}'.concat("/").concat(selectedactivity))
          .then(function(response) {
            // handle success
            var satuan = response.data.satuan;
            if (response.data.multiquantity) {
              $("#orderqtybody").prop("hidden", false);
              $("#labelorderqty").prop("hidden", false);

              $("#orderqtysatuan").text(satuan);
              $("#labelorderqty").text("Perkiraan Jumlah ".concat(satuan));

            } else {
              $("#orderqtybody").prop("hidden", true);
              $("#labelorderqty").prop("hidden", true);

            }
            $("#activitynoteketerangan").text(response.data.keterangan);
            $("#activitynotebiaya").text("Rp.".concat(response.data.harga).concat(" / ").concat(response.data.satuan));
            //response.data.forEach(fillactivities);
          })
          .catch(function(error) {
            // handle error
            console.log(error);

          })
          .then(function() {
            // always executed
            $("#services").prop("disabled", false);
            $("#activities").prop('disabled', false);
          });
      });

      function submitform() {

      }

      function fillactivities(item, index) {
        $('#activities').append(`<option class="val" value="${item.id}"> 
                                       ${item.name} 
                                  </option>`);
      }
    });
  </script>
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
    <div class="card w-100 shadow p-1 mb-5 bg-white rounded">
    @if ($message = Session::get('error'))
      <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> 
        <strong>Oops, ada yang kurang</strong>, {{ $message }}
      </div>
    @endif  
      <div class="card-body">
      <span class="badge badge-warning float-right" data-toggle ="modal" data-target="#bidmodal">?</span>
      <h5 class="card-title text-center">Rincian Pekerjaan</h5>
        <form method="POST" name="orderForm" action="{{route('storebid')}}">
          @csrf
          <div class="form-group">
            <label for="services" class="col-form-label float-left">Jenis Layanan <small><a href="{{route('viewservices')}}">lihat seluruh layanan</a></small></label>
            <select name="services" id="services" aria-describedby="serviceshelp" required class="custom-select custom-select-sm">
              <option selected value="-1">Pilih Jenis Layanan...</option>
              @foreach($services as $s)
              <option value="{{$s->id}}">{{$s->name}}</option>
              @endforeach
            </select>

          </div>
          <div hidden id="jeniskegiatanformgroup" class="form-group">

            <label for="activities" class="col-form-label float-left">Jenis Kegiatan</label>
            <select name="activities" id="activities" required class="custom-select @error('errorkegiatan') is-invalid @enderror custom-select-sm">
            </select>
            @error('errorkegiatan')
            <script>
            $(document).ready(function(){
            $("#jeniskegiatanformgroup").prop('hidden', false);
            });
            </script>
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
            <dl id="activitynote" class="row mt-1">
              <dt class="col-sm-3">Keterangan Kegiatan</dt>
              <dd class="col-sm-9" id="activitynoteketerangan"></dd>

              <dt class="col-sm-3">Biaya Dasar</dt>
              <dd class="col-sm-9" id="activitynotebiaya"></dd>
            </dl>

          </div>
          <label for="orderqty" hidden id="labelorderqty"></label>
          <div id="orderqtybody" hidden class="input-group mb-3">
            <input required type="number" placeholder="Misal : 3" min="1" value="1" class="form-control" id="orderqty" aria-describedby="orderqtyhelp" name="orderqty">
            <div class="input-group-prepend">
              <label class="input-group-text" id="orderqtysatuan" for="orderqty"></label>
            </div>
          </div>
          <div class="form-group">
            <label for="keterangan">Rincian Pekerjaan</label>
            <textarea required aria-describedby="keteranganHelp" placeholder="mis : Membantu mencarikan paper ilmiah tentang ekonomi yang sudah harus terindeks SINTA, dsb" name="keterangan" class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" rows="5"></textarea>
            @error('keterangan')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
            <small id="keteranganHelp" class="form-text"><b>Keterangan harap diisi selengkap mungkin.</b></small>
          </div>
          <div class="card">
            <div class="card-header">
              <i class="fas fa-bullhorn"></i> Catatan Khusus
            </div>
            <div class="card-body">
              <ul>
                <li>Sistem akan menampilkan tawaran pekerjaan ke dashboard calon asdos di Asdosku.</li>
                <li>Biasanya, butuh beberapa hari sebelum ada yang tertarik dengan tawaran pekerjaan yang ditawarkan.</li>
                <li>Pastikan kategori jenis layanan dan jenis kegiatan sudah benar, untuk daftar layanan dan kegiatan dapat dilihat<a href="{{route('viewservices')}}"> di sini.</a></li>
                <li><b>Pastikan kolom keterangan pekerjaan diisi selengkap mungkin sehingga memberi gambaran kepada calon Asdos yang tertarik dengan tawaran pekerjaan.</li>
              </ul>
            </div>
          </div>
      </div>
      <input type="hidden" value="{{$currenturl}}" name="currenturl" />
      <button data-toggle="modal" data-target="#exampleModal" type="button" class="btn btn-primary btn-lg btn-block">Buat Penawaran Kerja</button>
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