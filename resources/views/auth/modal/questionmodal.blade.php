<div class="modal fade" id="questionmodal" tabindex="-1" role="dialog" aria-labelledby="questionmodal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="costmodaltitle">Hubungi Kami</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="text-center">Berikan kami pertanyaan atau saran.</p>
                <form action="javascript:void(0);">

                    <div class="form-group">
                        <label for="namequestion">Nama</label>
                        <input required type="text" name="namequestion" class="form-control" id="namequestion" value="@auth {{Auth::user()->name}} @endauth"/>
                    </div>
                    <div class="form-group">
                        <label for="emailquestion">Email</label>
                        <input required type="email" name="emailquestion" class="form-control" id="emailquestion" value="@auth {{Auth::user()->email}} @endauth"/>
                    </div>
                    <div class="form-group">
                        <label for="question">Pertanyaan atau Saran</label>
                        <textarea required class="form-control" aria-describedby="keteranganhelp" id="question"></textarea>
                    </div>
                </form>
                <small>* Jawaban akan dikirim via email atau whatsapp se segera mungkin.</small>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" onclick="postquestion();" data-dismiss="modal" class="btn btn-success">Kirim</button>
            </div>
        </div>
    </div>
</div>
<script>
    function postquestion() {
      axios.post('{{route("guestquestion")}}', {
          name: $("#namequestion").val(),
          email: $("#emailquestion").val(),
          subject: "Pertanyaan dari Auth",
          question: $("#question").val()
        })
        .then(function(response) {
          Toastify({
            text: response.data,
            duration: 3000,
            newWindow: true,
            close: true,
            gravity: "bottom", // `top` or `bottom`
            position: 'center', // `left`, `center` or `right`
            backgroundColor: "linear-gradient(to right, #56ab2f, #a8e063)",

          }).showToast();

        })
        .catch(function(error) {
          console.log(error);
          Toastify({
            text: "Gagal mengirim pesan, periksa semua kolom termasuk format email",
            duration: 3000,
            newWindow: true,
            close: true,
            gravity: "top", // `top` or `bottom`
            position: 'center', // `left`, `center` or `right`
            backgroundColor: "linear-gradient(to right, #ff416c, #ff4b2b)",

          }).showToast();
        });
    }
</script>