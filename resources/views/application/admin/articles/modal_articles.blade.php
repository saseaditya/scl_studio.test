<div class="modal fade" id="modalAddArticles" role="dialog" style="overflow-y: scroll;">
  <div class="modal-dialog modal-lg margin-top-30" role="document" >
    <form  id="formAddArticles" action="" enctype="multipart/form-data" method="POST">
      <input type="hidden" name="_token" value="{{ Session::token() }}" />
      <input type="hidden" name="txtIdROP" id="txtIdROP"/>
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="my-modal-history"><b> Add New Articles </b></h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <br>
          <!-- <hr class="divider no-margin-bottom"> -->
          <div class="row ">
            <span class="col-md-2 col-sm-3 col-3 semi-bold col-form-label">Title :</span>
            <div class="col-md-4 col-sm-9 col-9">
              <div class="form-group">
                <input type="hidden" name="hdID" id="hdID">
                <input type="text" class="form-control" name="txtTitle" id="txtTitle">
              </div>
            </div>
            <span class="col-md-2 col-sm-3 col-3 semi-bold col-form-label">Category :</span>
            <div class="col-md-4 col-sm-9 col-9">
              <select class="selectpicker" id="slctCategory" name="slctCategory" data-style="select-with-transition" title="Category" data-live-search="true" required>
              @foreach($dataCategory as $tmp)
                <option value="{{ $tmp->id }}">{{ $tmp->name }}</option>
              @endforeach
              </select>
            </div>
          </div>
          <div class="row">
            <span class="col-md-2 col-sm-3 col-3 semi-bold col-form-label">Description :</span>
            <div class="col-md-10 col-sm-9 col-9">
              <div class="form-group">
                <textarea type="text" class="form-control" name="txtDesc" id="txtDesc"> </textarea>
                <input type="hide" class="form-control" name="hdDesc" id="hdDesc">
              </div>
            </div>
          </div>
          <div class="row">
            <span class="col-md-2 col-sm-3 col-3 semi-bold col-form-label">Content :</span>
            <div class="col-md-10 col-sm-9 col-9">
              <div class="form-group">
                <textarea type="text" class="form-control" name="txtContent" id="txtContent"> </textarea>
                <input type="hide" class="form-control" name="hdContent" id="hdContent"> </input>
              </div>
            </div>
          </div>
          <br>
          <div class="text-right">
            <button onclick="goSubmit()" type="submit" id="submit-update" class="btn btn-md btn-success">Submit</button>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>

<div class="modal fade" tabindex="-1" id="modalViewArticle" role="dialog" >
  <div class="modal-dialog modal-lg" role="document">
    <form action="" id="form-count" enctype="multipart/form-data" method="POST">
      <input type="hidden" name="_token" value="{{csrf_token()}}">
      <div class="modal-content" >
         <div class="modal-header padding-top-20">
           <h3 class="modal-title" id="title">About Article</h3>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
            <i class="material-icons">clear</i>
          </button>
        </div>
        <br>
        <div class="modal-body padding-top-10">
          <div class="row padding-5 semi-bold">
            <div class="col-md-3 col-sm-4 col-4 bold">Title</div>
            <div class="col-md-9 col-sm-8 col-8">
              <span id="">: </span>
              <span id="lblTitle"></span>
            </div>
          </div>
          <div class="row padding-5 semi-bold">
            <div class="col-md-3 col-sm-4 col-4 bold">Category</div>
            <div class="col-md-9 col-sm-8 col-8">
              <span id="">: </span>
              <span id="lblCategory"></span>
            </div>
          </div>
          <div class="row padding-5 semi-bold">
            <div class="col-md-3 col-sm-4 col-4 bold">Description</div>
            <div class="col-md-9 col-sm-8 col-8">
              <span id="">: </span>
              <span id="lblDesc"></span>
            </div>
          </div>
          <div class="row padding-5 semi-bold">
            <div class="col-md-3 col-sm-4 col-4 bold">Content</div>
            <div class="col-md-9 col-sm-8 col-8">
              <span id="">: </span>
              <span id="lblContent"></span>
            </div>
          </div>

          <div class="text-right">
            <button type="button" data-dismiss="modal" class="btn btn-sm btn-link btn-danger">Close</button>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
<!-- End Modal -->

<script type="text/javascript">
  function check(id) {
    if ($('#bukuview'+id).is(':checked')) {
      $('#bukuhide'+id).attr('checked', true);
      $('#bukuview'+id).attr('checked', true);
      $("#row"+id).removeClass("active");
      $("#row"+id).addClass("non-active");
    } else {
      $('#bukuhide'+id).attr('checked', false);
      $('#bukuview'+id).attr('checked', false);
      $("#row"+id).addClass("active");
      $("#row"+id).removeClass("non-active");
    }
  }
</script>