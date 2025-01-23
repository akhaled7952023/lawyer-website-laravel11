<?php
namespace App\Services\Dashboard\clients;


interface IClientsService  {


 public function addOrUpdate(array $clients);
 public function delete($id);


}
