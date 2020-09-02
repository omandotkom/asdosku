<div class="row">
  <div class="col-12">
  <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Lengkapi Profil <br>  
                      <span class="text-danger">Perhatian! Demi kelancara bertransaksi Anda diwajibkan mengunggah scan/foto KTP atau SK dosen. Kemananan data privasi anda terjamin. Hanya pengelola yang dapat melihat data pribadi Anda.</span>
                  </h6>
                </div>
                <div class="card-body">
                  <form method="post" action="{{route('post-dosen-identitas')}}"  enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label for="nama">Nama : </label>
                      <input type="text" class="form-control" name="nama" id="nama" aria-describedby="emailHelp" value="{{Auth::user()->name}}" readonly="">
                    </div>
                    <div class="form-group">
                      <label for="nama">Asal Kampus : </label>
                      <input type="text" class="form-control" name="kampus_dosen" id="kampus_dosen" aria-describedby="emailHelp" value="{{$detail->kampus_dosen}}">
                    </div>
                    <div class="form-group">
                      <label for="nama">No Hp : </label>
                      <input type="text" class="form-control" name="wa" id="wa" aria-describedby="emailHelp" value="{{$detail->wa}}">
                      @error('wa')
                          <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="nama">NIK : </label>
                      <input type="text" class="form-control" name="nik" id="nik" aria-describedby="emailHelp" value="{{$detail->nik}}">
                      @error('nik')
                          <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="nama">Upload Foto KTP/SK Dosen : </label>
                      <input type="file" class="form-control" name="identitas" id="identitas" aria-describedby="emailHelp" required>
                      @error('identitas')
                          <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                      <small id="emailHelp" class="form-text text-muted">Anda diwajibkan upload foto KTP</small>

                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
           </div>
</div>