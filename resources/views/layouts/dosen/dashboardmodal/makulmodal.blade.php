<!-- Modal -->
<script>
    function generateMatakuliahURL() {
        var matakuliahURL = "{{route('viewmatakuliah')}}";
        matakuliahURL = matakuliahURL.concat("/").concat($("#activitymatakuliah").val()).concat("/")
            .concat($("#kampusmatakuliah").val()).concat("/").concat($("#jurusanmatakuliah").val()).concat("/")
            .concat($("#semestermatakuliah").val()).concat("/").concat($("#gendermatakuliah").val()).concat("/").concat($("#domisili_makul").val());
       window.location = matakuliahURL;
    }
</script>
<div class="modal fade" id="makulModal" tabindex="-1" role="dialog" aria-labelledby="titleMakul" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="titleMakul">Kriteria Asisten Matakuliah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="mapel" class="col-form-label float-left">Matakuliah</label>

                    <select required id="activitymatakuliah" name="activity" class="custom-select custom-select-sm"> @foreach($matakuliahactivity as $p)
                        @if($p->first)
                        <option selected value="{{$p->id}}">{{$p->name}}</option>
                        @else
                        <option value="{{$p->id}}">{{$p->name}}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="semester" class="col-form-label float-left">Semester</label>
                    <select name="semester" id="semestermatakuliah" required class="custom-select custom-select-sm">
                        <option selected value="Bebas">Bebas</option>
                        @for ($i = 1; $i < 9; $i++)
                                <option value="DiplomaSemester{{$i}}">Diploma Semester {{$i}}</option>
                                @endfor
                                @for ($i = 1; $i < 11; $i++)
                                <option value="SarjanaSemester{{$i}}">Sarjana Semester {{$i}}</option>
                                @endfor
                                Fresh
                                @for ($i = 1; $i < 7; $i++)
                                <option value="PascasarjanaSemester{{$i}}">Pascasarjana Semester {{$i}}</option>
                                @endfor
                                <option value="Freshgraduate">Freshgraduate</option>
                               
                    </select>
                </div>
                <div class="form-group">
                    <label for="kampus" class="col-form-label float-left">Asal Kampus</label>
                    <select name="kampus" id="kampusmatakuliah" required class="custom-select custom-select-sm">
                        <option selected value="Bebas">Bebas</option>
                        @foreach($campuses as $campus)
                        <option value="{{$campus->id}}">{{$campus->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="jurusan" class="col-form-label float-left">Jurusan</label>
                    <select name="jurusan" id="jurusanmatakuliah" required class="custom-select custom-select-sm">
                        <option selected value="Bebas">Bebas</option>
                        @foreach($jurusans as $jurusan)
                        <option value="{{$jurusan->id}}">{{$jurusan->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="gender" class="col-form-label float-left">Gender</label>
                    <select required name="gender" id="gendermatakuliah" class="custom-select custom-select-sm">
                        <option selected value="Bebas">Bebas</option>
                        <option value="Pria">Pria</option>
                        <option value="Wanita">Wanita</option>
                    </select>
                </div>
                <div class="form-group">
                        <label for="domisili" class="col-form-label float-left">Domisili</label>
                        <select name="domisili" id="domisili_makul" required class="custom-select custom-select-sm">
                            <option value="purwokerto">Purwokerto</option>
                            <option value="yogyakarta">Yogyakarta</option>
                        </select>
                        <small>Pilih Domisili yang terdekat dari pilihan</small>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" onclick="generateMatakuliahURL();" class="btn btn-primary">Lanjutkan</button>
            </div>
        </div>
    </div>
</div>