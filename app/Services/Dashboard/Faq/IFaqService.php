<?php
namespace App\Services\Dashboard\Faq;


interface IFaqService{

    public function getAllFaqs();
    public function createFaq($request );
    public function findFaqById($id);
    public function updateFaq($id, $request);
    public function destroy($id);

}
