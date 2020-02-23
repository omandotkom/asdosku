<div class="row">
    <div class="col-xl-3 col-lg-5">
        <div class="card shadow mb-4">

            <!-- Card Body -->
            <div class="card-body">

                <div class="mt-4 text-center small">

                    <i class="fas fa-fw fa-chalkboard fa-7x"></i>
                    <p class="h3 mt-2">Asisten Bimbel</p>
                    @include('layouts.dosen.dashboardmodal.bimbelmodal')
                    <button type="button" data-toggle="modal" data-target="#bimbelModal" class="btn btn-outline-primary btn-block btn-lg mt-2">Cari</button>
                </div>
            </div>
        </div>
    </div>

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

    <div class="col-xl-3 col-lg-5">
        <div class="card shadow mb-4">

            <!-- Card Body -->
            <div class="card-body">

                <div class="mt-4 text-center small">

                    <i class="fas fa-fw fa-atom fa-7x"></i>
                    <p class="h3 mt-2">Asisten Praktikum</p>
                    @include('layouts.dosen.dashboardmodal.praktikummodal') 

                    <button type="button" data-toggle="modal" data-target="#praktikumModal" class="btn btn-outline-primary btn-block btn-lg mt-2">Cari</button>
                </div>
            </div>
        </div>
    </div>


    <div class="col-xl-3 col-lg-5">
        <div class="card shadow mb-4">

            <!-- Card Body -->
            <div class="card-body">

                <div class="mt-4 text-center small">

                    <i class="fas fa-fw fa-university fa-7x"></i>
                    <p class="h3 mt-2">Asisten Penelitian</p>
                    @include('layouts.dosen.dashboardmodal.penelitianmodal')
                    <button type="button" class="btn btn-outline-primary btn-block btn-lg mt-2" data-toggle="modal" data-target="#penelitianModal">Cari</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">


    <div class="col-xl-3 col-lg-5">
        <div class="card shadow mb-4">

            <!-- Card Body -->
            <div class="card-body">

                <div class="mt-4 text-center small">

                    <i class="fas fa-fw fa-people-carry fa-7x"></i>
                    <p class="h3 mt-2">Asisten Proyek</p>
                    @include('layouts.dosen.dashboardmodal.proyekmodal')
                    <button type="button" class="btn btn-outline-primary btn-block btn-lg mt-2" data-toggle="modal" data-target="#proyekModal">Cari</button>
                 </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-lg-5">
        <div class="card shadow mb-4">

            <!-- Card Body -->
            <div class="card-body">

                <div class="mt-4 text-center small">

                    <i class="fas fa-fw fa-person-booth fa-7x"></i>
                    <p class="h3 mt-2">Asisten Administrasi</p>
                    @include('layouts.dosen.dashboardmodal.administrasimodal')
                    <button type="button" class="btn btn-outline-primary btn-block btn-lg mt-2" data-toggle="modal" data-target="#administrasiModal">Cari</button>
                
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-lg-5">
        <div class="card shadow mb-4">

            <!-- Card Body -->
            <div class="card-body">

                <div class="mt-4 text-center small">

                    <i class="fas fa-fw fa-pencil-ruler fa-7x"></i>
                    <p class="h3 mt-2">Asisten Karya</p>
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

                    <i class="fas fa-fw fa-ruler fa-7x"></i>
                    <p class="h3 mt-2">Asisten Designer</p>
                    @include('layouts.dosen.dashboardmodal.desainermodal')
                    <button type="button" class="btn btn-outline-primary btn-block btn-lg mt-2" data-toggle="modal" data-target="#desainerModal">Cari</button>
                </div>
            </div>
        </div>
    </div>

</div>
</div>
    