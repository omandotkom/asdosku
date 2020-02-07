<!-- Modal -->
<div class="modal fade" id="penelitianModal" tabindex="-1" role="dialog" aria-labelledby="titlePenelitian" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="titlePenelitian">Filter Asisten Penelitian</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" id="penelitianForm" action="{{route('viewAsdosBimbel')}}" name="penelitianForm">
                    @csrf
                    <div class="form-group">

                        <label for="penelitianactivity" class="col-form-label float-left">Jenis Kegiatan</label>
                        <select name="penelitianactivity" id="penelitianactivity" required class="custom-select custom-select-sm">
                        @foreach($penelitianactivity as $p)
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
                <button type="button" onclick="document.bimbelForm.submit();" class="btn btn-primary">Lanjutkan</button>
                </script>
            </div>
        </div>
    </div>
</div>