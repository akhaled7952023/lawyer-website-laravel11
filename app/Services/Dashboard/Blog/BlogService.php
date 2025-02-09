<?php
namespace App\Services\Dashboard\Blog;

use App\Repositories\Dashboard\Blog\IBlogRepository;
use App\Utils\ImageManger;

class BlogService implements IBlogService {

    protected $iBlogRepository, $imageManger;

    public function __construct(IBlogRepository $iBlogRepository, ImageManger $imageManger)
    {
        $this->iBlogRepository = $iBlogRepository;
        $this->imageManger = $imageManger;
    }

    public function getAllBlogs(){
        return $this->iBlogRepository->getAllBlogs();
    }
    public function getServices(){
        return $this->iBlogRepository->getServices();
    }
    public function createBlog($request){
        $file_name = null;

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $file_name = $this->imageManger->uploadSingleImage('/', $request->file('image'), 'general');

        }
        return $this->iBlogRepository->createBlog($request , $file_name);
    }
    public function findBlogById($id){
        return $this->iBlogRepository->findBlogById($id);
    }
    public function updateBlog($id, $request ){
        $blog = $this->findBlogById($id);
        $oldImageName = $blog->image;
        $file_name = $oldImageName;
        if($request->hasFile('image') && $request->file('image')->isValid()){
            $oldImagePath = 'uploads/general/' . $oldImageName;
            $this->imageManger->deleteImageFromLocal($oldImagePath);
            $file_name = $this->imageManger->uploadSingleImage('/', $request['image'], 'general');

        }

        return $this->iBlogRepository->updateBlog( $blog ,$request ,  $file_name );
    }
    public function destroy($id){
        $blog = $this->findBlogById($id);
        return $this->iBlogRepository->destroy($blog);
    }

}
