@extends('layouts.main')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6 bg-white rounded shadow-sm">
            <h3 class="bg-light py-2 mt-2"><a href="{{ route('patients.reports', $patient->id) }}" class="btn btn-primary">&larr;Back</a> Add Report for {{ $patient->name }}</h3>

                <div class="card-body">
                    <form action="{{ route('patients.store-report', $patient->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Report Name:</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('field_01') }}">
                        </div>
                        <div class="mb-3">
                            <label for="field_01" class="form-label">File: (Upload File: PDF, DOC, DOCX)</label>
                            <input type="file" class="form-control" id="field_01" name="field_01" value="{{ old('field_01') }}">
                        </div>
                        <div class="mb-3">
                            <label for="field_02" class="form-label">Notes: (Optional)</label>
                            <textarea class="form-control" id="field_02" name="field_02" rows="3" value="{{ old('field_02') }}"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary my-2`">Submit</button>
                    </form>
                </div>
        </div>
    </div>
</div>
@endsection

@section('script')

<script>
    ClassicEditor
        .create(document.querySelector('#field_02'), {
            toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', 'imageUpload', 'undo', 'redo'],
            ckfinder: {
                uploadUrl: '{{ route("upload_image") }}'
            }
        })
        .then(editor => {
            console.log(editor);
        })
        .catch(error => {
            console.error(error);
        });
</script>
@endsection
