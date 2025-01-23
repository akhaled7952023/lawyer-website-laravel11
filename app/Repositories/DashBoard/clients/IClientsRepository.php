<?php
namespace App\Repositories\Dashboard\clients;


interface IClientsRepository{

    public function createClient(array $data);
    public function find($id);
    public function updateClient(int $id, array $data);
    public function delete($id);
}
