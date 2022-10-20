<?php

namespace App\Http\Controllers;

use App\Jobs\ContactMailSenderJob;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => "required|string",
            'email' => "required|email",
            'subject'=>"required|string",
            'message' => 'required|string'
        ],[
            "name.required"=>"Veuillez entrer votre nom",
            "email.required" => "Veuillez entrer votre adresse mail",
            "subject.required" => "ce champ est requis",
            "message.required" => "ce champ est requis",
        ]);

        $job = (new ContactMailSenderJob($request->all()))->delay(Carbon::now()->addSeconds(3));
        dispatch($job);
        return back()->with("msg","Votre mail a été envoyer avec succès !");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
