@php
function convertRupiah($val){
return number_format($val,2,',','.');
}
$totalbiaya = 0;
@endphp


<div class="container">
  @handheld
  <script>
    $(document).ready(function() {
      $('#warningmodal').modal({
        backdrop: 'static',
        keyboard: false,
        show: true,
        focus: true
      });
    });
  </script>
  <div class="modal fade" id="warningmodal" tabindex="-1" role="dialog" aria-labelledby="warningmodaltitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="warningmodaltitle">Informasi</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Anda mengakses halaman ini melalui perangkat smartphone/tablet. Jika ada teks terpotong, rotasikan gadget Anda menjadi <b>landscape</b> untuk hasil yang lebih optimal.
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
  </div>
  @endhandheld
  <div class="row">

    <div class="card shadow mx-auto p-1 mb-5 w-100 bg-white rounded">

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
              @if($transaction->total_discount != 0)
              @php
              $totalbiaya = $totalbiaya - $transaction->total_discount;
              @endphp
              <tr>
                <td>{{++$num}}</td>
                <td>Voucher</td>
                <td> - @php echo convertRupiah($transaction->total_discount); @endphp</td>
                <td>{{$transaction->updated_at}}</td>
              </tr>
              @endif
              <tr>
                <td colspan="2"><b>Total Biaya</b></td>

                <td colspan="2">@php echo "Rp. ".convertRupiah($totalbiaya); @endphp</td>


              </tr>
            </tbody>
          </table>
        </div>

        <form name="paymentform" enctype="multipart/form-data" method="POST" action="{{route('storepayout',$transaction->id)}}">
          <input type="hidden" name="total" value="{{$totalbiaya}}">
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
            <textarea required name="komentar" class="form-control @error('komentar') is-invalid @enderror" id="komentar" rows="5"></textarea>
            @error('komentar')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          <label>Penilaian Situs Asdosku</label>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="webscore" id="puas" value="puas" checked>
            <label class="form-check-label" for="puas">
              Puas
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="webscore" id="cukuppuas" value="cukup_puas">
            <label class="form-check-label" for="cukuppas">
              Cukup Puas
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="webscore" id="cukupburuk" value="cukup_buruk">
            <label class="form-check-label" for="cukupburuk">
              Cukup Buruk
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="webscore" id="buruk" value="buruk">
            <label class="form-check-label" for="buruk">
              Buruk
            </label>
          </div>
          <input type="hidden" name="transaction_id">
    <hr></hr>
          <h5 class="card-title text-center mt-1">Metode Pembayaran</h5>
          <table class="table table-sm table-responsive-sm table-borderless">
            <thead>
              <tr>
                <th scope="col" style="width: 64px;">Via</th>
                <th scope="col">Keterangan</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><img class="img-thumbnail img-fluid" src="{{asset('asset/img/payment/bni.png')}}" alt="BNI"></td>
                <td>A/n Yustitia Septri Saputra<br><b>0691863822</b></td>
              </tr>
              <tr>
                <td><img class="img-thumbnail img-fluid" src="{{asset('asset/img/payment/bms.png')}}" alt="MANDIRI SYARIAH"></td>
                <td>A/n Yustitia Septri Saputra<br><b>7147663287</b></td>
              </tr>
              <tr>
                <td><img class="img-thumbnail img-fluid" src="{{asset('asset/img/payment/bri.png')}}" alt="BRI"></td>
                <td>A/n Yustitia Septri Saputra<br><b>179201006331500</b></td>
              </tr>
            </tbody>
          </table>
          
          <button onclick="document.paymentform.submit();" class="btn btn-primary btn-lg btn-block">Unggah Bukti Pembayaran dan Penilaian</button>
      </div>
      </form>
    </div>
  </div>
</div>




</div>
</div>