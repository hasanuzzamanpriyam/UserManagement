<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactValidate;
use Illuminate\Http\Request;
use App\Models\contact;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $contacts = contact::where('User_id', Auth::id())->paginate(10);
        $search = $request->input('search', null);
        if ($search) {
            $contacts = contact::where('First_name', 'like', '%' . $search . '%')
                                    ->orWhere('Last_name', 'like', '%' . $search . '%')
                                    ->orWhere('Number', 'like', '%' . $search . '%')
                                    ->where('User_id', Auth::id())
                                    ->paginate(10);
        }
        return view('contacts.list' , compact('contacts', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ContactValidate $request)
    {
        $contact = new contact();
        $contact->User_id = Auth::id();
        $contact->first_name = $request->first_name;
        $contact->last_name = $request->last_name;
        $contact->Number = $request->Number;
        $contact->save();
        return redirect('/contact/list')->with('success', 'Contact Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $contact = contact::find($id);
        return view('contacts.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $contact = contact::find($id);
        return view('contacts.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ContactValidate $request)
    {
        $contact = contact::find($request->id);
        $contact->first_name = $request->first_name;
        $contact->last_name = $request->last_name;
        $contact->Number = $request->Number;
        $contact->save();
        return redirect('/contact/list')->with('success', 'Contact Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $contact = contact::find($id);
        $contact->delete();
        return redirect('/contact/list')->with('success', 'Contact Deleted Successfully');
    }
}
