<form action="{{ route('statement.update', $statements->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-md-12">
            <label for="document_name" class="col-form-label pt-0">Document Name<sup class="text-size-20 top-1">*</sup></label>
            <input type="text" class="form-control" id="document_name" name="document_name" value="{{ $statements->document_name }}" required>
        </div>

        <div class="form-group">
            <label for="image" class="col-form-label pt-0">Current Bank statement</label>
            <br>
            @if($statements->bank_statements)
                <img src="{{ asset($statements->bank_statements) }}" alt="bank_statements" class="img-fluid" style="max-width: 100px;">
            @else
                <p>No file uploaded.</p>
            @endif
        </div>

        <div class="form-group">
            <label for="bank_statements" class="col-form-label pt-0">Bank Statement</label>
            <input type="file" data-height="200" name="bank_statements" data-default-file="{{ asset($statements->bank_statements) }}">
            <small id="imageHelp" class="form-text text-muted">This is your Bank Statement</small>
        </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
</form>
