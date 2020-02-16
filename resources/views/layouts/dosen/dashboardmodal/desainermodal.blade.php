<!-- Modal -->
<script>
    function generateDesainerURL(){
        var desainerURL = "{{route('viewgeneral')}}";
        desainerURL = desainerURL.concat("/").concat($("#desaineractivity").val());
        window.location = desainerURL;
    }
    </script>
<div class="modal fade" id="desainerModal" tabindex="-1" role="dialog" aria-labelledby="titledesainer" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="titledesainer">Filter Asisten Desainer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <div class="form-group">

                        <label for="desaineractivity" class="col-form-label float-left">Jenis Kegiatan</label>
                        <select name="activity" id="desaineractivity" required class="custom-select custom-select-sm">
                        @foreach($desaineractivity as $p)
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
                <button type="button" onclick="generateDesainerURL();" class="btn btn-primary">Lanjutkan</button>
                </script>
            </div>
        </div>
    </div>
</div>