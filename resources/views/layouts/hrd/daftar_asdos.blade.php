<div class="row">
  <div class="col-xl-12 col-lg-12">
    <div class="card shadow mb-4">


      <!-- Card Body -->
      
        <div class="card-header">
          <div class="col-12">

            <form method="get" action="{{route('view-all-asdos')}}">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Pencarian" name="keyword" value="{{ app('request')->input('keyword') }}" required="">
               <select class="form-control" name="column">
                <option value="nama" @if(app('request')->input('column') == 'nama') selected @endif >Nama</option>
                <option value="email" @if(app('request')->input('column') == 'email') selected @endif>Email</option>
                <option value="wa" @if(app('request')->input('column') == 'wa') selected @endif>No Telpon</option>
                <option value="kampus" @if(app('request')->input('column') == 'kampus') selected @endif>Kampus</option>
                <option value="jurusan" @if(app('request')->input('column') == 'jurusan') selected @endif>jurusan</option>
                  <option value="status" @if(app('request')->input('column') == 'status') selected @endif>Status</option>
              </select>

              <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit">Cari</button>
              </div>
              </form>
            
              <a href="{{route('view-all-asdos')}}" class="btn btn-primary ml-2">Tampilkan Semua</a>
            </div>
            <small>Khusus untuk status pencariannya berupa <b>Aktif</b> / <b>Belum Aktif</b> / <b>Gagal</b> </small>

          </div>
          
         
        </div>
        <div class="card-body">
           <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Email</th>
                  <th scope="col">No Telpon</th>
                  <th scope="col">Kampus</th>
                  <th scope="col">Jurusan</th>
                  <th scope="col">Domisili</th>
                  <th scope="col">Status</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach($users as $user)
                <tr>
                  <th scope="row">{{$loop->iteration}}</th>
                  <td>{{$user->name}}</td>
                  <td>{{$user->email}}</td>
                  <td>{{$user->wa}}</td>
                  <td>{{$user->kampus}}</td>
                  <td>{{$user->jurusan}}</td>
                  <td>{{$user->domisili}}</td>
                  <td>{{$user->status}}</td>
                  <td>
                    <a href="{{route('view-asdos-detail',$user->id)}}" class="btn btn-primary">Detail</a>
                  </td>
                </tr>
                @endforeach
              </tbody>

              {{ $users->links() }}
            </table>
          </div>
        </div>
    

    </div>
  </div>
