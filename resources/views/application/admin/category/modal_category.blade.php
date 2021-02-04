<div class="modal fade" id="modalCategory" role="dialog" style="overflow-y: scroll;">
  <div class="modal-dialog modal-md margin-top-30" role="document">
    <form  id="formUser" action="" enctype="multipart/form-data" method="POST">
      <input type="hidden" name="_token" value="{{ Session::token() }}" />
      <input type="hidden" name="txtIdROP" id="txtIdROP"/>
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="my-modal-history"><b> Tambah User Baru </b></h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <br>
          <!-- <hr class="divider no-margin-bottom"> -->
          <div class="row ">
            <span class="col-md-2 col-sm-3 col-3 semi-bold col-form-label">Nama :</span>
            <div class="col-md-10 col-sm-9 col-9">
              <div class="form-group">
                <input type="hidden" name="hdID" id="hdID">
                <input type="text" class="form-control" name="txtNama" id="txtNama">
              </div>
            </div>
          </div>
          <br>
          <!-- <hr class="divider"> -->
          <div class="text-right">
            <button type="submit" id="submit-update" class="btn btn-md btn-success">Submit</button>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>