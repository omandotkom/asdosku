<!-- Modal -->
<script>
    function generatePraktikumURL() {
        var matakuliahURL = "{{route('viewmatakuliah')}}";
        matakuliahURL = matakuliahURL.concat("/").concat($("#activitymatakuliah").val()).concat("/")
            .concat($("#kampuspraktikum").val()).concat("/").concat($("#jurusanpraktikum").val()).concat("/")
            .concat($("#semesterpraktikum").val()).concat("/").concat($("#genderpraktikum").val());
        window.location = matakuliahURL;
    }
</script>
<div class="modal fade" id="praktikumModal" tabindex="-1" role="dialog" aria-labelledby="titlepraktikum" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="titlepratikum">Filter Asisten Praktikum</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="mapel" class="col-form-label float-left">Praktikum</label>

                    <select required id="activitypraktikum" name="activity" class="custom-select custom-select-sm"> @foreach($praktikumactivity as $p)
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
                    <select name="semester" id="semesterpraktikum" required class="custom-select custom-select-sm">
                        <option selected value="Bebas">Bebas</option>
                        @for ($i = 1; $i < 9; $i++) <option value="DiplomaSemester{{$i}}">Diploma Semester {{$i}}</option>
                            @endfor
                            @for ($i = 1; $i < 11; $i++) <option value="SarjanaSemester{{$i}}">Sarjana Semester {{$i}}</option>
                                @endfor
                                Fresh
                                @for ($i = 1; $i < 7; $i++) <option value="PascasarjanaSemester{{$i}}">Pascasarjana Semester {{$i}}</option>
                                    @endfor
                                    <option value="Freshgraduate">Freshgraduate</option>

                    </select>
                </div>
                <div class="form-group">
                    <label for="kampus" class="col-form-label float-left">Asal Kampus</label>
                    <select name="kampus" id="kampuspraktikum" required class="custom-select custom-select-sm">
                        <option selected value="Bebas">Bebas</option>
                        @foreach($campuses as $campus)
                        <option value="{{$campus->id}}">{{$campus->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="jurusan" class="col-form-label float-left">Jurusan</label>
                    <select name="jurusan" id="jurusanpraktikum" required class="custom-select custom-select-sm">
                        <option selected value="Bebas">Bebas</option>
                        @foreach($jurusans as $jurusan)
                        <option value="{{$jurusan->id}}">{{$jurusan->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="gender" class="col-form-label float-left">Gender</label>
                    <select required name="gender" id="genderpraktikum" class="custom-select custom-select-sm">
                        <option selected value="Bebas">Bebas</option>
                        <option value="Pria">Pria</option>
                        <option value="Wanita">Wanita</option>
                    </select>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" onclick="generatePraktikumURL();" class="btn btn-primary">Lanjutkan</button>
            </div>
        </div>
    </div>
</div>