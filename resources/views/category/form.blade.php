<!-- Modal -->
<div class="modal fade" id="modalFormCategory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form method="post" action="category">
          @csrf
          <div class="form-group row">
            <label for="staticEmail" class="col-sm-4 col-form-label">Nama Category</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="ModalFormCategory" name="nama">
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