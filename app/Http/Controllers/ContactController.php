<?php

namespace App\Http\Controllers;

use App\Http\Helpers\Funcs;
use App\Models\Contact;
use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;
use App\Models\Setting;
use DB;

class ContactController extends Controller
{
    use Funcs;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perPage = Setting::find('perPage')->value ?? 10;
        $contacts = Contact::latest()->paginate($perPage);

        return view('contacts.index' , compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $phone = optional(Setting::find("phone"))->value;
        $email = optional(Setting::find("email"))->value;
        $address = optional(Setting::find("address"))->value;
        return view('website.contact' , compact('email' , 'phone' , 'address'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreContactRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContactRequest $request)
    {
        $data = $request->validated();

        Contact::create($data);

        $this->success();

        return redirect()->route('website.contact.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateContactRequest  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateContactRequest $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();
        $this->success(__('all.done_successfully'));
        return route('admin.contacts.index');
    }


    public function destroyAll()
    {
        DB::table('contacts')->truncate();
        $this->success(__('all.done_successfully'));
        return redirect()->route('admin.contacts.index');
    }
}
