<!-- Modal -->
<div class="modal fade" id="makulModal" tabindex="-1" role="dialog" aria-labelledby="titleMakul" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="titleMakul">Filter Asisten Matakuliah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="/profile">
                    
                    <div class="form-group">
                        <label for="mapel" class="col-form-label float-left">Matakuliah</label>
                        
                        <select required class="custom-select custom-select-sm"> @foreach($matakuliahactivity as $p)
                            @if($p->first)
                            <option selected value="{{$p->id}}">{{$p->name}}</option>
                            @else
                            <option value="{{$p->id}}">{{$p->name}}</option>
                            @endif    
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="semester" class="col-form-label float-left">Semester</label>
                        <select name="semester" required class="custom-select custom-select-sm">
                            <option selected value="Bebas">Bebas</option>
                            @for ($i = 1; $i < 10; $i++)<option value="{{$i}}"> {{$i}} </option>
                                @endfor
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="kampus" class="col-form-label float-left">Asal Kampus</label>
                        <select name="kampus" required class="custom-select custom-select-sm">
                            <option selected value="Bebas">Bebas</option>
                            <option id='(UNSOED) Universitas Jendral Soederiman'>(UNSOED) Universitas Jendral Soederiman</option>
                            <option id='(Poltekes) Poli Teknik Kesehatan Negri Semarang Kampus Purwokerto'>(Poltekes) Poli Teknik Kesehatan Negri Semarang Kampus Purwokerto</option>
                            <option id='(IAIN) Institut Agama Islam Negri Purwokerto'>(IAIN) Institut Agama Islam Negri Purwokerto</option>
                            <option id='(ITTP) Institut Teknologi Telkom Purwokerto'>(ITTP) Institut Teknologi Telkom Purwokerto</option>
                            <option id='(UMP) Universitas Muhammadiyah Purwokerto'>(UMP) Universitas Muhammadiyah Purwokerto</option>
                            <option id='(UNWIKU) Universitas Wijaya Kusuma Purwokerto'>(UNWIKU) Universitas Wijaya Kusuma Purwokerto</option>
                            <option id='(SWU) Sekolah Tinggi Manajemen Informatika dan Komputer Widya Utama Purwokerto'>(SWU) Sekolah Tinggi Manajemen Informatika dan Komputer Widya Utama Purwokerto</option>
                            <option id='Akademi Manajemen Informatika dan Komputer BSI Purwokerto'>Akademi Manajemen Informatika dan Komputer BSI Purwokerto</option>
                            <option id='Sekolah Tinggi Teknik Wiworotomo Purwokerto'>Sekolah Tinggi Teknik Wiworotomo Purwokerto</option>
                            <option id='Akademi Kebidanan YLPP Purwokerto'>Akademi Kebidanan YLPP Purwokerto</option>
                            <option id='Sekolah Tinggi Manajemen Informatika dan Komputer Amikom Purwokerto'>Sekolah Tinggi Manajemen Informatika dan Komputer Amikom Purwokerto</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jurusan" class="col-form-label float-left">Jurusan</label>
                        <select name="jurusan" required class="custom-select custom-select-sm">
                            <option selected value="Bebas">Bebas</option>
                            <option id='Teknik Informatika'>Teknik Informatika</option>
                            <option id='Teknik Telekomunikasi'>Teknik Telekomunikasi</option>
                            </select>
                    </div>
                    <div class="form-group">
                        <label for="gender" class="col-form-label float-left">Gender</label>
                        <select required class="custom-select custom-select-sm">
                            <option selected value="Bebas">Bebas</option>
                            <option value="Pria">Pria</option>
                            <option value="Wanita">Wanita</option>
                        </select>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary">Lanjutkan</button>
            </div>
        </div>
    </div>
</div>