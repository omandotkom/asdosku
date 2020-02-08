<!-- Modal -->
<div class="modal fade" id="pengabdianModal" tabindex="-1" role="dialog" aria-labelledby="titlepengabdian" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="titlepengabdian">Filter Asisten Pengabdian</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" id="pengabdianForm" action="{{route('filteredAsdos','pengabdian')}}" name="pengabdianForm">
                    @csrf
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
                    
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" onclick="document.pengabdianForm.submit();" class="btn btn-primary">Lanjutkan</button>
                </script>
            </div>
        </div>
    </div>
</div>