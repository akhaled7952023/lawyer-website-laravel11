<?php
namespace App\Services\Dashboard\Faq;

use App\Repositories\Dashboard\Faq\IFaqRepository;

class FaqService implements IFaqService{

    protected $iFaqRepository;

    public function __construct(IFaqRepository $iFaqRepository)
    {
        $this->iFaqRepository = $iFaqRepository;

    }

    public function getAllFaqs(){
        return $this->iFaqRepository->getAllFaqs();

    }
    public function createFaq($request){
        return $this->iFaqRepository->createFaq($request);
    }
    public function findFaqById($id){
        return $this->iFaqRepository->findFaqById($id);
    }
    public function updateFaq($id, $request ){
        $faq = $this->findFaqById($id);

        return $this->iFaqRepository->updateFaq($faq , $request);

    }
    public function destroy($id){
        $faq = $this->findFaqById($id);
        return $this->iFaqRepository->destroy($faq);
    }

}
