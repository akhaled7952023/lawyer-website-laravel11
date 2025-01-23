<?php
namespace App\Services\Dashboard\Header;

use App\Models\Header;
use App\Repositories\Dashboard\Header\IHeaderRepository;
use App\Utils\ImageManger;

class HeaderService implements IHeaderService {

    protected $iHeaderRepository, $imageManger;

    public function __construct(IHeaderRepository $iHeaderRepository, ImageManger $imageManger)
    {
        $this->iHeaderRepository = $iHeaderRepository;
        $this->imageManger = $imageManger;
    }

    public function updateHeader($request , $id){

        $header = $this->iHeaderRepository->getHeader($id);
        $oldImage = $header->image;
        $mainImage = $oldImage ;
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $this->imageManger->deleteImageFromLocal($oldImage);
            $mainImage = $this->imageManger->uploadSingleImage('/', $request['image'], 'general');
        }

        $features = $this->handleFeatures($header, $request->features);

        return $this->iHeaderRepository->updateHeader($request , $header , $mainImage , $features);

    }


    private function handleFeatures($header, $featuresRequest) {
        $features = $header->features;

        foreach ($featuresRequest as $index => $feature) {

            if (isset($feature['image']) && $feature['image']->isValid()) {

                if (isset($features[$index]['image']) && $features[$index]['image']) {
                    $this->imageManger->deleteImageFromLocal('uploads/general/' . $features[$index]['image']);
                }

                $features[$index]['image'] = $this->imageManger->uploadSingleImage('/', $feature['image'], 'general');
            } else {

                $features[$index]['image'] = $features[$index]['image'] ?? null;
            }


            $features[$index]['text_ar'] = $feature['text_ar'] ?? $features[$index]['text_ar'];
            $features[$index]['text_en'] = $feature['text_en'] ?? $features[$index]['text_en'];
        }

        return $features;
    }



 }
