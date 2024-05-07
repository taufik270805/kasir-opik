<!-- Modal -->
<div class="modal fade" id="modalFormstock" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Stock</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form method="post" action="stock">
                    @csrf

                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-4 col-form-label">Jumlah</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="ModalFormstock" name="jumlah">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="menu_id" class="col-sm-4 col-form-label">Menu Id</label>
                        <div class="col-sm-8">
                            <select name="menu_id" id="menu_id" class="form-control">
                                <option value="halo">pilih menu</option>
                                @foreach ($menu as $m)
                                    <option value="{{ $m->id }}">{{ $m->nama }}</option>
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
