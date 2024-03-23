<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index()
    {
        $patients = Patient::orderBy('created_at', 'desc')->get();
        return view('patients.index', compact('patients'));
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

        return redirect()->route('patients.index');
    }

    public function show(Patient $patient)
    {
        return view('patients.show', compact('patient'));
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

        return redirect()->route('patients.index');
    }

    public function destroy(Patient $patient)
    {
        $patient->delete();
        return redirect()->route('patients.index');
    }

}
