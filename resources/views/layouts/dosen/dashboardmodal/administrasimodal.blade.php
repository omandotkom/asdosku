<!-- Modal -->
<script>
    function generatePengabdianURL(){
        var pengabdianURL = "{{route('viewgeneral')}}";
        pengabdianURL = pengabdianURL.concat("/").concat($("#pengabdianactivity").val());
        window.location = pengabdianURL;
    }
    </script>
<div class="modal fade" id="administrasiModal" tabindex="-1" role="dialog" aria-labelledby="titleadministrasi" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="titleadministrasi">Filter Asisten Administrasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               
                    <div class="form-group">

                        <label for="pengabdianactivity" class="col-form-label float-left">Jenis Kegiatan</label>
                        <select name="activity" id="pengabdianactivity" required class="custom-select custom-select-sm">
                        @foreach($pengabdianactivity as $p)
                            @if($p->first)
                            <option selected value="{{$p->id}}">{{$p->name}}</option>
                            @else
                            <option value="{{$p->id}}">{{$p->name}}</option>
                            @endif    
                        @endforeach
                        </select>
                    </div>
                    
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" onclick="generatePengabdianURL();" class="btn btn-primary">Lanjutkan</button>
                </script>
            </div>
        </div>
    </div>
</div>