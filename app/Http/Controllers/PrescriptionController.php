<?php

namespace App\Http\Controllers;

use App\Models\Prescription;
use App\Models\Customer;
use App\Models\Medicine;
use Illuminate\Http\Request;

class PrescriptionController extends Controller
{
    public function index()
    {
        // Task 1: Eager Loading both Customer and Medicines
        $prescriptions = Prescription::with(['customer', 'medicines'])->get();
        return view('prescriptions.index', compact('prescriptions'));
    }

    public function create()
    {
        $customers = Customer::all();
        $medicines = Medicine::all();
        return view('prescriptions.create', compact('customers', 'medicines'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'patient_name' => 'required',
            'customer_id' => 'required',
            'medicines' => 'required|array'
        ]);

        // 1. Create the prescription
        $prescription = Prescription::create([
            'patient_name' => $request->patient_name,
            'customer_id' => $request->customer_id,
        ]);

        // 2. Attach medicines to the pivot table (Many-to-Many)
        $prescription->medicines()->attach($request->medicines);

        return redirect()->route('prescriptions.index')->with('success', 'Prescription (Order) created.');
    }

    public function destroy(Prescription $prescription)
    {
        $prescription->delete();
        return redirect()->route('prescriptions.index')->with('success', 'Deleted.');
    }
}