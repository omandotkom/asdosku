@php
function convertRupiah($val){
return number_format($val,2,',','.');
}
@endphp
<script>
    $(document).ready(function() {

        $("#services").change(function() {
            var selectedservice = $(this).children("option:selected").val();
            if (selectedservice == "none") {
                return;
            }
            $("#services").prop("disabled", true);
            $("#activities").prop('disabled', true);
            $("#activities").prop('hidden', true);
            axios.get('{{route("showactivitiesbyservice")}}'.concat("/").concat(selectedservice))
                .then(function(response) {
                    // handle success
                    $('#activities').empty();
                    $('#activities').append(`<option selected class="val" value="none"> 
                                      Pilih Kegiatan 
                                  </option>`);

                    $('#activities').append(`<option class="val" value="0"> 
                                      Semua Kegiatan 
                                  </option>`);

                    response.data.forEach(fillactivities);
                    //only show when 200 ok response
                    $("#activities").prop('hidden', false);
                })
                .catch(function(error) {
                    // handle error
                    console.log(error);

                })
                .then(function() {
                    // always executed
                    $("#services").prop("disabled", false);
                    $("#activities").prop('disabled', false);

                    $("#orderqtybody").prop("hidden", true);
                    $("#labelorderqty").prop("hidden", true);
                });

        });
        $("#activities").change(function() {

            var selectedactivity = $(this).children("option:selected").val();
            if (selectedactivity != "none") {
                if (selectedactivity != 0) {
                    var url = "{{route('showbidsbyactivity')}}".concat("/").concat(selectedactivity);
                } else {
                    var selectedservice = $("#services").children("option:selected").val();
                    var url = "{{route('showbidsbyactivity')}}".concat("/").concat(selectedservice);
                }
                window.location = url;
            }
        });



        function fillactivities(item, index) {
            $('#activities').append(`<option class="val" value="${item.id}"> 
                                       ${item.name} 
                                  </option>`);
        }
    });
</script>

</script>
<div class="card bg-white mx-auto w-100 text-center">
    <div class="card-body">
        <h5 class="card-title text-wrap">Filter Tawaran Pekerjaan</h5>
        <div class="row">
            <div class="form-group mx-auto">
                <select name="services" id="services" aria-describedby="serviceshelp" required class="custom-select custom-select-sm">
                    <option selected value="-1">Pilih Jenis Layanan...</option>
                    @foreach($services as $s)
                    <option value="{{$s->id}}">{{$s->name}}</option>
                    @endforeach
                </select>
                <select name="activities" hidden id="activities" disabled required class="custom-select mt-1 custom-select-sm">
                </select>
            </div>
        </div>
        <div class="row">
            <br><small class="mx-auto">atau</small>
        </div>
        <div class="row text-wrap">
            <a href="{{route('showbids')}}" class="badge badge-primary mx-auto text-wrap">Semua Lowongan</a>
        </div>
    </div>
</div>
@foreach($bids as $bid)

<div class="card m-3 shadow-sm rounded">
    @if($bid->status == "active")
    <div class="card-header text-white bg-primary">
    {{$bid->activity->name}}
    @else
    <div class="card-header text-white bg-secondary">
    (Tawaran Ditutup) {{$bid->activity->name}}
    @endif
    
</div>
    <div class="card-body">
        <blockquote class="blockquote mb-0">
            <dl class="row">
                <dt class="col-sm-3">Kode</dt>
                <dd class="col-sm-9">{{$bid->id}}</dd>
                <dt class="col-sm-3">Keterangan Pekerjaan</dt>
                <dd class="col-sm-9">{{$bid->keterangan}}</dd>
                <dt class="col-sm-3">Kegiatan</dt>
                <dd class="col-sm-9">({{$bid->service->name}}) {{$bid->activity->name}} mulai dari Rp.{{convertRupiah($bid->activity->harga)}} per {{$bid->activity->satuan}}</dd>
                <dt class="col-sm-3">Jumlah Applicant Tertarik</dt>
                @if($bid->status == "active")
                <dd class="col-sm-9"><a href="{{route('viewapplicants',$bid->id)}}">{{$bid->applicants->count()}} orang</a></dd>
                @else
                <dd class="col-sm-9">{{$bid->applicants->count()}} orang</dd>
                @endif
            </dl>
        </blockquote>
        <footer class="blockquote-footer">dibuat oleh <cite title="Source Title">{{$bid->creator->name}} ({{$bid->creator->detail->kampus_dosen}})</cite></footer>

    </div>
    <div class="card-footer text-muted">
        dipublikasi pada {{ date('d-M-Y', strtotime($bid->created_at)) }}
        @switch(Auth::user()->role)
        @case('dosen')
        @if($bid->status == "active")
        <div class="btn-group btn-group-sm float-right m-1" role="group" aria-label="Basic example">
            <a role="button" href="{{route('viewapplicants',$bid->id)}}" class="btn btn-sm btn-success m-1">Lihat Applicant</a>
            
            <a role="button" href="{{route('cancelbid',$bid->id)}}" class="btn btn-sm btn-secondary m-1">Batalkan</a>
            
        </div>
        @endif
        @break
        @case("operational")
        @if($bid->status == "active")
        <div class="btn-group btn-group-sm float-right m-1" role="group" aria-label="Basic example">
            <a role="button" href="{{route('viewapplicants',$bid->id)}}" class="btn btn-sm btn-success m-1">Lihat Applicant</a>
            <a role="button" href="{{route('cancelbid',$bid->id)}}" class="btn btn-sm btn-secondary m-1">Batalkan</a>
        </div>
        @endif
        
        @break
        @case('asdos')
        @if ($bid->applicants->where('user_id',Auth::user()->id)->count() < 1)
        <div class="btn-group btn-group-sm float-right" role="group" aria-label="Basic example">
            <a role="button" href="{{route('applybid',$bid->id)}}" class="btn btn-success">Mengajukan Diri</a>
        </div>
        @else
        <div class="btn-group btn-group-sm float-right" role="group" aria-label="Basic example">
            <a role="button" href="{{route('cancelapply',$bid->id)}}" class="btn btn-danger">Batal Mengajukan Diri</a>
        </div>
        
        @endif
        @break
        @endswitch
    </div>
</div>


@endforeach
{{$bids->links()}}
</div>