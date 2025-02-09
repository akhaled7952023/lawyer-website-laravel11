<?php
namespace App\Services\Dashboard\About;

use App\Repositories\Dashboard\About\IAboutRepository;
use App\Utils\ImageManger;

class AboutService implements IAboutService  {

    protected $iAboutRepository,$imageManger;


    public function __construct(IAboutRepository $iAboutRepository , ImageManger $imageManger )
    {
        $this->iAboutRepository = $iAboutRepository;
        $this->imageManger = $imageManger;

    }
    public function updateAbout($id , $request){

        $about =$this->getAbout($id);
        $oldImageName = $about->image;
        $oldImagePath = 'uploads/general/' . $oldImageName;
        $file_name = $oldImageName;
        if($request->hasFile('image') && $request->file('image')->isValid()){
            $this->imageManger->deleteImageFromLocal($oldImagePath);
            $file_name = $this->imageManger->uploadSingleImage('/', $request['image'], 'general');

        }

        return $this->iAboutRepository->updateAbout($about , $request , $file_name);


    }
    public function getAboutById($id){
        $about =  $this->iAboutRepository->getAboutById($id);
        return  $about ?? abort(404);
    }

    public function getAbout(){
        return $this->iAboutRepository->getAbout();
    }

}
