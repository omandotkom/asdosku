<!-- Modal -->
<div class="modal fade" id="bimbelModal" tabindex="-1" role="dialog" aria-labelledby="titleBimbel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="titleBimbel">Kriteria Asisten Bimbel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <script>
                    function generateBimbelURL(){
                        var url = "{{route('viewbimbinganbelajar')}}";
                        url = url.concat("/").concat($("#activitybimbel").val()).concat("/").concat($("#bimbelgender").val()).concat("/").concat($("#domisili_bimbel").val());
                        window.location = url;
                    }
                </script>
                    <div class="form-group">
                    
                        <label for="bimbelactivity" class="col-form-label float-left">Jenis Kegiatan</label>
                        <select name="activity" id="activitybimbel" required class="custom-select custom-select-sm">
                        @foreach($bimbelactivity as $b)
                            @if($b->first)
                            <option selected value="{{$b->id}}">{{$b->name}}</option>
                            @else
                            <option value="{{$b->id}}">{{$b->name}}</option>
                            @endif    
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group">

                        <label for="bimbelgender" class="col-form-label float-left">Gender</label>
                        <select name="bimbelgender" id="bimbelgender" required class="custom-select custom-select-sm">
                            <option selected value="Bebas">Bebas</option>
                            <option value="Pria">Pria</option>
                            <option value="Wanita">Wanita</option>
                        </select>
                    </div>

                    <div class="form-group">

                        <label for="domisili" class="col-form-label float-left">Domisili</label>
                        <select name="domisili" id="domisili_bimbel" required class="custom-select custom-select-sm">
                            <option value="purwokerto">Purwokerto</option>
                            <option value="yogyakarta">Yogyakarta</option>
                        </select>
                        <small>Pilih Domisili yang terdekat dari pilihan</small>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" onclick="generateBimbelURL();" class="btn btn-primary">Lanjutkan</button>
                </script>
            </div>
        </div>
    </div>
</div>