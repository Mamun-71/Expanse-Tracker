<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Expense;
use Illuminate\Http\Request;


class ExpenseController extends Controller
{
    // GET /api/expenses
    public function index()
    {
        $expenses = Expense::latest()->get();

        return response()->json([
            'success' => true,
            'data' => $expenses
        ]);
    }

    // POST /api/expenses
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'category' => 'nullable|string|max:100',
            'expense_date' => 'required|date',
        ]);

        $expense = Expense::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Expense created successfully',
            'data' => $expense
        ], 201);
    }

    // GET /api/expenses/{id}
    public function show($id)
    {
        $expense = Expense::findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => $expense
        ]);
    }

    // PUT /api/expenses/{id}
    public function update(Request $request, $id)
    {
        $expense = Expense::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'category' => 'nullable|string|max:100',
            'expense_date' => 'required|date',
        ]);

        $expense->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Expense updated successfully',
            'data' => $expense
        ]);
    }

    // DELETE /api/expenses/{id}
    public function destroy($id)
    {
        $expense = Expense::findOrFail($id);
        $expense->delete();

        return response()->json([
            'success' => true,
            'message' => 'Expense deleted successfully'
        ]);
    }
}
