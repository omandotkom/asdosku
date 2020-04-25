<script>
    function userDetil(url) {

        // Make a request for a user with a given ID
        axios.get(url)
            .then(function(response) {
                // handle success
                document.getElementById("detilNama").innerHTML = response.data.name;
                document.getElementById("detilKampus").innerHTML = response.data.kampus;
                document.getElementById("detilRating").innerHTML = response.data.rating;
                document.getElementById("detilJurusan").innerHTML = response.data.jurusan;
                document.getElementById("detilSemester").innerHTML = response.data.semester;
                document.getElementById("detilKomentar").innerHTML = response.data.commentcount;
                $("#detilKomentar").attr("href", response.data.commentlink);
                if (response.data.cv_path != "#") {
                    $("#detilCV").attr("href", response.data.cv_path);
                    $("#rowcv").show();
                } else {
                    $("#rowcv").hide();
                }
                if (response.data.another_file_path != "#") {
                    $("#detilNilai").attr("href", response.data.another_file_path);
                    $("#rownilai").show();
                } else {
                    $("#rownilai").hide();
                }

                document.getElementById("detilGender").innerHTML = response.data.gender;
                document.getElementById("detilCreated").innerHTML = response.data.created_at;
                document.getElementById("detilFoto").src = response.data.image_name;

            })
            .catch(function(error) {
                // handle error
                console.log(error);
            })
            .then(function() {
                // always executed
            });

    }

    function generateURL(userid) {
        var url = "{{url('api/profile/user')}}";
        url = url.concat("/").concat(userid);
        console.log(url);
        return url;
    }

</script>
<div class="modal fade" id="detilDialog" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Rincian Informasi Lengkap</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img id="detilFoto" src="" class="shadow p-3 mb-5 img-fluid bg-white rounded rounded img-thumbnail mx-auto d-block" alt="Foto Asdos">
                <div class="table-responsive-sm mt-1">
                    <table class="table table-sm">
                        <tr>
                            <th>Nama</th>
                            <td id="detilNama"></td>
                        </tr>
                        <tr>
                            <th>Rating</th>
                            <td id="detilRating">-</td>
                        </tr>
                        <tr>
                            <th>Komentar</th>
                            <td><a href="#" id="detilKomentar" class="badge badge-info">0 Komentar</a></td>
                        </tr>
                        <tr>
                            <th>Kampus</th>
                            <td id="detilKampus"></td>
                        </tr>
                        <tr>
                            <th>Jurusan</th>
                            <td id="detilJurusan"></td>
                        </tr>
                        <tr>
                            <th>Semester</th>
                            <td id="detilSemester"></td>
                        </tr>
                        <tr>
                            <th>Gender</th>
                            <td id="detilGender"></td>
                        </tr>
                        <tr id="rowcv">
                            <th>CV</th>
                            <td><a href="#" id="detilCV" class="badge badge-info">Lihat CV</a></td>
                        </tr>
                        <tr id="rownilai">
                            <th>Nilai</th>
                            <td><a href="#" id="detilNilai" class="badge badge-info">Lihat Nilai</a></td>
                        </tr>
                        <tr>
                            <th>Bergabung Sejak</th>
                            <td id="detilCreated"></td>
                        </tr>
                    </table>
                </div>

            </div>

        </div>
    </div>
</div>
<div class="row">
    @foreach($asdoslist as $a)
    <div class="col-xl-3 col-lg-5">
        <div class="card shadow mb-4">

            <!-- Card Body -->
            <div class="card-body">
                <div class = "small">
                    <dl class="row">
                        <dt class="col-sm-5">Nama</dt>
                        <dd class="col-sm-9">{{$a->asdos->name}}</dd>
                        <dt class="col-sm-5">Rating</dt>
                        <dd class="col-sm-9">@if(isset($a->asdos->rating)) {{$a->asdos->rating}} / 5 @else - @endif</dd>
                        <dt class="col-sm-5">Kampus</dt>
                        <dd class="col-sm-9">{{$a->asdos->detail->kampus->name}}</dd>
                        <dt class="col-sm-5">Gender</dt>
                        <dd class="col-sm-9">{{$a->asdos->detail->gender}}</dd>
                    </dl>
                </div>
                <button type="button" onclick="userDetil(generateURL('{{$a->asdos->id}}'));" data-toggle="modal" data-target="#detilDialog" class="btn btn-outline-primary btn-block btn-sm mt-2">Biodata Lengkap</button>
                @if(Auth::user()->role == "dosen")
                @php
                $url = route('showOrderPage',['activity' => $a->bid->activity_id, 'asdos' => $a->asdos->id,'bid'=>$a->bid_id,'url'=>"#"]);
                @endphp
                <button type="button" onclick="window.location='{{$url}}'" class="btn btn-primary btn-block btn-sm mt-2">Pilih</button>
                @endif
            </div>
        </div>
    </div>

@endforeach
</div>

{{$asdoslist->links()}}



</div>