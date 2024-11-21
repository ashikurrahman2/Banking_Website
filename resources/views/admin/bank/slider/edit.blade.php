<!-- resources/views/admin/bank/slider/edit.blade.php -->

<form action="{{ route('slider.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
  @csrf
  @method('PUT')
  <div class="col-md-12">
      <label for="slide_title" class="col-form-label pt-0">Slider Title <sup class="text-size-20 top-1">*</sup></label>
      <input type="text" class="form-control" id="slide_title" name="slide_title" value="{{ $slider->slide_title }}" required>
  </div>
  <div class="col-md-12">
      <label for="slide_subtitle" class="col-form-label pt-0">Slider Sub Title <sup class="text-size-20 top-1"></sup></label>
      <input type="text" class="form-control" id="slide_subtitle" name="slide_subtitle" value="{{ $slider->slide_subtitle }}">
  </div>
  <div class="form-group">
    <label for="slide_image" class="col-form-label pt-0">Current slider Logo</label>
    <br>
    @if($slider->slide_image)
    <img src="{{ asset($slider->slide_image) }}" alt="Brand Logo" class="img-fluid" style="max-width: 100px;">
    @else
    <p>No logo uploaded.</p>
    @endif
</div>
  <div class="col-md-12">
      <label for="slide_image" class="col-form-label pt-0">Slider Image <sup class="text-size-20 top-1">*</sup></label>
      <input type="file" class="dropify" data-height="200" name="slide_image" />
      <small id="imageHelp" class="form-text text-muted">Current Image: <img src="{{ asset($slider->slide_image) }}" class="img-fluid" style="max-width: 100px;"></small>
  </div>
  <div class="modal-footer">
      <button type="submit" class="btn btn-primary">Update</button>
  </div>
</form>


{{-- For file upload script --}}
<script src="{{ asset('/') }}admin/assets/fileuploads/js/fileupload.js"></script>
<script src="{{ asset('/') }}admin/assets/fileuploads/js/file-upload.js"></script>