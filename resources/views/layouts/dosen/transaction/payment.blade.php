@php
function convertRupiah($val){
return number_format($val,2,',','.');
}
$totalbiaya = 0;
@endphp


<div class="container">
  <div class="row">

    <div class="card shadow p-3 mb-5 bg-white rounded">

      <div class="card-body">
        <h5 class="card-title text-center">Pembayaran</h5>

        <div class="text-center">
          <img src="{{asset('asset/img/logo.png')}}" class="img-thumbnail p-3 mb-5 bg-white rounded" alt="Foto Asdos">
        </div>
        <div class="table-responsive-xl mt-1">
          <table class="table table-sm table-bordered">
            <thead>
              <tr class="table-warning">

                <th scope="col">No</th>
                <th scope="col">Keterangan</th>
                <th scope="col">Biaya (Rp)</th>
                <th scope="col">Tanggal</th>
              </tr>
            </thead>
            <tbody>
              @php
              $num =1;
              $totalbiaya = $totalbiaya + $transaction->biaya;
              @endphp
              <tr>
                <td>{{$num}}</td>
                <td>(Layanan) {{$transaction->activity->name}}</td>
                <td>@php echo convertRupiah($transaction->biaya); @endphp </td>
                <td>{{$transaction->created_at}}</td>

              </tr>
              @foreach($costs as $cost)
              @php
              $totalbiaya = $totalbiaya + $cost->nominal;
              $num++;
              @endphp
              <tr>
                <td>{{$num}}</td>
                <td>{{$cost->keterangan}}</td>
                <td>@php echo convertRupiah($cost->nominal); @endphp</td>
                <td>{{$cost->updated_at}}</td>

              </tr>

              @endforeach
              <tr>
                <td colspan="2"><b>Total Biaya</b></td>

                <td colspan="2">@php echo "Rp. ".convertRupiah($totalbiaya); @endphp</td>


              </tr>
            </tbody>
          </table>
        </div>

        <form name="paymentform" enctype="multipart/form-data" method="POST" action="{{route('storepayout',$transaction->id)}}">
        <input type="hidden"  name="total" value="{{$totalbiaya}}">  
        <div class="form-group">
            @csrf
            <label for="pembayaran">Bukti Pembayaran</label>
            <input required type="file" accept="image/*" name="pembayaran" class="form-control @error('pembayaran') is-invalid @enderror" placeholder="Bukti pembayaraan" id="pembayaran">
            @error('pembayaran')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          <h5 class="card-title text-center mt-3">Nilai Asdos Kami</h5>

          <div class="form-group">
            <label for="rating">Nilai untuk Asdos</label>
            <input required type="number" min="1" max="5" class="form-control @error('rating') is-invalid @enderror" id="rating" aria-describedby="ratingHelp" name="rating">
            <small id="ratingHelp" class="form-text text-muted">Dalam skala 1 sampai 5</small>
            @error('rating')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label for="komentar">Komentar untuk Asdos</label>
            <textarea required placeholder="mis : Asisten cukup responsif" name="komentar" class="form-control @error('komentar') is-invalid @enderror" id="komentar" rows="5"></textarea>
            @error('komentar')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

          </div>
          <input type="hidden" name="transaction_id">
          <button onclick="document.paymentform.submit();" class="btn btn-primary btn-lg btn-block">Unggah Bukti Pembayaran dan Penilaian</button>
      </div>
      </form>
    </div>
  </div>
</div>




</div>
</div>