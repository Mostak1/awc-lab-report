@extends('layouts.main')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Reports <a href="{{ route('reports.create') }}" class="btn btn-primary">Add</a></h1>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th colspan="7" class="tablebtn text-end"></th>
                            </tr>
                            <tr>
                                <th>#</th>
                                <th>Report's Name</th>
                                <th>Patient</th>
                                <th>Report</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reports as $report)
                                <tr>
                                    <td>{{ $report->id }}</td>
                                    <td>{{ $report->name }}</td>
                                    <td>{{ $report->patient ? $report->patient->name : 'Unknown Patient' }}</td>
                                    <td><a href="{{ asset('uploads/' . $report->field_01) }}" target="_blank">Download File</a></td>
                                    <td>
                                        <a href="{{ route('reports.show', $report->id) }}" class="btn btn-info btn-sm">View</a>
                                        <a href="{{ route('reports.edit', $report->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                        <form id="deleteReportForm" action="{{ route('reports.destroy', $report->id) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirmDeleteReport()">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                      </table>
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection

@section('script')

<script>
    function confirmDeleteReport() {
        // Display a confirmation dialog
        var confirmation = confirm("Are you sure you want to delete this report?");

        // If the user confirms deletion, submit the form
        return confirmation;
    }
</script>
@endsection
