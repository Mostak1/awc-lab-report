@extends('layouts.main')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card mt-2">
                <div class="card-header h2 text-center">{{ $report->name }}</div>
                <div class="card-body">
                    <p><strong>Patient:</strong> {{ optional($report->patient)->name }}</p>
                    <p><strong>Report:</strong> <a href="{{ asset('uploads/' . $report->field_01) }}" target="_blank">Download File</a></p>
                    <p><strong>Notes:</strong> {{ $report->field_02 }}</p>
                    <p><strong>Created At:</strong> {{ $report->created_at->format('M d, Y h:i A') }}</p>
                    <p><strong>Last Updated:</strong> {{ $report->updated_at->format('M d, Y h:i A') }}</p>
                </div>
            </div>
            <a href="{{ route('reports.index') }}" class="btn btn-primary mt-3">&larr;Back</a>
        </div>
    </div>
</div>
@endsection

@section('script')
@endsection
