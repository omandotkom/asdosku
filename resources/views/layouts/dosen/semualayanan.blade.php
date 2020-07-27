<div class="row">

  <div class="accordion" id="accordionServices">
    
    @foreach($services as $s)
    <div class="card">
      <div class="card-header" id="headingcollapse{{$s->id}}">
        <h2 class="mb-0">
          <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse{{$s->id}}" aria-expanded="false" aria-controls="collapse{{$s->id}}">
            {{$s->name}} <i class="fas fa-caret-down"></i>
          </button>
        </h2>
      </div>
      <div id="collapse{{$s->id}}" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionServices">
        <div class="card-body">
          <dl class="row">
            @foreach($s->activities as $a)
            <dt class="col-sm-3">{{$a->name}}</dt>
            <dd class="col-sm-9">{{$a->keterangan}}</dd>
            @endforeach
          </dl>
        </div>
      </div>
    </div>
    @endforeach

  </div>



</div>
</div>