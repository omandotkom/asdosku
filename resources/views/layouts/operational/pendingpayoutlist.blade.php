<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<script>
    var selectedID;
    var url;

    function gotoHistoris(url) {
        window.location = url;
    }

    function generateURL(id) {
        selectedID = id;
        url = "{{route('confirmpayout')}}";
    }

    function confirm() {
        axios.post(url, {
                payout_id: selectedID,

            })
            .then(function(response) {
                console.log(response);
                Toastify({
                    backgroundColor: "linear-gradient(to right, #56ab2f, #a8e063)",

                    text: response.data,
                    duration: 3000

                }).showToast();
                const myNode = document.getElementById(selectedID);
                while (myNode.firstChild) {
                    myNode.removeChild(myNode.firstChild);
                }
            })
            .catch(function(error) {
                Toastify({
                    backgroundColor: "linear-gradient(to right, #ff416c, #ff4b2b)",
                    text: error,

                    duration: 3000

                }).showToast();
            });
    }
</script>

<div class="modal fade" id="pembayaranmodal" tabindex="-1" role="dialog" aria-labelledby="pembayaranmodaltitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="pembayaranmodaltitle">Konfirmasi Pembayaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul>
                    <li>Periksa kembali nama pengirim.</li>
                    <li>Periksa kembali nominal kiriman.</li>

                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" onclick="confirm();" data-dismiss="modal" class="btn btn-success">Pembayaran Sudah Benar</button>
            </div>
        </div>
    </div>
</div>




<div class="row">
    @foreach($payouts as $payout)
    <div class="col-xl-3 col-lg-5" id="{{$payout->id}}">
        <div class="card shadow mb-4">

            <!-- Card Body -->
            <div class="card-body">

                <div class="mt-4 small">

                    <div class="table-responsive-sm">
                        <table class="table">
                            <tr>
                                <th>Kode Transaksi</th>
                                <td>{{$payout->transaction->id}}</td>
                            </tr>
                            <tr>
                                <th>Kode Pembayaran</th>
                                <td>{{$payout->id}}</td>
                            </tr>
                            <tr>
                                <th>Total</th>
                                <td>{{$payout->total}}</td>
                            </tr>
                            <tr>
                                <th>Dosen</th>
                                <td>{{$payout->user->name}}</td>
                            </tr>
                            <tr>
                                <th>WA</th>
                                <td>{{$payout->detail->wa}}</td>
                            </tr>
                            <tr>
                                <th>Bukti Bayar</th>
                                <td><a href="{{route('downloadpayout',$payout->id)}}" class="badge badge-primary">Unduh</a></td>
                            </tr>
                            <tr>
                                <th>Terakhir Ubah</th>
                                <td>{{$payout->updated_at}}</td>
                            </tr>
                        </table>
                    </div>
                    @php
                    $historisurl = route('showcosthistory',$payout->transaction_id);
                    @endphp
                    <button type="button" onclick="gotoHistoris('{{$historisurl}}');" class="btn mx-auto btn-primary btn-block btn-sm">Historis Biaya</button>
                    <button type="button" onclick="generateURL('{{$payout->id}}');" data-target="#pembayaranmodal" data-toggle="modal" class="btn mx-auto btn-primary btn-block btn-sm">Konfirmasi Pembayaran</button>

                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>





</div>