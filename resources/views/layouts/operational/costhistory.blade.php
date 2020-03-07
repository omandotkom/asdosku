<div class="row">
  <div class="table-responsive-xl">
    <table class="table table-bordered table-dark">
      <thead>
        <tr>

          <th scope="col">No</th>
          <th scope="col">Keterangan</th>
          <th scope="col">Biaya</th>
          <th scope="col">Bukti</th>
          <th scope="col">Tanggal</th>
        </tr>
      </thead>
      <tbody>
        @php
        $num =0;
        @endphp
        @if(Auth::user()->role != "asdos")
        <tr>
          @php
          $num = $num + 1;
          @endphp
          <td>{{$num}}</td>
          <td>(Layanan) {{$transaction->activity->name}}</td>
          <td>{{$transaction->biaya}}</td>
          <td>-</td>
          <td>{{$transaction->created_at}}</td>
        </tr>
        @endif
        @if($transaction->total_discount != 0)
        <tr>
          @php
          $num = $num + 1;
          @endphp
          <td>{{$num}}</td>
          <td>Voucher</td>
          <td>- {{$transaction->total_discount}}</td>
          <td>-</td>
          <td>{{$transaction->created_at}}</td>
        </tr>

        @endif
        @foreach($costs as $cost)
        @php
        $num++;
        @endphp
        
        <tr>
          <td>{{$num}}</td>
          <td>{{$cost->keterangan}}</td>
          <td>{{$cost->nominal}}</td>
          <td><a href="{{asset('storage/'.$cost->filepath)}}" class="badge badge-primary">Lihat</a></td>
          <td>{{$cost->updated_at}}</td>
        </tr>
        @endforeach
        <tr>
          <td colspan="4"><a href="{{ URL::previous() }}" class="badge badge-secondary">Kembali</a></td>
        </tr>
      </tbody>
    </table>
  </div>

</div>
</div>