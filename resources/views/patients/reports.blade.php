@extends('layouts.main')
@section('content')
<div class="container">
    <a href="{{ route('patients.create-report', $patient->id) }}" class="btn btn-primary">&plus; Add Report</a>
    <div class="row mt-3 bg-white rounded shadow-sm">
            <h3 class="bg-light py-2 mt-2"><strong>{{ $patient->name }}'s Reports</strong></h3>
            <div class="row">
                @foreach($reports as $report)
                <div class="col-md-4">
                <div class="card mt-2">
                    <div class="card-header h4 text-center">{{ $report->name }}</div>
                    <div class="card-body">
                        <p><strong>Patient:</strong> {{ optional($report->patient)->name }}</p>
                        <p><strong>Report:</strong> <a href="{{ asset('uploads/' . $report->field_01) }}" target="_blank">Download File</a></p>
                        <p><strong>Notes:</strong> {{ $report->field_02 }}</p>
                        <p><strong>Created At:</strong> {{ $report->created_at->format('M d, Y h:i A') }}</p>
                        <p><strong>Last Updated:</strong> {{ $report->updated_at->format('M d, Y h:i A') }}</p>
                    </div>
                </div>
            </div>
                @endforeach
        </div>
    </div>
    <a href="{{ route('patients.index') }}" class="btn btn-primary my-3">&larr;Back</a>
</div>
@endsection

@section('script')
@endsection
