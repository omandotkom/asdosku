<div class="row">
    @foreach($asdoslist as $asdos)
    <div class="col-xl-3 col-lg-5">
        <div class="card shadow mb-4">

            <!-- Card Body -->
            <div class="card-body">

                <div class="mt-4 text-center small">

                    <i class="fas fa-fw fa-user fa-7x"></i>
                    <p class="h3 mt-2">{{$asdos->name}}</p>
                 
                    <button type="button"  class="btn btn-outline-primary btn-block btn-lg mt-2">Pilih</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    </div>

    



</div>
