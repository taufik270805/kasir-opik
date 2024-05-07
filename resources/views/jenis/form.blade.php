<!-- Modal -->
<div class="modal fade" id="modalFormJenis" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Jenis</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form method="post" action="jenis">
                    @csrf
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-4 col-form-label">Nama Jenis</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="ModalFormJenis" name="nama_jenis">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="kategori_id" class="col-sm-4 col-form-label">Kategori Id</label>
                        <div class="col-sm-8">
                            <select name="kategori_id" id="kategori_id" class="form-control">
                                <option value="halo">pilih kategori</option>
                                @foreach ($kategori as $k)
                                    <option value="{{ $k->id }}">{{ $k->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambahkan</button>

            </div>
            </form>
        </div>
    </div>
</div>
