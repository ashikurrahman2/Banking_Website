<form action="{{ route('skill.update', $skill->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-md-12">
            <label for="skills_name" class="col-form-label pt-0">Skills Name <sup class="text-size-20 top-1">*</sup></label>
            <input type="text" class="form-control" id="skills_name" name="skills_name" value="{{ $skill->skills_name }}" required>
        </div>
        <div class="col-md-12">
            <label for="skills_description" class="col-form-label pt-0">Skills Description</label>
            <textarea class="form-control" id="skills_description" name="skills_description">{{ $skill->skills_description }}</textarea>
        </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
</form>
