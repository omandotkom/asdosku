<div class="row">

  <div class="accordion" id="accordionServices">
    @foreach($asdoslist as $s)
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
          <dt class="col-sm-3">Nama Lengkap</dt>
          <dd class="col-sm-9">{{$s->name}}</dd>  
          
          <dt class="col-sm-3">Email</dt>
          <dd class="col-sm-9">{{$s->email}}</dd>  
          
          <dt class="col-sm-3">WhatsApp</dt>
          <dd class="col-sm-9">{{$s->wa}}</dd>  
          
          <dt class="col-sm-3">Gender</dt>
          <dd class="col-sm-9">{{$s->gender}}</dd>  
          
          <dt class="col-sm-3">Kampus</dt>
          <dd class="col-sm-9">{{$s->kampus}}</dd>  
          
          <dt class="col-sm-3">Jurusan</dt>
          <dd class="col-sm-9">{{$s->jurusan}}</dd>
          
          <dt class="col-sm-3">Alamat</dt>
          <dd class="col-sm-9">{{$s->alamat}}</dd>  
          </dl>
        </div>
      </div>
    </div>
    @endforeach

  </div>



</div>
</div>