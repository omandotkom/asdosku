<script>
    var deleteUrl;
    var selectedID;
    var selesaiURL;
    
    function generateSelesaiURLNew(link){
         selesaiURL = link;
    }

    function gotoHistoris(url) {
        window.location = url;
    }
    function selesaiLayananNew(){
        console.log("Menuju lokasi ".concat(selesaiURL));
        window.location = selesaiURL;
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
                document.getElementById("kampus").innerHTML = response.data.kampus;
                document.getElementById("fotoasdos").src = response.data.image_name;
                if (response.data.total_discount != 0) {
                    $("#vcrrow").removeAttr("hidden");
                    $("#vcr").text(response.data.total_discount);
                } else {

                    if (!document.getElementById("vcrrow").hasAttribute("hidden")) {
                        $("#vcrrow").attr('hidden', 'true');
                    }
                }
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

        return url;
    }

    function generateURLDelete(id) {
        var url = "{{route('bataltransaksi')}}";
        url = url.concat('/').concat(id);
        deleteUrl = url;
        return url;
    }

    function deleteTransaction() {
        //console.log(deleteUrl);
        window.location = deleteUrl;
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
                    <li>Yakin ingin melakukan permintaan selesai layanan ?</li>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" onclick="selesaiLayananNew();" data-dismiss="modal" class="btn btn-success">Selesaikan Pesanan</button>
            </div>
        </div>
    </div>
</div>
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
                    <li>Masa pencarian Asdos dirasa terlalu lama</li>

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
                            <th>Biaya Dasar</th>
                            <td id="biaya"></td>
                        </tr>
                        <tr class="table-success" hidden id="vcrrow">
                            <th>Voucher</th>
                            <td id="vcr"></td>
                        </tr>
                        <tr>
                            <th>Asisten</th>
                            <td id="asisten"></td>
                        </tr>
                        <tr>
                            <th>Asal Kampus</th>
                            <td id="kampus"></td>
                        </tr>
                    </table>
                </div>
                <h3 class="text-center">Penjelasan Status</h3>
                <div class="list-group">
                    <div class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Menunggu Konfirmasi Asdos</h5>

                        </div>
                        <p class="mb-1">Permintaan Pengguna sudah diketahui oleh team Asdosku. Team Asdosku sedang mengonfirmasikan permintaan asistensi ke calon Asdos terkait.</p>
                    </div>
                    <div class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Berjalan</h5>
                        </div>
                        <p class="mb-1">Asdos sedang menjadi asisten Pengguna.</p>
                    </div>
                    <div class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Menunggu Pembayaran</h5>
                        </div>
                        <p class="mb-1">Pihak Asdosku menunggu pembayaran dari Pengguna atau sedang proses verifikasi pembayaran.</p>
                    </div>
                    <div class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Menunggu Konfirmasi Pembayaran</h5>
                        </div>
                        <p class="mb-1">Pembayaran sedang di verifikasi oleh team Asdosku.</p>
                    </div>
                    <div class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Selesai</h5>
                        </div>
                        <p class="mb-1">Masa kerja Asdos terhadap Pengguna telah selesai serta pembayaran Pengguna sudah diverifikasi.</p>
                    </div>

                    <div class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Dibatalkan</h5>
                        </div>
                        <p class="mb-1">Pengguna melakukan pembatalan pemesanan ketika proses pencarian asdos karena ingin mengganti pesanan atau karena alasan lainnya.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif
<div class="row">
    @foreach($transactions as $transaction)
    <div class="col-xl-3 col-lg-5">
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
                            @if($transaction->status == "Berjalan")
                            <tr class="table-success">
                                @elseif($transaction->status == 'Selesai')
                            <tr class="table-success">
                                @else
                            <tr class="table-warning">
                                @endif
                                <th>Status</th>
                                <td>@if(isset($transaction->payout))
                                    {{$transaction->payout->status}}
                                    @else
                                    {{$transaction->status}} @endif</td>
                            </tr>
                            <tr>
                                <th>Tanggal Pemesanan</th>
                                <td>{{$transaction->created_at}}</td>
                            </tr>
                            <tr>
                                <th>Terakhir Status Berubah</th>
                                <td>@if (isset($transaction->payout))
                                    {{$transaction->payout->updated_at}} @else {{$transaction->updated_at}} @endif</td>
                            </tr>
                            <tr>
                                <th>Biaya Layanan</th>
                                <td>Rp.{{$transaction->biaya}} @if ($transaction->total_discount > 0) <div class="text-success">VCR {{$transaction->total_discount}} </div> = Rp. @php echo $transaction->biaya - $transaction->total_discount; @endphp @endif</td>
                            </tr>
                        </table>
                    </div>
                    @php
                    $historisurl = route('showcosthistory',$transaction->id);
                    @endphp
                    <button data-toggle="modal" data-target="#detilDialog" type="button" onclick="userDetil(generateURL('{{$transaction->id}}'));" class="btn mx-auto btn-primary btn-block btn-sm">Informasi Lengkap</button>
                    <button type="button" onclick="gotoHistoris('{{$historisurl}}');" class="btn mx-auto btn-primary btn-block btn-sm">Historis Biaya</button>

                    @switch($transaction->status)
                    @case('Menunggu Konfirmasi Asdos')
                    <button type="button" onclick="generateURLDelete('{{$transaction->id}}');" data-target="#deleteModal" data-toggle="modal" class="btn mx-auto btn-danger btn-block btn-sm">Batalkan</button>
                    @break
                    @case('Menunggu Pembayaran')
                    @if(!isset($transaction->payout))
                    @php
                    $urlpayment = route('showPayoutPage',$transaction->id);
                    @endphp
                    <button type="button" onclick="window.location = '{{$urlpayment}}';" class="btn mx-auto btn-outline-primary btn-block btn-sm">Bayar Pesanan</button>
                    @endif
                    @break
                    @case('Berjalan')
                    @php
                    $text = "request selesai layanan untuk kode transaksi " . $transaction->id . " atas nama " . Auth::user()->name . ", terimakasih.";
                    $url = "https://wa.me/6285643715830?text=" . rawurlencode($text);
                    @endphp
                    <button type="button" data-target="#selesaimodal" onclick="generateSelesaiURLNew('{{$url}}');" data-toggle="modal" class="btn mx-auto btn-dark btn-block btn-sm">Request Selesaikan Layanan</button>
                    
                    @break
                    @endswitch
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>





</div>