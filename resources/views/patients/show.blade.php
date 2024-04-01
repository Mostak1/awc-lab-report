@extends('layouts.main')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 bg-white rounded shadow-sm">
            <h3 class="bg-light py-2 mt-2">Patient Details</h3>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><strong>Invoice ID:</strong> {{ $patient->invoice_id }}</h5>
                    <p class="card-text"><strong>Name:</strong> {{ $patient->name }}</p>
                    <p class="card-text"><strong>Age:</strong> {{ $patient->age }}</p>
                    <p class="card-text"><strong>Reports:</strong> {{ $reportsCount[$patient->id] ?? 0 }} <a href="{{ route('patients.reports', $patient->id) }}" class="btn btn-success btn-sm">View</a></p>
                    <p class="card-text"><strong>Created At:</strong> {{ $patient->created_at->format('M d, Y h:i A') }}</p>
                    <p class="card-text"><strong>Last Updated:</strong> {{ $patient->updated_at->format('M d, Y h:i A') }}</p>
                </div>
            </div>
            <a href="{{ route('patients.index') }}" class="btn btn-primary my-3">&larr;Back</a>
        </div>
    </div>
</div>
@endsection

@section('script')
@endsection
