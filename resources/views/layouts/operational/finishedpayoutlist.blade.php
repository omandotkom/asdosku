
<div class="row">
    @php
    function convertRupiah($val){
return "Rp. " . number_format($val,2,',','.');
}
    @endphp
    <div class="table-responsive-sm">
        <table class="table table-bordered table-white table-sm">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Pengguna (d/m)</th>
                    <th scope="col">Asdos</th>
                    <th scope="col">Rekening</th>
                    <th scope="col">ID Trx</th>
                    <th scope="col">Pembayaran</th>
                    <th scope="col">Biaya Trx</th>
                    <th scope="col">Diskon</th>
                    <th scope="col">Asdosku</th>
                    <th scope="col">Asdos</th>
                    <th scope="col">Tgl. Konfirmasi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($payouts as $payout)
                    @php
                    $trans = $payout->transaction->biaya;
                    $asdos = $trans * $payout->transaction->activity->asdos;
                    $totalcost = $payout->transaction->costs->sum('nominal');
                    $asdos = $asdos + $totalcost;
                    $byr = $payout->total;
                    $asdosku = $byr - $asdos;
                    @endphp
                <tr>
                    <td>@if(isset($payout->user->name)){{ $payout->user->name}}@endif</td>
                    <td>{{ $payout->transaction->siasdos->name}}</td>
                    <td class="text-wrap">@if(isset($payout->transaction->siasdos->bank->nama)){{ $payout->transaction->siasdos->bank->nama }} @endif @if(isset($payout->transaction->siasdos->bank->payment))({{ $payout->transaction->siasdos->bank->payment }}@endif @if(isset($payout->transaction->siasdos->bank->nomor)){{ $payout->transaction->siasdos->bank->nomor }})@endif </td>
                    <td>{{ $payout->transaction_id}}</td>
                    <td>{{ convertRupiah($byr)}}</td>
                    <td>{{ convertRupiah($payout->transaction->biaya)}} + <b> tambahan </b> {{ convertRupiah($totalcost)}}</td>
                    <td>{{ convertRupiah($payout->transaction->total_discount) }}</td>
                    <td>{{convertRupiah($asdosku)}}</td>
                    <td>{{convertRupiah($asdos)}}<br> <b>({{($payout->transaction->activity->asdos)}} dari {{ convertRupiah($payout->transaction->biaya)}}</b></td>
                    <td>{{$payout->updated_at->format('D/M/Y G:i:s')}}</td>
                </tr>

                @endforeach
            </tbody>
        </table>

    </div>
    {{$payouts->links()}}
</div>
</div>