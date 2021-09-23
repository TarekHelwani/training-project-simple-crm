<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateClientRequest;
use App\Http\Requests\EditClientRequest;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{

    public function index()
    {
        $clients = Client::paginate(20);

        return view('clients.index', compact('clients'));
    }

    public function store(CreateClientRequest $request)
    {
        Client::create($request->validated());

        return redirect()->route('clients.index');
    }

    public function create()
    {
        return view('clients.create');
    }

    public function show($id)
    {
        //
    }

    public function edit(Client $client)
    {
        return view('clients.edit', compact('client'));
    }

    public function update(EditClientRequest $request, Client $client)
    {
        $client->update($request->validated());

        return redirect()->route('clients.index');
    }

    public function destroy($id)
    {
        //
    }
}
