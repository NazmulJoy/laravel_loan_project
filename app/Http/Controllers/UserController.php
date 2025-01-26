<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    
    public function index()
    {
        $users = User::all(); 
        return view('admin.users.index', compact('users')); 
    }

    public function create()
    {
        return view('admin.users.create'); 
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:8',
        'mobile_number' => 'nullable|string|max:15',
        'marital_status' => 'nullable|string',
        'date_of_birth' => 'nullable|date',
        'present_address' => 'nullable|string',
        'state' => 'nullable|string',
        'city' => 'nullable|string',
        'postal_code' => 'nullable|string|max:10',
        'profession' => 'nullable|string|max:255',
        'yearly_salary' => 'nullable|numeric|min:0',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $user = new User();
    $user->name = $validated['name'];
    $user->email = $validated['email'];
    $user->password = bcrypt($validated['password']);
    $user->mobile_number = $validated['mobile_number'] ?? null;
    $user->marital_status = $validated['marital_status'] ?? null;
    $user->date_of_birth = $validated['date_of_birth'] ?? null;
    $user->present_address = $validated['present_address'] ?? null;
    $user->state = $validated['state'] ?? null;
    $user->city = $validated['city'] ?? null;
    $user->postal_code = $validated['postal_code'] ?? null;
    $user->profession = $validated['profession'] ?? null;
    $user->yearly_salary = $validated['yearly_salary'] ?? null;
    $user->role = 'user';

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('images'), $imageName);
        $user->image = $imageName;
    }

    $user->save();

    return redirect()->route('admin.users.index')->with('success', 'User created successfully.');
}





    public function show($id)
    {
        $user = User::findOrFail($id);
        return response()->json($user);
    }
    
    
   public function edit($id)
{
    $user = User::findOrFail($id); 
    return view('admin.users.edit', compact('user'));
}

public function update(Request $request, User $user)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users,email,' . $user->id,
        'mobile_number' => 'nullable|string|max:15',
        'marital_status' => 'nullable|string',
        'date_of_birth' => 'nullable|date',
        'present_address' => 'nullable|string|max:500',
        'state' => 'nullable|string|max:255',
        'city' => 'nullable|string|max:255',
        'postal_code' => 'nullable|string|max:10',
        'profession' => 'nullable|string|max:255',
        'yearly_salary' => 'nullable|numeric|min:0',
        'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);


    $user->name = $validated['name'];
    $user->email = $validated['email'];
    $user->mobile_number = $validated['mobile_number'] ?? $user->mobile_number;
    $user->marital_status = $validated['marital_status'] ?? $user->marital_status;
    $user->date_of_birth = $validated['date_of_birth'] ?? $user->date_of_birth;
    $user->present_address = $validated['present_address'] ?? $user->present_address;
    $user->state = $validated['state'] ?? $user->state;
    $user->city = $validated['city'] ?? $user->city;
    $user->postal_code = $validated['postal_code'] ?? $user->postal_code;
    $user->profession = $validated['profession'] ?? $user->profession;
    $user->yearly_salary = $validated['yearly_salary'] ?? $user->yearly_salary;

    if ($request->hasFile('image')) {
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $user->image = $imageName;
    }

    $user->save();

    return redirect()->route('admin.users.index')->with('success', 'User updated successfully!');
}






   
    public function destroy($id)
{
    $user = User::find($id);

    if (!$user) {
        return redirect()->route('admin.users.index')->with('error', 'User not found.');
    }

  
    if ($user->image && file_exists(public_path($user->image))) {
        unlink(public_path($user->image));  
    }

   
    $user->delete();

    return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
}


}
