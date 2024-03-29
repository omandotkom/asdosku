<div class="row">
    <div class="col-xl-3 col-lg-5">
        <div class="card shadow mb-4">
{{-- untuk daftar layanan --}}
            <!-- Card Body -->
            <div class="card-body">

                <div class="mt-4 text-center small">

                    <i class="fas fa-fw fa-child fa-7x"></i>
                    @if(Auth::user()->subrole != "mahasiswa")
                    <p class="h3 mt-2">Asisten Bimbel</p>
                    @else
                    <p class="h3 mt-2">Teman Bimbel</p>
                    @endif
                    @include('layouts.dosen.dashboardmodal.bimbelmodal')
                    <button type="button" data-toggle="modal" data-target="#bimbelModal" class="btn btn-outline-primary btn-block btn-lg mt-2">Cari</button>
                </div>
            </div>
        </div>
    </div>
    @if(Auth::user()->subrole != "mahasiswa")
    <div class="col-xl-3 col-lg-5">
        <div class="card shadow mb-4">

            <!-- Card Body -->
            <div class="card-body">

                <div class="mt-4 text-center small">

                    <i class="fas fa-fw fa-chalkboard-teacher fa-7x"></i>
                    <p class="h3 mt-2">Asisten Matakuliah</p>
                    @include('layouts.dosen.dashboardmodal.makulmodal')
                    <button type="button" data-toggle="modal" data-target="#makulModal" class="btn btn-outline-primary btn-lg btn-block mt-2">Cari</button>
                </div>
            </div>
        </div>
    </div>
    @endif
    @if(Auth::user()->subrole != "mahasiswa")
    <div class="col-xl-3 col-lg-5">
        <div class="card shadow mb-4">

            <!-- Card Body -->
            <div class="card-body">

                <div class="mt-4 text-center small">

                    <i class="fas fa-fw fa-flask fa-7x"></i>
                    <p class="h3 mt-2">Asisten Praktikum</p>
                    @include('layouts.dosen.dashboardmodal.praktikummodal')

                    <button type="button" data-toggle="modal" data-target="#praktikumModal" class="btn btn-outline-primary btn-block btn-lg mt-2">Cari</button>
                </div>
            </div>
        </div>
    </div>
    @endif

    <div class="col-xl-3 col-lg-5">
        <div class="card shadow mb-4">

            <!-- Card Body -->
            <div class="card-body">

                <div class="mt-4 text-center small">

                    <i class="fas fa-fw fa-book fa-7x"></i>
                    @if(Auth::user()->subrole != "mahasiswa")
                    <p class="h3 mt-2">Asisten Penelitian</p>
                    @else
                    <p class="h3 mt-2">Teman Penelitian</p>
                    @endif
                    @include('layouts.dosen.dashboardmodal.penelitianmodal')
                    <button type="button" class="btn btn-outline-primary btn-block btn-lg mt-2" data-toggle="modal" data-target="#penelitianModal">Cari</button>
                </div>
            </div>
        </div>
    </div>


    @if(Auth::user()->subrole != "mahasiswa")
    <div class="col-xl-3 col-lg-5">
        <div class="card shadow mb-4">

            <!-- Card Body -->
            <div class="card-body">

                <div class="mt-4 text-center small">

                    <i class="fab fa-leanpub fa-7x"></i>
                    <p class="h3 mt-2">Asisten Proyek</p>
                    @include('layouts.dosen.dashboardmodal.proyekmodal')
                    <button type="button" class="btn btn-outline-primary btn-block btn-lg mt-2" data-toggle="modal" data-target="#proyekModal">Cari</button>
                </div>
            </div>
        </div>
    </div>
    @endif
    @if(Auth::user()->subrole != "mahasiswa")
    <div class="col-xl-3 col-lg-5">
        <div class="card shadow mb-4">

            <!-- Card Body -->
            <div class="card-body">

                <div class="mt-4 text-center small">

                    <i class="fas fa-fw fa-list-ol fa-7x"></i>
                    <p class="h3 mt-2">Asisten Administrasi</p>
                    @include('layouts.dosen.dashboardmodal.administrasimodal')
                    <button type="button" class="btn btn-outline-primary btn-block btn-lg mt-2" data-toggle="modal" data-target="#administrasiModal">Cari</button>

                </div>
            </div>
        </div>
    </div>
    @endif
    <div class="col-xl-3 col-lg-5">
        <div class="card shadow mb-4">

            <!-- Card Body -->
            <div class="card-body">

                <div class="mt-4 text-center small">

                    <i class="fas fa-fw fa-pencil-alt fa-7x"></i>
                    @if(Auth::user()->subrole != "mahasiswa")
                    <p class="h3 mt-2">Asisten Karya</p>
                    @else
                    <p class="h3 mt-2">Teman Karya</p>
                    
                    @endif
                    @include('layouts.dosen.dashboardmodal.karyamodal')
                    <button type="button" class="btn btn-outline-primary btn-block btn-lg mt-2" data-toggle="modal" data-target="#karyaModal">Cari</button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-5">
        <div class="card shadow mb-4">

            <!-- Card Body -->
            <div class="card-body">

                <div class="mt-4 text-center small">

                    <i class="fas fa-paint-brush fa-7x"></i>
                    @if(Auth::user()->subrole != "mahasiswa")
                    <p class="h3 mt-2">Asisten Designer</p>
                    @else
                    <p class="h3 mt-2">Teman Designer</p>
                    @endif
                    
                    @include('layouts.dosen.dashboardmodal.desainermodal')
                    <button type="button" class="btn btn-outline-primary btn-block btn-lg mt-2" data-toggle="modal" data-target="#desainerModal">Cari</button>
                </div>
            </div>
        </div>
    </div>

     <div class="col-xl-3 col-lg-5">
        <div class="card shadow mb-4">

            <!-- Card Body -->
            <div class="card-body">

                <div class="mt-4 text-center small">

                    
                    <span class="text-primary"><i class="fa fa-graduation-cap fa-7x"></i></span>

                    @if(Auth::user()->subrole != "mahasiswa")
                    <p class="h3 mt-2">Asdosku Akademy</p>
                    @else
                    <p class="h3 mt-2">Teman Akademy</p>
                    @endif
                    
                    @include('layouts.dosen.dashboardmodal.asdoskuakademymodal')
                    <button type="button" class="btn btn-outline-primary btn-block btn-lg mt-2" id="myButton">Cari</button>
                </div>
            </div>
        </div>
    </div>

</div>
</div>
<script type="text/javascript">
    document.getElementById("myButton").onclick = function () {
        location.href = "http://www.akademi.asdosku.com";
    };
</script>