<?php
namespace App\Repositories\Dashboard\Testimonials;


interface ITestimonialRepository{

    public function getAllTestimonials();
    public function createTestimonial($request , $file_name);
    public function findTestimonialById($id);
    public function updateTestimonial($testimonial, $request , $file_name);
    public function destroy($testimonial);

}
