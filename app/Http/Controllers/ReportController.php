<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reports = Report::orderBy('id', 'desc')->get();
        return view('reports.index', compact('reports'));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        $patients = Patient::all();
        return view('reports.create', compact('patients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'name' => 'required',
            'field_01' => 'required|file|mimes:pdf,doc,docx',
            'field_02' => 'nullable',
        ]);

        $report = new Report();
        $report->patient_id = $request->patient_id;
        $report->name = $request->name;

        // Handle file upload
        if ($request->hasFile('field_01')) {
            $file = $request->file('field_01');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $fileName);
            $report->field_01 = $fileName;
        }

        $report->field_02 = $request->field_02;
        $report->save();

        return redirect()->route('reports.index')->with('success', 'Report created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Report $report)
    {
        return view('reports.show', compact('report'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Report $report)
    {
        $patients = Patient::all();
        return view('reports.edit', compact('report', 'patients'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Report $report)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'name' => 'required',
            'field_02' => 'nullable',
        ]);

        $report->patient_id = $request->patient_id;
        $report->name = $request->name;

        // Handle file upload
        if ($request->hasFile('field_01')) {
            $file = $request->file('field_01');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $fileName);
            $report->field_01 = $fileName;
        }

        $report->field_02 = $request->field_02;
        $report->save();

        return redirect()->route('reports.index')->with('success', 'Report updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Report $report)
    {
        $report->delete();
        return redirect()->route('reports.index')->with('success', 'Report deleted successfully!');
    }


    public function uploadImage(Request $request)
    {
        // Handle file upload
        if ($request->hasFile('upload')) {
            $image = $request->file('upload');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads'), $imageName);
        }

        return response()->json([
            'uploaded' => true,
            'url' => asset('uploads/' . $imageName)
        ]);
    }

}
