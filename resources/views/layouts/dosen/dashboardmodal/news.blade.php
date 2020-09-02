<!-- Modal -->
<script type="text/javascript">
    $(window).on('load', function() {
        $('#newsmodal').modal('show');
    });
</script>
<div class="modal fade" id="newsmodal" tabindex="-1" role="dialog" aria-labelledby="newstitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newstitle"><i class="fa fa-newspaper-o"></i> Kabar Terbaru!!!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
               <a href="https://blog.asdosku.com/bukaasdosku/" target="_blank"> <img src="{{asset('storage/gallery/pop_up_break.png')}}" class="d-block rounded mx-auto img-fluid" alt="News"></a>
               {{--<a href="https://blog.asdosku.com/bukaasdosku/" target="_blank" class="badge badge-info mt-2">baca lebih lengkap</a>--}}
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-outline-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>