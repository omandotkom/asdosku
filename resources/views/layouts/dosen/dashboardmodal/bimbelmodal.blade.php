<!-- Modal -->
<div class="modal fade" id="bimbelModal" tabindex="-1" role="dialog" aria-labelledby="titleBimbel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="titleBimbel">Filter Asisten Bimbel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" id="bimbelForm" action="{{route('viewAsdosBimbel')}}" name="bimbelForm" >
                @csrf    
                <div class="form-group">
                        <label for="message-text" class="col-form-label float-left">Jenis Kegiatan:</label>
                        <textarea required class="form-control" id="message-text"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="bimbelmapel" class="col-form-label float-left">Mata Pelajaran</label>
                        <select id="bimbelmapel" name="bimbelmapel" required class="custom-select custom-select-sm">
                            <option selected value="Matematika">Matematika</option>
                            <option value="Bahasa Inggris">Bahasa Inggris</option>
                            <option value="Bahasa Arab">Bahasa Arab</option>
                            <option value="Ilmu Pengetahuan Alam">Ilmu Pengetahuan Alam</option>
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