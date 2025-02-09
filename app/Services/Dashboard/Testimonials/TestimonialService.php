<?php
namespace App\Services\Dashboard\Testimonials;

use App\Repositories\Dashboard\Testimonials\ITestimonialRepository;
use App\Utils\ImageManger;

class TestimonialService implements ITestimonialService{

    protected $iTestimonialRepository, $imageManger;

    public function __construct(ITestimonialRepository $iTestimonialRepository, ImageManger $imageManger)
    {
        $this->iTestimonialRepository = $iTestimonialRepository;
        $this->imageManger = $imageManger;
    }


    public function getAllTestimonials(){

        return $this->iTestimonialRepository->getAllTestimonials();

    }
    public function createTestimonial($request){

        $file_name = 'default.png';

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $file_name = $this->imageManger->uploadSingleImage('/', $request->file('image'), 'general');

        }

        return $this->iTestimonialRepository->createTestimonial($request , $file_name);

    }
    public function findTestimonialById($id){

        return $this->iTestimonialRepository->findTestimonialById($id);
    }
    public function updateTestimonial($id, $request){

        $testimonial = $this->findTestimonialById($id);
        $oldImageName = $testimonial->image;
        $oldImagePath = 'uploads/general/' . $oldImageName;
        $file_name = $oldImageName;
        if($request->hasFile('image') && $request->file('image')->isValid()){
            $this->imageManger->deleteImageFromLocal($oldImagePath);
            $file_name = $this->imageManger->uploadSingleImage('/', $request['image'], 'general');
            $request['image'] = $file_name;
        }

        return $this->iTestimonialRepository->updateTestimonial($testimonial, $request , $file_name);
    }
    public function destroy($id){

        $testimonial = $this->findTestimonialById($id);
        return $this->iTestimonialRepository->destroy($testimonial);
    }

}
