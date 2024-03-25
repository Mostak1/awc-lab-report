@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h1><a href="{{ route('patients.index') }}" class="btn btn-primary">&larr; Back</a> Add New Patient</h1>

            <form action="{{ route('patients.store') }}" method="POST">
                @csrf
                <div class="form-group mt-2">
                    <label for="invoice_id">Invoice ID:</label>
                    <input type="text" name="invoice_id" id="invoice_id" class="form-control" value="{{ old('invoice_id') }}" required>
                </div>
                <div class="form-group mt-2">
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
                </div>
                <div class="form-group mt-2">
                    <label for="age">Age:</label>
                    <input type="number" name="age" id="age" class="form-control" value="{{ old('age') }}" required>
                </div>
                <div class="form-check mt-2">
                    <input class="form-check-input" type="checkbox" name="add_report" id="add_report">
                    <label class="form-check-label" for="add_report">
                        Add Report
                    </label>
                </div>
                <button type="submit" class="btn btn-primary mt-2">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
@endsection
