<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<script>
    var updateUrl;
    var selectedID;

    function userDetil(url) {

        // Make a request for a user with a given ID
        axios.get(url)
            .then(function(response) {
                // handle success
                document.getElementById("kodePemesanan").innerHTML = response.data.id;
                document.getElementById("rincianpemesanan").innerHTML = response.data.keterangan;
                document.getElementById("statuspemesanan").innerHTML = response.data.status;
                document.getElementById("kegiatan").innerHTML = response.data.kegiatan;
                document.getElementById("keterangankegiatan").innerHTML = response.data.keterangankegiatan;
                document.getElementById("dari").innerHTML = response.data.dari;
                document.getElementById("sampai").innerHTML = response.data.sampai;
                document.getElementById("biaya").innerHTML = response.data.biaya;
                document.getElementById("asisten").innerHTML = response.data.name;
                document.getElementById("waasisten").innerHTML = response.data.waasdos;
                document.getElementById("emailasisten").innerHTML = response.data.emailasdos;

                document.getElementById("kampus").innerHTML = response.data.kampus;
                document.getElementById("fotoasdos").src = response.data.image_name;
            })
            .catch(function(error) {
                // handle error
                console.log(error);
            })
            .then(function() {
                // always executed
            });

    }

    function generateURL(id) {
        var url = "{{url('api/transaction/detil')}}";
        url = url.concat("/").concat(id);
        console.log(url);
        return url;
    }

    function update() {

        // Make a request for a user with a given ID
        axios.get(updateUrl)
            .then(function(response) {
                // handle success
                const myNode = document.getElementById(selectedID);
                Toastify({
                    backgroundColor: "linear-gradient(to right, #56ab2f, #a8e063)",

                    text: "Berhasil merubah status transaksi.",

                    duration: 3000

                }).showToast();
                while (myNode.firstChild) {
                    myNode.removeChild(myNode.firstChild);
                }
            })
            .catch(function(error) {
                // handle error
                Toastify({
                    backgroundColor: "linear-gradient(to right, #ff416c, #ff4b2b)",
                    text: "Gagal merubah status transaksi",

                    duration: 3000

                }).showToast();
            })
            .then(function() {
                axios.get("{{route('sendnotification')}}")
            .then(function(response) {
                // handle success
            })
            .catch(function(error) {
                // handle error

            })
            .then(function() {
                // always executed
            });
            });
    }

    function generateURLUpdate(id) {
        var url = "{{url('api/transaction/update')}}";
        url = url.concat("/").concat(id).concat("/").concat("Berjalan");
        updateUrl = url;
        selectedID = id;
    }
    function generateURLDelete(id) {
        var url = "{{url('/dashboard/index/dosen/order/list/delete')}}";
        url = url.concat('/').concat(id);
        deleteUrl = url;
        return url;
    }
    function deleteTransaction() {
       //console.log(deleteUrl);
        window.location = deleteUrl;
    }
</script>



<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalTitle">Konfirmasi Pembatalan Layanan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Pembatalan layanan dimungkinkan apabila :
                <ul>
                    <li>Terdapat ketidakcocokan atau kesalahan pemesanan.</li>
                    <li>Asdos yang dipilih sedang berhalangan.</li>
                    <li>Masa pencarian Asdos dirasa terlalu lama.</li>
                    <li>Pastikan sudah konfirmasi ke dosennya terlebih dahulu sebelum membatalkan.</li>
                </ul>  
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" onclick="deleteTransaction();" class="btn btn-danger">Batalkan Pemesanan</button>
            </div>
        </div>
    </div>
</div>
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
                <div class="text-center">
                    <img id="fotoasdos" src="" class="img-thumbnail img-fluid shadow p-3 mb-5 bg-white rounded" alt="Foto Asdos">
                </div>

                <div class="table-responsive-sm mt-1">
                    <table class="table table-sm">
                        <tr class="text-left">
                            <th class="text-left">Kode Pemesanan</th>
                            <td class="text-left" id="kodePemesanan"></td>
                        </tr>
                        <tr class="text-left">
                            <th class="text-left">Status Pemesanan</th>
                            <td class="text-left" id="statuspemesanan"></td>
                        </tr>
                        <tr>
                            <th>Kegiatan</th>
                            <td id="kegiatan"></td>
                        </tr>
                        <tr class="text-left">
                            <th class="text-left">Rincian Pemesanan</th>
                            <td class="text-left" id="rincianpemesanan"></td>
                        </tr>
                        <tr>
                            <th>Keterangan Kegiatan</th>
                            <td id="keterangankegiatan"></td>
                        </tr>
                        <tr>
                            <th>Dari</th>
                            <td id="dari"></td>
                        </tr>
                        <tr>
                            <th>Sampai</th>
                            <td id="sampai"></td>
                        </tr>
                        <tr>
                            <th>Biaya</th>
                            <td id="biaya"></td>
                        </tr>
                        <tr>
                            <th>Nama Asisten</th>
                            <td id="asisten"></td>
                        </tr>
                        <tr>
                            <th>Email Asisten</th>
                            <td id="emailasisten"></td>
                        </tr>
                        <tr>
                            <th>WA Asisten</th>
                            <td id="waasisten"></td>
                        </tr>
                        <tr>
                            <th>Asal Kampus</th>
                            <td id="kampus"></td>
                        </tr>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="row">
    @foreach($transactions as $transaction)
    <div class="col-xl-3 col-lg-5" id="{{$transaction->id}}">
        <div class="card shadow mb-4">

            <!-- Card Body -->
            <div class="card-body">

                <div class="mt-4 small">

                    <div class="table-responsive-sm">
                        <table class="table">
                            <tr>
                                <th>Kode Transaksi</th>
                                <td>{{$transaction->id}}</td>
                            </tr>
                            <tr>
                                <th>Nama Dosen</th>
                                <td>{{$transaction->dosen}}</td>
                            </tr>
                            <tr>
                                <th>WA Dosen</th>
                                <td>{{$transaction->wa}}</td>
                            </tr>
                            <tr>
                                <th>Kegiatan</th>
                                <td>{{$transaction->kegiatan}}</td>
                            </tr>
                            <tr>
                                <th>Periode</th>
                                <td>{{$transaction->dari}} <b> sampai </b> {{$transaction->sampai}}</td>
                            </tr>
                        </table>
                    </div>
                    <button data-toggle="modal" data-target="#detilDialog" type="button" onclick="userDetil(generateURL('{{$transaction->id}}'));" class="btn mx-auto btn-primary btn-block btn-sm">Informasi Lengkap</button>
                    @if($transaction->status == "Menunggu Konfirmasi Asdos")
                    <button type="button" onclick="console.log(generateURLUpdate('{{$transaction->id}}'));" data-target="#deleteModal" data-toggle="modal" class="btn mx-auto btn-success btn-block btn-sm">Setujui</button>
                    <button type="button" onclick="generateURLDelete('{{$transaction->id}}');" data-target="#deleteModal" data-toggle="modal" class="btn mx-auto btn-danger btn-block btn-sm">Batalkan</button>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>





</div>