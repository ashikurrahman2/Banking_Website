@extends('layouts.admin')
@section('title','Slider')
@section('admin_content')
<div class="pc-container">
    <div class="pc-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center justify-content-between">
                    <div class="col-sm-auto">
                        <div class="page-header-title">
                            <h5 class="mb-0">Slider info</h5>
                        </div>
                    </div>
                    <div class="col-sm-auto">
                        <ul class="breadcrumb">
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">+ Add New</button>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
      <div class="row">
        <!-- HTML5 Export Buttons table start -->
        <div class="col-sm-12">
          <div class="card">
            <div class="card-header table-card-header">
              <h5>All Slider list here</h5>
            </div>
            <div class="card-body">
              <div class="dt-responsive table-responsive">
                <table id="" class="table table-striped table-bordered nowrap table-sm ytable">
                  <thead>
                    <tr>
                      <th>SL</th>
                      <th>Slider Title</th>
                      <th>Slider Sub Title</th>
                      <th>Slider Image</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <!-- Data populated by DataTables via AJAX -->
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>SL</th>
                      <th>Slider Title</th>
                      <th>Slider Sub Title</th>
                      <th>Slider Image</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div><!-- HTML5 Export Buttons end -->

      </div>
      <!-- [ Main Content ] end -->
    </div>
</div>
  <!-- Insert Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title h4" id="myLargeModalLabel">Add New Slider</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('slider.store')}}" method="post" id="add-form" enctype="multipart/form-data">
              @csrf
              <div class="modal-body">
                <div class="col-md-12">
                  <label for="slide_title" class="col-form-label pt-0">Slider Title <sup class="text-size-20 top-1">*</sup></label>
                  <input type="text" class="form-control" id="slide_title" name="slide_title" required>
              </div>
              <div class="col-md-12">
                <label for="slide_subtitle" class="col-form-label pt-0">Slider Sub Title<sup class="text-size-20 top-1"></sup></label>
                <input type="text" class="form-control" id="slide_subtitle" name="slide_subtitle">
            </div>
               
                <div class="col-md-12">
                  <label for="slide_image" class="col-form-label pt-0">Slider Image<sup class="text-size-20 top-1">*</sup></label>
                  <input type="file" class="dropify" data-height="200" name="slide_image"  required />
                  <small id="imageHelp" class="form-text text-muted">This is your Slider image</small>
              </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary"> <span class="d-none"> loading ......</span> Submit</button>
                </div>
              </div>
            </form>
        </div>
    </div>
                 

</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="editModalLabel">Edit Slider</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <!-- Edit form content will be loaded here -->
          </div>
      </div>
  </div>
</div>

  <!-- Script -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  {{-- <script type="text/javascript">
    $(function slider(){
      var table=$('.ytable').DataTable({
        processing: true,
            serverSide: true,
            ajax: "{{ route('slider.index') }}",
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                { data: 'slide_title', name: 'slide_title' },
                { data: 'slide_subtitle', name: 'slide_subtitle' },
                { data: 'slide_image', name: 'slide_image' },
                { data: 'action', name: 'action', orderable: false, searchable: false }
            ]
      });
    }); --}}
    <script type="text/javascript">
      $(function() {
          var table = $('.ytable').DataTable({
              processing: true,
              serverSide: true,
              ajax: "{{ route('slider.index') }}",
              columns: [
                  { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                  { data: 'slide_title', name: 'slide_title' },
                  { data: 'slide_subtitle', name: 'slide_subtitle' },
                  { data: 'slide_image', name: 'slide_image' },
                  { data: 'action', name: 'action', orderable: false, searchable: false }
              ]
          });
    
          // For Edit Slider
          $('body').on('click', '.edit', function() {
              let id = $(this).data('id');
              $.get("slider/" + id + "/edit", function(data) {
                  $('.modal-body').html(data);
                  $('#editModal').modal('show');  // Open the Edit Modal
              });
          });
      });
    </script>
    
  
@endsection