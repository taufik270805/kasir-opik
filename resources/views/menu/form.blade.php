<div class="modal fade" id="modalFormMenu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">pilih menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="menu">
                    <div id="method"></div>
                    @csrf
                    <div class="form-group row">
                        <label for="nama" class="col-sm-4 col-form-label">Nama</label>
                        <div class="col-sm-8">
                            <input type="text" class="nama form-control" id="nama" name="nama"
                                placeholder="Nama menu">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="harga_id" class="col-sm-4 col-form-label">harga</label>
                        <div class="col-sm-8">
                            <input type="nomber" class="form-control" id="harga" name="harga"
                                placeholder="harga">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="image" class="col-sm-4 col-form-label">IMage</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="image" name="image"
                                placeholder="image">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="deskripsi" class="col-sm-4 col-form-label">Deskripsi</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="deskripsi" name="deskripsi"
                                placeholder="deskripsi">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jenis_id" class="col-sm-4 col-form-label">Jenis</label>
                        <div class="col-sm-8">
                            <select name="jenis_id" id="jenis_id" class="form-control">
                                <option value="halo">Pilih Jenis</option>
                                @foreach ($jenis as $k)
                                    <option value="{{ $k->id }}">{{ $k->nama_jenis }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modalImportData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Import Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('import-menu') }}" enctype="multipart/form-data">
                    <div id="method"></div>
                    @csrf
                    <div class="form-group row">
                        <label for="file" class="col-sm-4 col-form-label">File Data</label>
                        <div class="col-sm-8">
                            <input type="file" accept=".xlsx" class="file" id="file" name="file"
                                style="opacity: 1; position: relative;">
                        </div>
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
