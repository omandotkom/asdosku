<!-- Modal -->
<script>
    function generateProyekURL(){
        var proyekURL = "{{route('viewgeneral')}}";
        proyekURL = proyekURL.concat("/").concat($("#proyekactivity").val());
        proyekURL = proyekURL.concat("/").concat($("#kampusproyek").val()).concat("/").concat($("#jurusanproyek").val()).concat("/").concat($("#domisili_proyek").val());
        window.location = proyekURL;
    }
    </script>
<div class="modal fade" id="proyekModal" tabindex="-1" role="dialog" aria-labelledby="titleproyek" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="titleproyek">Kriteria Asisten Proyek</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                    <div class="form-group">

                        <label for="proyekactivity" class="col-form-label float-left">Jenis Kegiatan</label>
                        <select name="activity" id="proyekactivity" required class="custom-select custom-select-sm">
                        @foreach($proyekactivity as $p)
                            @if($p->first)
                            <option selected value="{{$p->id}}">{{$p->name}}</option>
                            @else
                            <option value="{{$p->id}}">{{$p->name}}</option>
                            @endif    
                        @endforeach
                        </select>
                    </div>
                    
                    <div class="form-group">
                    <label for="kampus" class="col-form-label float-left">Asal Kampus</label>
                    <select name="kampus" id="kampusproyek" required class="custom-select custom-select-sm">
                        <option selected value="Bebas">Bebas</option>
                        @foreach($campuses as $campus)
                        <option value="{{$campus->id}}">{{$campus->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="jurusan" class="col-form-label float-left">Jurusan</label>
                    <select name="jurusan" id="jurusanproyek" required class="custom-select custom-select-sm">
                        <option selected value="Bebas">Bebas</option>
                        @foreach($jurusans as $jurusan)
                        <option value="{{$jurusan->id}}">{{$jurusan->name}}</option>
                        @endforeach
                    </select>
                </div>
                  <div class="form-group">
                        <label for="domisili" class="col-form-label float-left">Domisili</label>
                        <select name="domisili" id="domisili_proyek" required class="custom-select custom-select-sm">
                            <option value="purwokerto">Purwokerto</option>
                            <option value="yogyakarta">Yogyakarta</option>
                        </select>
                        <small>Pilih Domisili yang terdekat dari pilihan</small>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" onclick="generateProyekURL();" class="btn btn-primary">Lanjutkan</button>
                </script>
            </div>
        </div>
    </div>
</div>