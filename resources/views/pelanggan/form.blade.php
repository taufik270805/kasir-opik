<!-- Modal -->
<div class="modal fade" id="modalFormpelanggan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Pelanggan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form method="post" action="pelanggan">
                    @csrf
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-4 col-form-label">nama</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="ModalFormpelanggan" name="nama">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-4 col-form-label">email</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="ModalFormpelanggan" name="email">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-col-form-label">nomor_telepon</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="ModalFormpelanggan" name="nomor_telepon">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-4 col-form-label">alamat</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="ModalFormpelanggan" name="alamat">
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
{{-- modal import --}}

<div class="modal fade" id="formImportPelanggan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="mdoal-title" id="exampleModalLabel">Import Data karyawan</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('import-pelanggan') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="menu" class="form-label">File Excel</label>
                            <input type="file" name="import" id="import">
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">close</button>
                <button type="submit" class="btn btn-primary" id="btn-submit">Upload</button>
            </div>
            </form>
        </div>
    </div>
</div>