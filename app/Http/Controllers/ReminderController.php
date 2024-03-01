<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Reminder;

class ReminderController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $reminders = $user->reminders; // Fetch expenses associated with the authenticated user

        if ($request->is('api/*')) {
            return response()->json(['reminders' => $reminders]);
        } else {
            return view('reminder', compact('reminders'));
        }
    }

    public function create(){
        return view('create');
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        $reminder = new Reminder([
            'usr_reminders' => $request->input('usr_reminders')
            
        ]);

        $user->reminders()->save($reminder);

        if ($request->is('api/*')) {
            return response()->json(["message" => "Successfully created the reminders' data"]);
        } else {
            return redirect()->route('savings.index')->with('message', 'Reminders Created');
        }
    }

    public function edit(Reminder $reminder)
    {
        // Check if authenticated user owns this expense
        if ($reminder->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        return view('edit', compact('expense'));
    }
    public function update(Request $request, $id){
        $reminder = Reminder::find($id);
        $reminder->update($request->all());

        if ($request->is('api/*')) {
            return response()->json(["message" => "Successfully updated the reminders' data"]);
        } else {
            return redirect()->route('savings.index')->with('message', 'Reminders Updated');
        }
    }

    public function destroy($id){
        $reminder = Reminder::find($id);
        $reminder->delete();

        if (request()->is('api/*')) {
            return response()->json(["message" => "Successfully deleted the reminders; data"]);
        } else {
            return redirect()->route('savings.index')->with('message', 'Reminders Deleted');
        }
    }
}
