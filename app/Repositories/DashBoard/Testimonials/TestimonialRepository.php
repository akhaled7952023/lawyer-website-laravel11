<?php
namespace App\Repositories\Dashboard\Testimonials;

use App\Models\Testimonial;

class TestimonialRepository implements  ITestimonialRepository{

    public function getAllTestimonials(){

        return Testimonial::select('id', 'name', 'status')->paginate(10);
    }
    public function findTestimonialById($id){
        $testimonial = Testimonial::findOrFail($id);
        return $testimonial;
    }
    public function createTestimonial($request , $file_name){

        $testimonial = Testimonial::create([

            'name' => [
                'ar' => $request->name_ar,
                'en' => $request->name_en,
            ],
            'job' => [
                'ar' => $request->job_ar,
                'en' => $request->job_en,
            ],
            'feedback' => [
                'ar' => $request->feedback_ar,
                'en' => $request->feedback_en,
            ],
            'image' => $file_name,
            'status' => $request->status,
        ]);

        return $testimonial;
    }
    public function updateTestimonial($testimonial, $request , $file_name){

        $testimonial->update([
            'name' => [
                'ar' => $request->name_ar,
                'en' => $request->name_en,
            ],
            'job' => [
                'ar' => $request->job_ar,
                'en' => $request->job_en,
            ],
            'feedback' => [
                'ar' => $request->feedback_ar,
                'en' => $request->feedback_en,
            ],
            'image' => $file_name,
            'status' => $request->status,
        ]);

        return $testimonial;


    }
    public function destroy($testimonial){
        return $testimonial->delete();
    }

}
