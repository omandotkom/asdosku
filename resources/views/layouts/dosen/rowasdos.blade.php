<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<script>
    function userDetil(url) {

        // Make a request for a user with a given ID
        axios.get(url)
            .then(function(response) {
                // handle success
                document.getElementById("detilNama").innerHTML = response.data.name;
                document.getElementById("detilKampus").innerHTML = response.data.kampus;
                document.getElementById("detilJurusan").innerHTML = response.data.jurusan;
                document.getElementById("detilSemester").innerHTML = response.data.semester;
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

    function order(activity, user) {
        var url = "{{url('/dashboard/index/dosen/order')}}";
        url = url.concat("/");
        url = url.concat(activity).concat("/").concat(user);
        window.open(url,'_blank');
        console.log(url);
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
                <img id="detilFoto" src="" class="shadow p-3 mb-5 bg-white rounded rounded img-thumbnail mx-auto d-block" alt="Foto Asdos">
                <div class="table-responsive-sm mt-1">
                    <table class="table table-sm">
                        <tr>
                            <th>Nama</th>
                            <td id="detilNama"></td>
                        </tr>
                        <tr>
                            <th>Rating</th>
                            <td id="detilRating">Masih sample</td>
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
    @foreach($asdoslist as $asdos)
    <div class="col-xl-3 col-lg-5">
        <div class="card shadow mb-4">

            <!-- Card Body -->
            <div class="card-body">

                <div class="mt-4 text-center small">

                    <i class="fas fa-fw fa-user fa-5x"></i>
                    <!--<p class="h3 mt-2">{{$asdos->name}}</p>-->
                    <div class="table-responsive-sm">
                        <table class="table">
                            <tr>
                                <th>Nama</th>
                                <td>{{$asdos->name}}</td>
                            </tr>
                            <tr>
                                <th>Rating</th>
                                <td>Masih sample</td>
                            </tr>
                            <tr>
                                <th>Kampus</th>
                                <td>{{$asdos->kampus}}</td>
                            </tr>
                            <tr>
                                <th>Gender</th>
                                <td>{{$asdos->gender}}</td>
                            </tr>
                        </table>
                    </div>
                    
                    <button type="button" onclick="userDetil(generateURL('{{$asdos->id}}'));" data-toggle="modal" data-target="#detilDialog" class="btn btn-outline-primary btn-block btn-sm mt-2">Rincian</button>

                    <button type="button" onclick="order('{{$activity}}','{{$asdos->id}}');" class="btn btn-outline-primary btn-block btn-sm mt-2">Pilih</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>





</div>