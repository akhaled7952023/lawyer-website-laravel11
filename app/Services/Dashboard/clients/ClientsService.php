<?php
namespace App\Services\Dashboard\clients;

use App\Repositories\Dashboard\clients\IClientsRepository;
use App\Utils\ImageManger;

class ClientsService implements IClientsService  {

    protected $clientRepository,$imageManger;

    public function __construct(IClientsRepository $clientRepository ,  ImageManger $imageManger)
    {
        $this->clientRepository = $clientRepository;
        $this->imageManger = $imageManger;
    }

 public function addOrUpdate(array $clients)
{
    foreach ($clients as $client) {

        if (isset($client['id']) && $client['id']) {

            $existingClient = $this->clientRepository->find($client['id']);
            if (isset($client['logo']) && $client['logo'] != null) {

                $oldImageName = $existingClient->logo;
                $oldImagePath = 'uploads/general/' . $oldImageName;
                $this->imageManger->deleteImageFromLocal($oldImagePath);

                $file_name = $this->imageManger->uploadSingleImage('/', $client['logo'], 'general');
                $client['logo'] = $file_name;
            }
            else {
                $client['logo'] = $existingClient->logo;
            }

            $this->clientRepository->updateClient($client['id'], [
                'link' => $client['link'],
                'logo' => $client['logo'] ,
            ]);
        }

        else {

            $file_name = isset($client['logo']) && $client['logo']
            ? $this->imageManger->uploadSingleImage('/', $client['logo'], 'general')
            : null;


            $this->clientRepository->createClient([
                'link' => $client['link'],
                'logo' => $file_name,
            ]);
        }
    }
}

public function delete($id)
{
    $client = $this->clientRepository->find($id);

    if ($client) {

        $ImageName = $client->logo;
        if($ImageName != null){
            $oldImagePath = 'uploads/general/' . $ImageName;
            $this->imageManger->deleteImageFromLocal($oldImagePath);
        }
        $this->clientRepository->delete($client);


        return [
            'status' => 201,
            'message' => 'تم الحذف بنجاح'
        ];
    }


    return [
        'status' => 404,
        'message' => 'العميل غير موجود'
    ];
}


}
