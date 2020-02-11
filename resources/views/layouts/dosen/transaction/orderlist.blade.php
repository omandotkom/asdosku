<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<script>
    var deleteUrl;

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

    function generateURLDelete(id) {
        var url = "{{url('/dashboard/index/dosen/order/list/delete')}}";
        url = url.concat('/').concat(id);
        deleteUrl = url;
        return url;
    }

    function deleteTransaction() {
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
                            <th>Biaya</th>
                            <td id="biaya"></td>
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
                            <h5 class="mb-1">Mencari Asdos</h5>

                        </div>
                        <p class="mb-1">Permintaan bapak/ibu sudah diketahui oleh team Asdosku. Team Asdosku sedang mengonfirmasikan permintaan asistensi ke calon Asdos terkait.</p>
                    </div>
                    <div class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Berjalan</h5>
                        </div>
                        <p class="mb-1">Asdos sedang menjadi asisten Bapak/Ibu dosen.</p>
                    </div>
                    <div class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Menunggu Pembayaran</h5>
                        </div>
                        <p class="mb-1">Pihak Asdosku menunggu pembayaran dari bapak/ibu dosen atau sedang proses verifikasi pembayaran.</p>
                    </div>
                    <div class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Selesai</h5>
                        </div>
                        <p class="mb-1">Masa kerja Asdos terhadap Bapak/Ibu dosen telah selesai serta Bapak/Ibu sudah membayar tagihan.</p>
                    </div>

                    <div class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Dibatalkan</h5>
                        </div>
                        <p class="mb-1">Bapak/Ibu dosen melakukan pembatalan pemesanan ketika proses pencarian asdos karena ingin mengganti pesanan atau karena alasan lainnya.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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
                                @else
                            <tr class="table-warning">
                                @endif
                                <th>Status</th>
                                <td>{{$transaction->status}}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Pemesanan</th>
                                <td>{{$transaction->created_at}}</td>
                            </tr>
                            <tr>
                                <th>Terakhr Status Berubah</th>
                                <td>{{$transaction->updated_at}}</td>
                            </tr>
                        </table>
                    </div>
                    <button data-toggle="modal" data-target="#detilDialog" type="button" onclick="userDetil(generateURL('{{$transaction->id}}'));" class="btn mx-auto btn-primary btn-block btn-sm">Informasi Lengkap</button>
                    @switch($transaction->status)
                    @case('Mencari Asdos')
                    <button type="button" onclick="generateURLDelete('{{$transaction->id}}');" data-target="#deleteModal" data-toggle="modal" class="btn mx-auto btn-danger btn-block btn-sm">Batalkan</button>
                    @break
                    @case('Menunggu Pembayaran')
                    @php
                    $urlpayment = route('showPayoutPage',$transaction->id);
                    @endphp
                    <button type="button" onclick="window.location = '{{$urlpayment}}';" class="btn mx-auto btn-primary btn-block btn-sm">Bayar Pesanan</button>
                    @break
                    @endswitch
                   </div>
            </div>
        </div>
    </div>
    @endforeach
</div>





</div>