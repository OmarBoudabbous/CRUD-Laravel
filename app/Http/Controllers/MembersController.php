<?php

namespace App\Http\Controllers;

use App\Models\Members;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MembersController extends Controller
{
    public function index()
    {
        $members = Members::all(); // get all member from database
        return view('members.index', compact('members')); // Return the view with the members data
    }

    public function create()
    {
        return view('members.create'); // create page web for add new member 
    }


    public function store(Request $request)
    {
        // validate data 

        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'join_date' => 'required|date',
            'phone_number' => 'nullable|string|max:8',
            'picture' => 'nullable|image|mimes:jpeg,png,jpeg,gif|max:2048',
        ]);

        // create new member

        $member = new Members();
        $member->first_name = $request->first_name;
        $member->last_name = $request->last_name;
        $member->email = $request->email;
        $member->phone_number = $request->phone_number;
        $member->join_date = $request->join_date;

        // Handle picture upload
        if ($request->hasFile('picture')) {
            $path = $request->file('picture')->store('pictures', 'public');
            $member->picture = $path;
        } else {
            $member->picture = 'pictures/no-photo.png'; // Path relative to 'public/storage'
        }

        $member->save(); // Save the member to the database
        return redirect()->route('members.index');
        //Redirect to the index
    }

    public function show($id)
    {
        $member = Members::findOrfail($id); // Fetch the member by ID or throw a 404 error
        return view('members.show', compact('member'));
    }


    public function edit($id)
    {
        $member = Members::findOrfail($id); // Fetch the member by ID or throw a 404 error 
        return view('members.edit', compact('member')); // Return the view with the member data
    }

    public function update(Request $request, $id)
    {

        $member = Members::findOrfail($id); // Fetch the member by ID or throw a 404 error 

        // Validate the incoming request data
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255,' . $member->id,
            'join_date' => 'required|date',
            'phone_number' => 'nullable|string|max:8',
            'picture' => 'nullable|image|mimes:jpeg,png,jpeg,gif|max:2048',
        ]);

        // Update member information
        $member->first_name = $request->first_name;
        $member->last_name = $request->last_name;
        $member->email = $request->email;
        $member->phone_number = $request->phone_number;
        $member->join_date = $request->join_date;
        $member->status = $request->status;

        // Handle the picture upload if a new one is provided
        if ($request->hasFile('picture')) {

            // Store the new picture
            $member->picture = $request->file('picture')->store('pictures', 'public');
        }

        $member->save();

        return redirect()->route('members.index');
    }


    public function destory($id)
    {
        $member = Members::findOrfail($id); // Fetch the member by ID or throw a 404 error


        if ($member->picture && $member->picture !== 'pictures/no-photo.png') {
             // Delete the picture from the storage 
            Storage::disk('public')->delete($member->picture);
        }

        $member->delete();    // Delete the member from the database

        return redirect()->route('members.index'); // Redirect to the members index
    }
}
