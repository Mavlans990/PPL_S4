<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Address;
use App\Models\Users;
use Illuminate\Http\Request;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $contacts = Contact::latest()->get();
        
        // return view('dashboard.contact.index', compact('contacts'));
        // return Contact::all();
        return view('dashboard.contact.index', [
            'contacts' => Contact::all(),
        ]);

        // $contact = Contact::find(3);
        // $address = $contact->user_relasi->username;
        // dd($address);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.contact.create', [
            'users' => Users::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'users_id' => 'required'
        ]);

        Contact::create($validate);
        return redirect('/dashboard/contact')->with('success', 'Data berhasil ditambahkan!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        return $contact;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        return view('dashboard.contact.edit', [
            'contact' => $contact,
            'users' => Users::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        $validate = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'users_id' => 'required'
        ]);

        Contact::where('id', $contact->id)->update($validate);
        return redirect('/dashboard/contact')->with('success', 'Ubah data berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        Contact::destroy($contact->id);
        Address::destroy($contact->id);
        return redirect('/dashboard/contact')->with('success', 'Data berhasil dihapus!');
    }
}
