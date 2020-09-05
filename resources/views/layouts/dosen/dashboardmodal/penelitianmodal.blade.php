<!-- Modal -->
<script>
    function generatePenelitianURL(){
        var penelitianURL = "{{route('viewgeneral')}}";
        penelitianURL = penelitianURL.concat("/").concat($("#penelitianactivity").val());
        penelitianURL = penelitianURL.concat("/").concat($("#kampuspenelitian").val()).concat("/").concat($("#jurusanpenelitian").val()).concat("/").concat($("#domisili_penelitian").val());
        window.location = penelitianURL;
    }
</script>
<div class="modal fade" id="penelitianModal" tabindex="-1" role="dialog" aria-labelledby="titlePenelitian" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="titlePenelitian">Kriteria Asisten Penelitian</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    @csrf
                    <div class="form-group">

                        <label for="penelitianactivity" class="col-form-label float-left">Jenis Kegiatan</label>
                        <select name="activity" id="penelitianactivity" required class="custom-select custom-select-sm">
                        @foreach($penelitianactivity as $p)
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
                    <select name="kampus" id="kampuspenelitian" required class="custom-select custom-select-sm">
                        <option selected value="Bebas">Bebas</option>
                        @foreach($campuses as $campus)
                        <option value="{{$campus->id}}">{{$campus->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="jurusan" class="col-form-label float-left">Jurusan</label>
                    <select name="jurusan" id="jurusanpenelitian" required class="custom-select custom-select-sm">
                        <option selected value="Bebas">Bebas</option>
                        @foreach($jurusans as $jurusan)
                        <option value="{{$jurusan->id}}">{{$jurusan->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                        <label for="domisili" class="col-form-label float-left">Domisili</label>
                        <select name="domisili" id="domisili_penelitian" required class="custom-select custom-select-sm">
                            <option value="purwokerto">Purwokerto</option>
                            <option value="yogyakarta">Yogyakarta</option>
                        </select>
                        <small>Pilih Domisili yang terdekat dari pilihan</small>
                </div>
              </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" onclick="generatePenelitianURL();" class="btn btn-primary">Lanjutkan</button>
                </script>
            </div>
        </div>
    </div>
</div>