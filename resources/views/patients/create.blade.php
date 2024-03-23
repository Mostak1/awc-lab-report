@extends('layouts.main')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h1>Add New Patient</h1>
            <a href="{{ route('patients.index') }}" class="btn btn-primary mt-3">&larr;Back</a>
            <form action="{{ route('patients.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="invoice_id">Invoice ID:</label>
                    <input type="text" name="invoice_id" id="invoice_id" class="form-control" value="{{ old('invoice_id') }}" required>
                </div>
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
                </div>
                <div class="form-group">
                    <label for="age">Age:</label>
                    <input type="number" name="age" id="age" class="form-control" value="{{ old('age') }}" required>
                </div>
                <button type="submit" class="btn btn-primary mt-2">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
@endsection
