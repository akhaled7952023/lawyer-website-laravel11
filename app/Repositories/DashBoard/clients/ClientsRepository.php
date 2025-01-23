<?php
namespace App\Repositories\Dashboard\clients;

use App\Models\Client;

class ClientsRepository implements IClientsRepository{

    public function createClient(array $data){

        return Client::create($data);
    }
    public function find($id)
{
    return Client::find($id);
}
    public function updateClient(int $id, array $data){

        $client = Client::findOrFail($id);
        $client->update($data);
        return $client;
    }

    public function delete($client){
     return $client->delete();
    }
}
