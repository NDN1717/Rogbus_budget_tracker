<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Saving;
use Illuminate\Support\Facades\Auth;
class SavingController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $savings = $user->savings; // Fetch expenses associated with the authenticated user
        return view('saving', compact('savings'));
    }

    public function create()
    {
        return view('create');
    }

    public function show(Saving $saving)
    {
        $user = Auth::user();
        if ($saving->user_id !== $user->id) {
            abort(403, 'Unauthorized action.');
        }

        return view('edit', compact('saving'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'amount' => 'required|string',
            'date' => 'required|string',
        ]);

        $saving = new Saving([
            'amount' => $request->input('amount'),
            'date' => $request->input('date'),
        ]);
        $user->savings()->save($saving);
        return redirect()->route('savings.index')->with('message', '');
    }

    public function edit(Saving $saving)
    {
        // Check if authenticated user owns this expense
        if ($saving->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        return view('edit', compact('saving'));
    }

    public function update(Request $request, Saving $saving)
    {
        $user = Auth::user();
        if ($saving->user_id !== $user->id) {
            abort(403, 'Unauthorized action.');
        }
        $request->validate([
            'amount' => 'required|string',
            'date' => 'required|string',
        ]);
    
        $saving->update([
            'amount' => $request->input('amount'),
            'date' => $request->input('date'),
        ]);
            return redirect()->route('savings.index')->with('message', '');
    }

    public function destroy(Saving $saving)
    {
        $user = Auth::user();
        if ($saving->user_id !== $user->id) {
            abort(403, 'Unauthorized action.');
        }
        $saving->delete();
            return redirect()->route('savings.index')->with('message', '');
    }

    public function getSaving(Request $request)
    {
        $user = Auth::user();
        $savings = Saving::where('user_id', $user->id)->get(); // Fetch expenses associated with the authenticated user
        return response()->json(['savings' => $savings]);
    }

    public function postSaving(Request $request)
    {
        try {
            // Ensure user is authenticated
            $user = Auth::user();
            if (!$user) {
                return response()->json(["error" => "Unauthenticated."], 401);
            }
            
            // Validate request data
            $request->validate([
                'amount' => 'required|string',
                'date' => 'required|string',
            ]);
    
            // Create a new saving instance
            $saving = new Saving([
                'user_id' => $user->id,
                'amount' => $request->input('amount'),
                'date' => $request->input('date'),
            ]);
    
            // Save the saving for the user
            $user->savings()->save($saving);
    
            // Return JSON response
            return response()->json(["message" => "Successfully created the saving's data"]);
        } catch (\Exception $e) {
            // Log error message
            Log::error($e->getMessage());
            // Return error response
            return response()->json(["error" => "An error occurred while processing the request."], 500);
        }
    }

    public function updateSaving(Request $request, Saving $saving)
    {
        $user = Auth::user();
        if ($saving->user_id !== $user->id) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'amount' => 'required|string',
            'date' => 'required|string',
        ]);

        $saving->update([
            'user_id' => $user->id,
            'amount' => $request->input('amount'),
            'date' => $request->input('date'),
        ]);

        return response()->json(["message" => "Successfully updated the savings's data"]);
    }

    public function deleteSaving(Saving $saving)
    {
        $user = Auth::user();
        if ($saving->user_id !== $user->id) {
            abort(403, 'Unauthorized action.');
        }

        $saving->delete();

        return response()->json(["message" => "Successfully deleted the saving's data"]);
    }
}

