<!-- Modal -->
<script>
    function generateMatakuliahURL() {
        var matakuliahURL = "{{route('filterasdosmarketing')}}";
       matakuliahURL= matakuliahURL.concat("/").concat($("#kampus").val());
       window.location = matakuliahURL;
    }
</script>
<div class="modal fade" id="browseasdos" tabindex="-1" role="dialog" aria-labelledby="titlebrowseasdos" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="titlebrowseasdos">Filter Asisten Dosen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="mapel" class="col-form-label float-left">Asal Kampus</label>
                    <select required id="kampus" name="kampus" class="custom-select custom-select-sm"> @foreach($campuses as $p)
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
                <button type="button" onclick="generateMatakuliahURL();" class="btn btn-primary">Lanjutkan</button>
            </div>
        </div>
    </div>
</div>