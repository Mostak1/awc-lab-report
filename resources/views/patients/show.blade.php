@extends('layouts.main')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Patient Details</h1>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Invoice ID: {{ $patient->invoice_id }}</h5>
                    <p class="card-text">Name: {{ $patient->name }}</p>
                    <p class="card-text">Age: {{ $patient->age }}</p>
                    <p class="card-text">Created At: {{ $patient->created_at }}</p>
                    <p class="card-text">Last Updated: {{ $patient->updated_at }}</p>
                </div>
            </div>
            <a href="{{ route('patients.index') }}" class="btn btn-primary mt-3">&larr;Back</a>
        </div>
    </div>
</div>
@endsection

@section('script')
@endsection
