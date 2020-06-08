<script>
  $( document ).ready(function() {
   $('#accordionSidebar').remove();
});
</script>
<div class="container">
  <div class="row">

    <div class="card w-100">
      <div class="card-body">
        <h5 class="card-title">Foto Profile</h5>
        <form method="post" action="{{route('savedocuments')}}" enctype="multipart/form-data">
          @csrf
          <div class="w-100">
              <div id="cvfrm" class="form-group">
                <label for="cv">CV (wajib berformat pdf)</label>

                <input type="file" name="cv" accept="application/pdf" class="form-control-file" id="cv">

              </div>
              <label for="cvfrm">@if(isset($archive->cv_path)) <a href="{{asset('storage/'.$archive->cv_path)}}" class="badge badge-primary">Lihat CV</a> @else <div class="alert alert-warning" role="alert">
                  Anda belum mengunggah CV
                </div> @endif</label>

              <div id="nilaifrm" class="form-group">
                <label for="nilai">Daftar Nilai(wajib berformat pdf)</label>

                <input type="file" name="nilai" accept="application/pdf" class="form-control-file" id="nilai">

              </div>
              <label for="cvfrm">@if(isset($archive->another_file_path)) <a href="{{asset('storage/'.$archive->another_file_path)}}" class="badge badge-primary">Lihat Nilai</a> @else <div class="alert alert-warning" role="alert">
                  Anda belum mengunggah Nilai
                </div> @endif</label>

              <div id="pengenalfrm" class="form-group">
                <label for="pengenal">Scan Tanda Pengenal Diri (KTP/SIM/Akta Kelahiran/KK/dsb) pilih salah satu (berformat pdf).
                </label>

                <input type="file" name="identity" accept="application/pdf" class="form-control-file" id="pengenal">

              </div>
              <label for="pengenal">@if(isset($archive->identity)) <a href="{{asset('storage/'.$archive->identity)}}" class="badge badge-primary">Lihat Dokumen Identitas</a> @else <div class="alert alert-warning" role="alert">
                  Anda belum mengunggah dokumen pengenal
                </div> @endif</label>


              <div id="ktmfrm" class="form-group">
                <label for="ktm">Scan KTM (berformat pdf).
                </label>

                <input type="file" name="ktm" accept="application/pdf" class="form-control-file" id="ktm">

              </div>
              <label for="ktm">@if(isset($archive->ktm)) <a href="{{asset('storage/'.$archive->ktm)}}" class="badge badge-primary">Lihat KTM</a> @else <div class="alert alert-warning" role="alert">
                  Anda belum mengunggah KTM
                </div> @endif</label>
          </div>
          <div class="alert alert-info" role="alert">
            Anda dapat menggunakan aplikasi Office Lens untuk scan dokumen, atau aplikasi serupa lainnya untuk scan melalui smartphone agar mudah kemudian simpan file dalam bentuk PDF.
          </div>
          <div class="form-group mt-3">
            <button class="btn btn-success btn-sm">Perbarui</button>
          </div>
          </form>

      </div>
    </div>

  </div>

</div>
</div>