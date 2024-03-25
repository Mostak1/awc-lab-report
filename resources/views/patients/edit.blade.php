@extends('layouts.main')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h1><a href="{{ route('patients.index') }}" class="btn btn-primary">&larr;Back</a> Edit Patient</h1>

            <form action="{{ route('patients.update', $patient->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group mt-2">
                    <label for="invoice_id">Invoice ID:</label>
                    <input type="text" name="invoice_id" id="invoice_id" class="form-control" value="{{ $patient->invoice_id }}" required>
                </div>
                <div class="form-group mt-2">
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $patient->name }}" required>
                </div>
                <div class="form-group mt-2">
                    <label for="age">Age:</label>
                    <input type="number" name="age" id="age" class="form-control" value="{{ $patient->age }}" required>
                </div>
                <button type="submit" class="btn btn-primary mt-2">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
@endsection
