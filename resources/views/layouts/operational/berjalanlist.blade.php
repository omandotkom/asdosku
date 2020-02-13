<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<script>
    var costURL;
    var selectedID;
    var sumURL;

    function addcost() {
        axios.post(costURL, {
                nominalcost: $("#nominalcost").val(),
                keterangancost: $("#keterangancost").val(),
            })
            .then(function(response) {
                Toastify({
                    backgroundColor: "linear-gradient(to right, #56ab2f, #a8e063)",

                    text: response.data,

                    duration: 3000

                }).showToast();
            })
            .catch(function(error) {
                Toastify({
                    backgroundColor: "linear-gradient(to right, #ff416c, #ff4b2b)",
                    text: error,

                    duration: 3000

                }).showToast();
            });

    }

    function selesailayanan() {
        axios.get(selesaiURL)
            .then(function(response) {
                // handle success
                Toastify({
                    backgroundColor: "linear-gradient(to right, #56ab2f, #a8e063)",

                    text: "Berhasil merubah status transaksi menjadi ".concat(response.data.status),

                    duration: 3000

                }).showToast();
                const myNode = document.getElementById(selectedID);
                while (myNode.firstChild) {
                    myNode.removeChild(myNode.firstChild);
                }
            })
            .catch(function(error) {
                // handle error
                Toastify({
                    backgroundColor: "linear-gradient(to right, #ff416c, #ff4b2b)",
                    text: error,

                    duration: 3000

                }).showToast();
            })
            .then(function() {
                // always executed
            });
    }

    function generateCostUrl(id) {
        selectedID = id;
        costURL = "{{url('/api/transaction/cost/store')}}".concat("/").concat(id);
    }

    function generatesumcosturl(id) {
        selectedID = id;
        sumURL = "{{url('/api/transaction/cost/sum')}}".concat("/").concat(id);
        axios.get(sumURL)
            .then(function(response) {
                // handle success
                document.getElementById("biayatambahan").innerHTML = response.data;
            })
            .catch(function(error) {
                // handle error
                console.log(error);
            })
            .then(function() {
                // always executed
            });

    }

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
        generatesumcosturl(selectedID);

    }

    function gotoHistoris(url) {
        window.location = url;
    }

    function generateURL(id) {
        selectedID = id;
        var url = "{{url('api/transaction/detil')}}";
        url = url.concat("/").concat(id);
        console.log(url);
        return url;
    }
    var selesaiURL;

    function generateSelesaiURL(id) {
        selectedID = id;
        selesaiURL = "{{url('api/transaction/update')}}".concat("/").concat(id).concat("/").concat("MP");
        console.log(url);
    }
</script>

<div class="modal fade" id="selesaimodal" tabindex="-1" role="dialog" aria-labelledby="selesaimodaltitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="selesaimodaltitle">Konfirmasi Penyelesaian Layanan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul>
                    <li>Layanan akan dianggap selesai oleh sistem.</li>
                    <li>Pastikan sudah mengonfirmasi ke dosen bahwa layanan telah selesai.</li>
                    <li>Setelah layanan di selesaikan, sistem akan memberikan tagihan pada dosen.</li>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" onclick="selesailayanan();" data-dismiss="modal" class="btn btn-success">Selesaikan Pesanan</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="costDialog" tabindex="-1" role="dialog" aria-labelledby="costmodaltitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="costmodaltitle">Tambahan Biaya</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="javascript:void(0);">

                    <div class="form-group">
                        <label for="nominalcost">Nominal</label>
                        <input required type="text" class="form-control" id="nominalcost" aria-describedby="costhelp" placeholder="Misal : 67500">
                        <small id="costhelp" class="form-text text-muted">Di isi dengan format seperti 67500 (tanpa titik dan simbol rupiah).</small>
                    </div>
                    <div class="form-group">
                        <label for="keterangancost">Nominal</label>
                        <textarea required class="form-control" aria-describedby="keteranganhelp" id="keterangancost" placeholder="Pengeluaran untuk fotocopy sebesar 6500" aria-label="With textarea"></textarea>
                        <small id="keteranganhelp" class="form-text text-muted">Di isi dengan lengkap karena akan dilihat client untuk tagihan.</small>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" onclick="addcost();" data-dismiss="modal" class="btn btn-success">Tambah Biaya</button>
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
                    <img id="fotoasdos" src="" class="img-thumbnail shadow p-3 mb-5 bg-white rounded" alt="Foto Asdos">
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
                            <th>Biaya Kegiatan</th>
                            <td id="biaya"></td>
                        </tr>
                        <tr>
                            <th>Biaya Tambahan</th>
                            <td>
                                <div id="biayatambahan"></div><a href="#"><small class="text-muted">Rincian</small></a>
                            </td>
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
                    @php
                    $historisurl = route('showcosthistory',$transaction->id);
                    @endphp
                    <button data-toggle="modal" data-target="#detilDialog" type="button" onclick="userDetil(generateURL('{{$transaction->id}}'));" class="btn mx-auto btn-primary btn-block btn-sm">Informasi Lengkap</button>
                    <button data-toggle="modal" data-target="#costDialog" onclick="generateCostUrl('{{$transaction->id}}');" type="button" class="btn mx-auto btn-primary btn-block btn-sm">Tambah Biaya</button>
                    <button type="button" onclick="gotoHistoris('{{$historisurl}}');" class="btn mx-auto btn-primary btn-block btn-sm">Historis Biaya</button>
                    @if($transaction->status == "Berjalan")
                    <button type="button" data-target="#selesaimodal" onclick="generateSelesaiURL('{{$transaction->id}}');" data-toggle="modal" class="btn mx-auto btn-dark btn-block btn-sm">Layanan Selesai</button>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>





</div>