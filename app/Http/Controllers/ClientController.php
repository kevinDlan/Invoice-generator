<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{
    private array $validatorArray = [
        "last_name" => "required|string",
        "first_name" => "required|string",
        "address" => "required|string",
        "contact" => "required|string",
        "email" => "required|email|unique:clients,email"
    ];

    private array $validatorMessage = ["email.unique" => "un client est déjà enregistrer avec cette adresse mail"];

    public function __construct()
    {
        $this->middleware("auth");
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        
        if($request->ajax && $request->ajax = true)
        {
            try
            {
                $client = Client::all();
                return response()->json($client);
            }catch (\Throwable $th) {
                return response()->json(['message'=>$th->getMessage()],status:500);
            }
        }
        return view("features.dashboard.clients.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("features.dashboard.clients.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->ajax()) 
        {
            try {
                $validator = Validator::make($request->all(), $this->validatorArray, $this->validatorMessage);

                if ($validator->failed()) {
                    return response()->json(["errors" => $validator->errors()->all()], status: 422);
                }

                $client = Client::create($request->all());
                return response()->json($client);
            } catch (\Throwable $th) {
                return response()->json(["errors" => $th->getMessage()], status: 500);
            }
        }
        $this->validate($request, $this->validatorArray, $this->validatorMessage);

        Client::create($request->all());

        return to_route("clients.index")->with("msg", "successfull");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        return response()->json($client);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $client->last_name = $request->last_name;
        $client->first_name = $request->first_name;
        $client->address = $request->address;
        $client->contact = $request->contact;
        $client->email = $request->email;

        $client->save();
        return to_route('clients.index')->with('msg','successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        //to do delete all invoice for this client
        $client->delete();
        // dd($client);
        return to_route("clients.index")->with("msg","succefully");
    }
}
