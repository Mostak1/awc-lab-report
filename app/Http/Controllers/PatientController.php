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
        $patients = Patient::all();

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

        Patient::create($request->all());

        return redirect()->route('patients.index')->with('success', 'Report created successfully!');
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

        return redirect()->route('patients.index')->with('success', 'Report updated successfully!');
    }

    public function destroy(Patient $patient)
    {
        $patient->delete();
        return redirect()->route('patients.index')->with('success', 'Report deleted successfully!');
    }


    public function showReports($patientId)
{
    $patient = Patient::findOrFail($patientId);
    $reports = Report::where('patient_id', $patient->id)->get();

    return view('patients.reports', compact('patient', 'reports'));
}

}
