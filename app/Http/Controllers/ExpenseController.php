<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Expense;
use Illuminate\Support\Facades\Auth;
class ExpenseController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $expenses = $user->expenses; // Fetch expenses associated with the authenticated user
        return view('expense', compact('expenses'));
    }

    public function create()
    {
        return view('create');
    }

    public function show(Expense $expense)
    {
        $user = Auth::user();
        if ($expense->user_id !== $user->id) {
            abort(403, 'Unauthorized action.');
        }

        return view('edit', compact('expense'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'exp' => 'required|string',
            'price' => 'required|numeric',
            'date' => 'required|string'
        ]);

        $expense = new Expense([
            'exp' => $request->input('exp'),
            'price' => $request->input('price'),
            'date' => $request->input('date')
        ]);
        $user->expenses()->save($expense);
        return redirect()->route('expenses.index')->with('message', '');
    }

    public function edit(Expense $expense)
    {
        // Check if authenticated user owns this expense
        if ($expense->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        return view('edit', compact('expense'));
    }
    
    public function update(Request $request, Expense $expense)
    {
        $user = Auth::user();
        if ($expense->user_id !== $user->id) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'exp' => 'required|string',
            'price' => 'required|numeric',
            'date' => 'required|string'
        ]);

        $expense->update([
            'exp' => $request->input('exp'),
            'price' => $request->input('price'),
            'date' => $request->input('date')
        ]);
            return redirect()->route('expenses.index')->with('message', '');
    }

    public function destroy(Expense $expense)
    {
        $user = Auth::user();
        if ($expense->user_id !== $user->id) {
            abort(403, 'Unauthorized action.');
        }
        $expense->delete();
            return redirect()->route('expenses.index')->with('message', '');
        }
    
        public function getExpense(Request $request)
    {
        $user = Auth::user();
        $expenses = Expense::where('user_id', $user->id)->get(); // Fetch expenses associated with the authenticated user
        return response()->json(['expenses' => $expenses]);
    }

    public function postExpense(Request $request)
    {
        try {
            // Ensure user is authenticated
            $user = Auth::user();
            if (!$user) {
                return response()->json(["error" => "Unauthenticated."], 401);
            }
            
            // Validate request data
            $request->validate([
                'exp' => 'required|string',
                'price' => 'required|numeric',
                'date' => 'required|string'
            ]);
    
            // Create a new expense instance
            $expense = new Expense([
                'user_id' => $user->id,
                'exp' => $request->input('exp'),
                'price' => $request->input('price'),
                'date' => $request->input('date')
            ]);
    
            // Save the expense for the user
            $user->expenses()->save($expense);
    
            // Return JSON response
            return response()->json(["message" => "Successfully created the expense's data"]);
        } catch (\Exception $e) {
            // Log error message
            Log::error($e->getMessage());
            // Return error response
            return response()->json(["error" => "An error occurred while processing the request."], 500);
        }
    }

    public function updateExpense(Request $request, Expense $expense)
    {
        $user = Auth::user();
        if ($expense->user_id !== $user->id) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'exp' => 'required|string',
            'price' => 'required|numeric',
            'date' => 'required|string'
        ]);

        $expense->update([
            
            'exp' => $request->input('exp'),
            'price' => $request->input('price'),
            'date' => $request->input('date')
        ]);

        return response()->json(["message" => "Successfully updated the expense's data"]);
    }

    public function deleteExpense(Expense $expense)
    {
        $user = Auth::user();
        if ($expense->user_id !== $user->id) {
            abort(403, 'Unauthorized action.');
        }

        $expense->delete();

        return response()->json(["message" => "Successfully deleted the expense's data"]);
    }
        
}

