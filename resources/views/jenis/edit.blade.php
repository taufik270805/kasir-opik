<div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="" class="form-edit">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label for="nama_jenis" class="col-sm-2 col-form-label">Jenis</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="nama_jenis" name="nama_jenis"
                                placeholder="Nama Jenis">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="kategori_id" class="col-sm-2 col-form-label">Kategori</label>
                        <div class="col-sm-9">
                            <select name="kategori_id" id="kategori_id" class="form-control">
                                <option value="halo">Pilih Kategori</option>
                                @foreach ($kategori as $k)
                                    <option value="{{ $k->id }}">{{ $k->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Edit</button>
            </div>
            </form>
        </div>
    </div>
</div>
