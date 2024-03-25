<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Report;
use DB;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index()
    {
        $patients = Patient::orderBy('id', 'desc')->get();

        // Fetch the count of reports for each patient
        $reportsCount = DB::table('patients')
            ->leftJoin('reports', 'patients.id', '=', 'reports.patient_id')
            ->select('patients.id', DB::raw('count(reports.id) as reports_count'))
            ->groupBy('patients.id')
            ->pluck('reports_count', 'id');

        return view('patients.index', compact('patients', 'reportsCount'));
    }

    public function create()
    {
        return view('patients.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'invoice_id' => 'required|unique:patients',
        'name' => 'required',
        'age' => 'required|integer',
    ]);

    $patient = Patient::create($request->all());

    if ($request->has('add_report')) {
        // If the checkbox "Add Report" is checked, redirect to the report creation page
        return redirect()->route('patients.create-report', ['patient' => $patient->id]);
    }

    return redirect()->route('patients.index')->with('success', 'Patient created successfully!');
}


    public function show(Patient $patient)
    {
        $patients = Patient::all();

        // Fetch the count of reports for each patient
        $reportsCount = DB::table('patients')
            ->leftJoin('reports', 'patients.id', '=', 'reports.patient_id')
            ->select('patients.id', DB::raw('count(reports.id) as reports_count'))
            ->groupBy('patients.id')
            ->pluck('reports_count', 'id');

        return view('patients.show', compact('patient', 'reportsCount'));
    }

    public function edit(Patient $patient)
    {
        return view('patients.edit', compact('patient'));
    }

    public function update(Request $request, Patient $patient)
    {
        $request->validate([
            'invoice_id' => 'required|unique:patients,invoice_id,'.$patient->id,
            'name' => 'required',
            'age' => 'required|integer',
        ]);

        $patient->update($request->all());

        return redirect()->route('patients.index')->with('success', 'Patient updated successfully!');
    }

    public function destroy(Patient $patient)
    {
        $patient->delete();
        return redirect()->route('patients.index')->with('success', 'Patient deleted successfully!');
    }


    public function showReports($patientId)
    {
    $patient = Patient::findOrFail($patientId);
    $reports = Report::where('patient_id', $patient->id)->get();

    return view('patients.reports', compact('patient', 'reports'));
    }

    public function createReport(Patient $patient)
    {
        $patients = Patient::all(); // Fetch patients if needed
        return view('patients.create-report', compact('patient', 'patients'));
    }

    public function storeReport(Request $request, Patient $patient)
    {
        $request->validate([
            'name' => 'required|string',
            'field_01' => 'required|mimes:pdf,doc,docx',
            'field_02' => 'required|string',
        ]);

        // Handle file upload
        if ($request->hasFile('field_01')) {
            $file = $request->file('field_01');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $fileName);
        }

        // Store the filename in the database
        $report = new Report();
        $report->patient_id = $patient->id;
        $report->name = $request->name;
        $report->field_01 = $fileName; // Store only the file name
        $report->field_02 = $request->field_02;
        $report->save();

        return redirect()->route('patients.reports', $patient->id)->with('success', 'Report created successfully.');
    }

}
