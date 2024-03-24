@extends('layouts.main')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
                <h1>Edit Report</h1>
                <a href="{{ route('reports.index') }}" class="btn btn-primary mt-3">&larr;Back</a>
                    <form method="POST" action="{{ route('reports.update', $report->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="patient_id">Patient:</label>
                            <select name="patient_id" id="patient_id" class="form-control select2" required>
                                <option value="">Select Patient</option>
                                @foreach ($patients as $patient)
                                    <option value="{{ $patient->id }}" @if ($report->patient_id == $patient->id) selected @endif>{{ $patient->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name">Report Name:</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ $report->name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="field_01">File: (Upload File: PDF, DOC, DOCX)</label>
                            <input type="file" name="field_01" id="field_01" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="field_02">Notes:</label>
                            <input type="text" name="field_02" id="field_02" class="form-control" value="{{ $report->field_02 }}" required>
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
