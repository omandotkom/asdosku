@php
function convertRupiah($val){
return number_format($val,2,',','.');
}
@endphp
<div class="row">
    <button type="button" data-toggle="modal" data-target="#pengeluaranModal" class="btn mx-auto mb-1 btn-sm btn-outline-primary">+ Tambah</button>

    <div class="table-responsive-xl w-100">
        <table class="table table-sm table-bordered ">
            <thead>
                <tr>
                    <th scope="col w-25">Catatan</th>
                    <th scope="col">Pengeluaran</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($spends as $spend)
                <tr>
                    <td class="w-25">{{$spend->note}}</td>
                    <td>Rp. {{convertRupiah($spend->amount)}}</td>
                    <td>{{$spend->date}}</td>
                    <td>
                        <a href="{{route('spenddelete',['id'=>$spend->id])}}" class="btn btn-sm btn-danger" role="button">Hapus</a>
                        </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
    {{$spends->links()}}

</div>
</div>

<div class="modal fade" id="pengeluaranModal" tabindex="-1" role="dialog" aria-labelledby="titleaddpengeluaran" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="titleaddpengeluaran">Tambah Pengeluaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="{{route('spend.store')}}">

                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="nominalcost">Nominal</label>
                        <input required type="number" name="spendamount" class="form-control" id="nominalcost" aria-describedby="costhelp" placeholder="Misal : 67500">
                        <small id="costhelp" class="form-text text-muted">Di isi dengan format seperti 67500 (tanpa titik dan simbol rupiah).</small>
                    </div>
                    <div class="form-group">
                        <label for="spenddate">Tanggal Transaksi</label>
                        <input required type="date" name="spenddate" class="form-control" id="spenddate" aria-describedby="spenddatehelp" placeholder="Pilih Tanggal">
                        <small id="spenddatehelp" class="form-text text-muted">Tanggal terjadinya pengeluaran.</small>
                    </div>
                    <div class="form-group">
                        <label for="keterangancost">Keterangan</label>
                        <textarea required class="form-control" aria-describedby="keteranganhelp" id="keterangancost" name="spendnote" placeholder="Pengeluaran untuk fotocopy sebesar 6500" aria-label="With textarea"></textarea>
                        <small id="keteranganhelp" class="form-text text-muted">Di isi dengan lengkap untuk apa/siapa.</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    </script>
                </div>
            </form>

        </div>
    </div>
</div>