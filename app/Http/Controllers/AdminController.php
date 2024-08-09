<?php
namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    public function index()
    {
        $users = User::where('is_admin', false)->get();
        return view('users', compact('users'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            // Add validation rules as needed
        ]);

        $user = User::findOrFail($id);
        $user->update($request->all());

        return redirect()->route('admin.dashboard')->with('success', 'User updated successfully.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.dashboard')->with('success', 'User deleted successfully.');
    }
}
