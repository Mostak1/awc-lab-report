@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h1><a href="{{ route('reports.index') }}" class="btn btn-primary">&larr;Back</a> Edit Report</h1>

            <form method="POST" action="{{ route('reports.update', $report->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group mt-2">
                    <label for="patient_id">Patient's Invoice ID:</label>
                    <select name="patient_id" id="patient_id" class="form-control select2" required>
                        <option value="">Select Invoice ID</option>
                        @foreach ($patients as $patient)
                            <option value="{{ $patient->id }}" {{ $report->patient_id == $patient->id ? 'selected' : '' }}>
                                {{ $patient->invoice_id }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mt-2">
                    <label for="name">Report Name:</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $report->name }}" required>
                </div>
                <div class="form-group mt-2">
                    <label for="field_01">File: (Upload File: PDF, DOC, DOCX)</label>
                    <input type="file" name="field_01" id="field_01" class="form-control">
                </div>
                <div class="form-group mt-2">
                    <label for="field_02">Notes: (Optional)</label>
                    <textarea name="field_02" id="field_02" class="form-control" rows="3">{{ $report->field_02 }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary mt-2">Update</button>
            </form>
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
