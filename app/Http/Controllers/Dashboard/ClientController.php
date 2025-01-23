<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClientRequest;
use App\Models\Client;
use App\Services\Dashboard\clients\IClientsService;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    protected $clientService;

    public function __construct(IClientsService $clientService)
    {
        $this->clientService = $clientService;
    }
    public function index() {
        $clients = Client::all();
        return view('dashboard.clients.index', compact('clients'));
    }

    public function update(ClientRequest $request) {

        $this->clientService->addOrUpdate($request->clients);

        return redirect()->back()->with('success', __('Clients updated successfully!'));

    }

    public function delete($id)
    {
        $response = $this->clientService->delete($id);

        return response()->json($response, $response['status']);
    }


}
