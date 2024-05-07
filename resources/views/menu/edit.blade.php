<!-- Modal -->
<div class="modal fade iniModalEdit" id="modalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="menu" class="form-edit" id="form-edit-menu">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label for="nama_menu" class="col-s  m-2 col-form-label">Nama menu</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="nama_menu_edit" name="nama"
                                placeholder="Nama menu">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="harga_id" class="col-sm-2 col-form-label">harga</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="harga_id" name="harga_id"
                                placeholder="Deskripsi">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="image" class="col-sm-2 col-form-label">Image</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="image_edit" name="image"
                                placeholder="Image">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="deskripsi_edit" name="deskripsi"
                                placeholder="Deskripsi">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jenis_id" class="col-sm-2 col-form-label">Jenis</label>
                        <div class="col-sm-8">
                            <select name="jenis_id" id="jenis_id" class="form-control">
                                <option value="halo">Pilih Jenis</option>
                                @foreach ($jenis as $k)
                                    <option value="{{ $k->id }}">{{ $k->nama_jenis }}</option>
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
