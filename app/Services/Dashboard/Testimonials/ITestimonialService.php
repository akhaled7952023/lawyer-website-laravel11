<?php
namespace App\Services\Dashboard\Testimonials;


interface ITestimonialService{

    public function getAllTestimonials();
    public function createTestimonial($request);
    public function findTestimonialById($id);
    public function updateTestimonial($id, $request);
    public function destroy($id);

}
