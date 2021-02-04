@extends('application.include.master')

@section('title','Daftar Category')

@section('content')
@include('application.admin.category.modal_category')
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
                <h4 class="card-title">List Category</h4>
              </div>
              <div class="col-md-2 col-sm-6 col-6">
                <button type="button" class="btn btn-info padding-10" data-toggle="modal" data-target="#modalClient" id="btnAddNew" style="float: right;">
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
                    <th>Name Category</th>
                    <th>Created Date</th>
                    <th>Last Edit</th>
                    <th class="disabled-sorting text-center">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <!-- {{ $no = 1 }} -->
                  @foreach($dataCategory as $data)
                    <tr>
                      <td>{{ $no++ }}</td>
                      <td>{{ $data->name }}</td>
                      <td>{{ date('d M Y - H:i:s',strtotime($data->created_date)) }}</td>
                      @if($data->last_edit == null || $data->last_edit == '')
                      <td> - </td>
                      @else
                      <td>{{ date('d M Y - H:i:s',strtotime($data->last_edit)) }}</td>
                      @endif
                      <td class="td-actions text-center">
                        <a href="#" onclick="Edit(`{{ $data->id }}`,`{{ $data->name }}`)">
                          <button type="button" class="btn btn-warning" data-toggle="tooltips" data-placement="top" title="Detail">
                            <i class="material-icons">create</i>
                          </button>
                        </a>
                        <a href="#">
                          <button type="button" class="btn btn-danger delete" data-toggle="tooltips" data-placement="top" title="Detail" value="{{ $data->id }}">
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
  function Edit(id,name) {
    $('#modalCategory').modal('show');
    $('#formUser').attr('action','{{route('actionCUCategory')}}/'+id);
    $('#hdID').val(id);
    $('#txtNama').val(name);
    $('#my-modal-history').text('Edit Data Category');
    $('#submit-update').text('Update');
  }

  $(document).ready(function() {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $('#btnAddNew').click(function () {
      $('#formUser').attr('action','{{route('actionCUCategory')}}');
      $('#modalCategory').modal('show');
      $('#txtNama').val(' ');
      $('#my-modal-history').text('Add Category');
      $('#submit-update').text('Submit');
    });

    $('body').on('click', '.delete', function (id) {
      id = $(this).val();
      swal({
        title: 'Are you sure?',
        text: "want delete this category !",
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
            text: "Category has deleted!",
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
  })
</script>
@endsection