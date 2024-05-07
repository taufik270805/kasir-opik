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
                        <label for="nama" class="col-sm-2 col-form-label">nama</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="nama">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">email</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="email" name="email"
                                placeholder="email">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nomor_telepon" class="col-sm-2 col-form-label">NoTelp</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="nomor_telepon" name="nomor_telepon"
                                placeholder="nomor_telepon">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="alamat" class="col-sm-2 col-form-label">alamat</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="alamat" name="alamat"
                                placeholder="alamat">
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Edit</button>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
</div>
