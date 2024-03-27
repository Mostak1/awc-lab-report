@extends('layouts.main')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
                <h1><a href="{{ route('reports.index') }}" class="btn btn-primary">&larr;Back</a> Add Report</h1>

                <div class="card-body">
                    <form method="POST" action="{{ route('reports.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mt-2">
                            <label for="patient_id">Patient's Invoice ID:</label>
                            <select name="patient_id" id="patient_id" class="form-control select2" value="{{ old('patient_id') }}" required>
                                <option value="">Select Invoice ID </option>
                                @foreach ($patients as $patient)
                                    <option value="{{ $patient->id }}">{{ $patient->invoice_id  }}</option>
                                    {{-- <option value="{{ $patient->id }}">{{ $patient->invoice_id  }} - {{ $patient->name }}</option> --}}
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mt-2">
                            <label for="name">Report Name:</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
                        </div>
                        <div class="form-group mt-2">
                            <label for="field_01">File: (Upload File: PDF, DOC, DOCX)</label>
                            <input type="file" name="field_01" id="field_01" class="form-control" value="{{ old('field_01') }}" required>
                        </div>
                        <div class="form-group mt-2">
                            <label for="field_02" class="form-label">Notes: (Optional)</label>
                            <textarea class="form-control" id="field_02" name="field_02" rows="3" value="{{ old('field_02') }}"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary mt-2">Submit</button>
                    </form>
                </div>
        </div>
    </div>
</div>
@endsection

@section('script')

<script>
    $(document).ready(function() {
        $('.select2').select2(); // Initialize Select2
    });
</script>

@endsection
