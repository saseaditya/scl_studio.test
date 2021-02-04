@extends('application.include.master')

@section('title','Article List')

@section('content')
@include('application.admin.articles.modal_articles')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-info card-header-icon">
            <div class="row">
              <div class="col-md-10">
                <div class="card-icon">
                  <i class="material-icons">assignment</i>
                </div>
                <h4 class="card-title">List Articles</h4>
              </div>
              <div class="col-md-2 col-sm-6 col-6">
                <button type="button" class="btn btn-info padding-10 addnew" data-toggle="modal" data-target="#modalClient" id="btnAddNew" style="float: right;">
                  <i class="material-icons">create</i>
                  Add New
                </button>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="material-datatables">
              <table id="dataList" class="table table-striped table-no-bordered table-hover dataTables" cellspacing="0" width="100%" style="width:100%">
                <thead class="bold">
                  <tr>
                    <th class="disabled-sorting">No</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Category</th>
                    <th>Created Date</th>
                    <th class="disabled-sorting text-center">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <!-- {{ $no = 1 }} -->
                  @foreach($dataArticles as $tmp)
                    <tr>
                      <td>{{ $no++ }}</td>
                      <td>{{ $tmp->title }}</td>
                      <td>{!! $tmp->description !!}</td>
                      <td>{{ HelperData::getCategoryName($tmp->category_id) }}</td>
                      <td>{{ date('d M Y - H:i:s',strtotime($tmp->created_date)) }}</td>
                      <td class="td-actions text-center">
                        <a href="#" onclick="View(`{{ $tmp->id }}`,`{{ $tmp->title }}`,`{{ $tmp->category_id }}`,
                          `{{ $tmp->description }}`,`{{ $tmp->content }}`)">
                          <button type="button" class="btn btn-info" data-toggle="tooltips" data-placement="top" title="Detail">
                            <i class="material-icons">remove_red_eye</i>
                          </button>
                        </a> 
                        <a href="#" onclick="Edit(`{{ $tmp->id }}`,`{{ $tmp->title }}`,`{{ $tmp->category_id }}`,
                          `{{ $tmp->description }}`,`{{ $tmp->content }}`)">
                          <button type="button" class="btn btn-warning" data-toggle="tooltips" data-placement="top" title="Detail">
                            <i class="material-icons">create</i>
                          </button>
                        </a>
                        <a href="#">
                          <button type="button" class="btn btn-danger delete" data-toggle="tooltips" data-placement="top" title="Detail" value="{{ $tmp->id }}">
                            <i class="material-icons">delete_forever</i>
                          </button>
                        </a>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
          <!-- end content-->
        </div>
        <!--  end card  -->
      </div>
      <!-- end col-md-12 -->
    </div>
    <!-- end row -->
  </div>
</div>
@endsection
@section('additionalCSS')
<style type="text/css">
  .autocomplete-suggestions { border: 1px solid #999; background: #FFF; overflow: auto; }
  .autocomplete-suggestion { padding: 2px 5px; white-space: nowrap; overflow: hidden; }
  .autocomplete-selected { background: #F0F0F0; }
  .autocomplete-suggestions strong { font-weight: normal; color: #3399FF; }
</style>
@endsection
@section('additionalJS')
<script type="text/javascript">
  var table = "";
  function Edit(id,title,category,desc,content) {
    CKEDITOR.instances.txtDesc.setData(desc);
    CKEDITOR.instances.txtContent.setData(content);
    $('#txtTitle').val(title);
    $('#slctCategory').val(category).selectpicker('refresh');
    $('#formAddArticles').attr('action','{{route('actionCUArticles')}}/'+id);
    $('#my-modal-history').text('Edit Article');
    $('#submit-update').text('Submit');
    $('#modalAddArticles').modal('show');
  }

  function View(id,title,category,desc,content) {
    $('#lblTitle').text(title);
    $('#lblCategory').text(category);
    $('#lblDesc').html(desc);
    $('#lblContent').html(content);
    $('#modalViewArticle').modal('show');
  }

  $(document).ready(function() {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    CKEDITOR.replace('txtDesc');
    CKEDITOR.replace('txtContent');

    $('body').on('click', '.addnew', function () {
      CKEDITOR.instances.txtDesc.setData('');
      CKEDITOR.instances.txtContent.setData('');
      $('#slctCategory').val(0).selectpicker('refresh');
      $('#txtTitle').val(' ');
      $('#formAddArticles').attr('action','{{route('actionCUArticles')}}');
      $('#my-modal-history').text('Add New Article');
      $('#submit-update').text('Submit');
      $('#modalAddArticles').modal('show');
    });

    $('body').on('click', '.delete', function (id) {
      id = $(this).val();
      swal({
        title: 'Are you sure?',
        text: "want delete this article !",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#ea3729',
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
      }).then((willDelete) => {
        if (willDelete.value) {
          swal({
            title: 'Delete Success!',
            text: "article has deleted!",
            type: 'success',
          }).then((value) => {
            location.href = "{{route('viewCategory')}}/"+id;
           /* $.ajax({
              type: "GET",
              url: "{{ route('viewCategory') }}/"+id,
              success: function (data) {
                location.href = "{{route('viewCategory')}}";
              },
              error: function (data) {
                console.log('Error:', data);
              }
            });*/
          });
        } else {
          swal(
            'Cancelled',
            'Your file is safe :)',
            'error'
          );
        }
      });
    });
  });

  function goSubmit() {
    var txtDesc     = CKEDITOR.instances.txtDesc.getData();
    var txtContent  = CKEDITOR.instances.txtContent.getData();
    $('#hdContent').val(txtContent);
    $('#hdDesc').val(txtDesc);
  }

</script>
@endsection