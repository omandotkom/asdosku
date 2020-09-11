<script>
    function generateKaryaURL() {
        var karyaURL = "{{route('viewgeneral')}}";
        karyaURL = karyaURL.concat("/").concat($("#karyaactivity").val());
        karyaURL = karyaURL.concat("/").concat($("#kampuskarya").val()).concat("/").concat($("#jurusankarya").val()).concat("/bebas");
        window.location = karyaURL;
    }
</script>
<!-- Modal -->
<div class="modal fade" id="karyaModal" tabindex="-1" role="dialog" aria-labelledby="titlekarya" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="titlekarya">Kriteria Asisten Karya</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="form-group">

                    <label for="karyaactivity" class="col-form-label float-left">Jenis Kegiatan</label>
                    <select name="activity" id="karyaactivity" required class="custom-select custom-select-sm">
                        @foreach($karyaactivity as $p)
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
                    <select name="kampus" id="kampuskarya" required class="custom-select custom-select-sm">
                        <option selected value="Bebas">Bebas</option>
                        @foreach($campuses as $campus)
                        <option value="{{$campus->id}}">{{$campus->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="jurusan" class="col-form-label float-left">Jurusan</label>
                    <select name="jurusan" id="jurusankarya" required class="custom-select custom-select-sm">
                        <option selected value="Bebas">Bebas</option>
                        @foreach($jurusans as $jurusan)
                        <option value="{{$jurusan->id}}">{{$jurusan->name}}</option>
                        @endforeach
                    </select>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" onclick="generateKaryaURL();" class="btn btn-primary">Lanjutkan</button>
                </script>
            </div>
        </div>
    </div>
</div>