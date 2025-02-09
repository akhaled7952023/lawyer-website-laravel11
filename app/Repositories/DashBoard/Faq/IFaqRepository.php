<?php
namespace App\Repositories\Dashboard\Faq;


interface IFaqRepository{

    public function getAllFaqs();
    public function createFaq($request );
    public function findFaqById($id);
    public function updateFaq($faq, $request );
    public function destroy($faq);

}
