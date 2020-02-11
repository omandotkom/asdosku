<div class="row">
  <div class="table-responsive-xl">
    <table class="table table-bordered table-dark">
      <thead>
        <tr>

          <th scope="col">No</th>
          <th scope="col">Keterangan</th>
          <th scope="col">Biaya</th>
          <th scope="col">Tanggal</th>
        </tr>
      </thead>
      <tbody>
        @php
        $num =1;
        @endphp
        <tr>
          <td>{{$num}}</td>
          <td>(Layanan) {{$transaction->activity->name}}</td>
          <td>{{$transaction->biaya}}
          <td>{{$transaction->created_at}}</td>
          
        </tr>
        @foreach($costs as $cost)
        @php
        $num++;
        @endphp
        <tr>
          <td>{{$num}}</td>
          <td>{{$cost->keterangan}}</td>
          <td>{{$cost->nominal}}</td>
          <td>{{$cost->updated_at}}</td>
          
        </tr>

        @endforeach
      </tbody>
    </table>
  </div>
  <script>
    document.getElementById("judulHalaman").innerHTML = "Persetujuan";

    function updateStatus(id) {
      var url = "{{url('/dashboard/index/hrd/persetujuan/update')}}";
      url = url.concat("/");
      url = url.concat(id);
      //console.log(url);
      window.location = url;
    }
  </script>
</div>
</div>