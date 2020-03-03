<div class="modal fade" id="authmodal" tabindex="-1" role="dialog" aria-labelledby="authmodaltitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="authmodaaltitle">Pendaftaran Akun</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Bergabung Sebagai
                <button type="button" onclick='gotoRegisterDosen();' class="btn btn-primary mt-1 btn-sm btn-block">Dosen / Pengelola</button>
                <button type="button" onclick='gotoRegisterAsdos();' class="btn btn-primary btn-sm btn-block">Asdos</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function gotoRegisterDosen() {
        window.location = "{{ url('/register') }}";
    }

    function gotoRegisterAsdos() {
        window.location = "{{ url('/registerasdos') }}";
    }

    function gotoLogin() {
        window.location = "{{ url('/login') }}";
    }
</script>