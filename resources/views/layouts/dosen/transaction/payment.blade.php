@php
function convertRupiah($val){
return number_format($val,2,',','.');
}
$totalbiaya = 0;
@endphp
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

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


        <div class="form-group">
          <label for="pembayaran">Bukti Pembayaran</label>
          <input type="file" accept="image/*" class="form-control" placeholder="Bukti pembayaraan" id="pembayaran">
        </div>
        <h5 class="card-title text-center mt-3">Nilai Asdos Kami</h5>
        
          <div class="form-group">
            <label for="rating">Nilai untuk Asdos</label>
            <input required type="number" min="1" max="5" class="form-control" id="rating" aria-describedby="ratingHelp" name="rating">
            <small id="ratingHelp" class="form-text text-muted">Dalam skala 1 sampai 5</small>
          </div>
          <div class="form-group">
            <label for="komentar">Komentar untuk Asdos</label>
            <textarea required aria-describedby="keteranganHelp" placeholder="mis : Asisten cukup responsif" name="keterangan" class="form-control" id="keterangan" rows="5"></textarea>
          </div>
          <input type="hidden" name="transaction_id">
          <button data-toggle="modal" data-target="#exampleModal" type="button" class="btn btn-primary btn-lg btn-block">Unggah Bukti Pembayaran dan Penilaian</button>
      </div>
      </form>
    </div>
  </div>
</div>




</div>
</div>