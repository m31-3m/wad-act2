<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use App\Models\Category;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    // READ (List all products)
    public function index()
    {
        // Task 1: Use Eager Loading ('with') to get the category name
        $medicines = Medicine::with('category')->get();
        return view('medicines.index', compact('medicines'));
    }

    // CREATE (Show form)
    public function create()
    {
        $categories = Category::all();
        return view('medicines.create', compact('categories'));
    }

    // STORE (Save to DB)
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
        ]);

        Medicine::create($request->all());

        return redirect()->route('medicines.index')->with('success', 'Medicine added successfully.');
    }

    // EDIT (Show form)
    public function edit(Medicine $medicine)
    {
        $categories = Category::all();
        return view('medicines.edit', compact('medicine', 'categories'));
    }

    // UPDATE (Save changes)
    public function update(Request $request, Medicine $medicine)
    {
        $medicine->update($request->all());
        return redirect()->route('medicines.index')->with('success', 'Medicine updated.');
    }

    // DELETE
    public function destroy(Medicine $medicine)
    {
        $medicine->delete();
        return redirect()->route('medicines.index')->with('success', 'Medicine deleted.');
    }
}