<?php
namespace App\Repositories\Dashboard\Faq;

use App\Models\Faq;

class FaqRepository implements  IFaqRepository{

    public function getAllFaqs(){
        return Faq::select('id', 'question', 'status')->paginate(10);
    }
    public function findFaqById($id){

        $faq = Faq::findOrFail($id);
        return $faq;
    }
    public function createFaq($request){

        $faq = Faq::create([
            'question' => [
                'ar' => $request->question_ar,
                'en' => $request->question_en,
            ],
            'answer' => [
                'ar' => $request->answer_ar,
                'en' => $request->answer_en,
            ],

            'status' => $request->status,
        ]);

        return $faq;

    }
    public function updateFaq($faq , $request){

        $faq->update([
            'question' => [
                'ar' => $request->question_ar,
                'en' => $request->question_en,
            ],
            'answer' => [
                'ar' => $request->answer_ar,
                'en' => $request->answer_en,
            ],

            'status' => $request->status,

        ]);

        return $faq;

    }
    public function destroy($faq){
        return $faq->delete();
    }

}
