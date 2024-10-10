<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required | min:3 |max:50',
            'last_name' => 'required | min:3 |max:50',
            'email' => 'required | email | unique:users',
            'password' => 'required | min:6 | max:16',
            'mo_no' => 'required | digits:11 |integer',
        ]);

        if ($request->file('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $img_name = rand(100000, 999999).time() . '.' . $ext;
            $file->move('uploads/user/', $img_name);
            $img_name = 'uploads/user/' . $img_name;
        }

        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->gender = $request->gender;
        $user->hobby = isset($request->hobby) ? implode(',', $request->hobby) : null;
        $user->mo_no = $request->mo_no;
        $user->image = isset($img_name) ? $img_name : null;
        $user->city_id = $request->city_id;
        $user->save();

        return redirect('/')->With('success', 'User Created Successfully');
    }
}
