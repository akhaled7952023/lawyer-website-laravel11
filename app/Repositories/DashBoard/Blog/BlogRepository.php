<?php
namespace App\Repositories\Dashboard\Blog;

use App\Models\Article;
use App\Models\Service;

class BlogRepository implements IBlogRepository{

    public function getAllBlogs(){
        return Article::select('id', 'title' , 'service_id' , 'status')->get();
    }
    public function getServices(){
        return Service::select('id', 'title')->get();
    }
    public function createBlog($request , $file_name){

        $article = Article::create([
            'title' => [
                'ar' => $request->input('title.ar') ,
                'en' => $request->input('title.en') ,
            ],
            'slug' => [
                'ar' => $request->input('slug.ar') ,
                'en' => $request->input('slug.en') ,
            ],
            'content' => [
                'ar' => $request->content_ar,
                'en' => $request->content_en,
            ],
            'meta_description' => [
                'ar' => $request->meta_description_ar,
                'en' => $request->meta_description_en,
            ],
            'meta_keywords' => [
                'ar' => $request->meta_keywords_ar,
                'en' => $request->meta_keywords_en,
            ],
            'meta_title' => [
                'ar' => $request->meta_title_ar,
                'en' => $request->meta_title_en,
            ],
            'image' => $file_name,
            'status' => $request->status,
            'service_id' => $request->service_id,
        ]);

        return $article;
    }
    public function findBlogById($id){
        $blog = Article::findOrFail($id);
        return $blog;
    }
    public function updateBlog($blog, $request , $file_name){
        $blog->update([
            'title' => [
                'ar' => $request->input('title.ar') ,
                'en' => $request->input('title.en') ,
            ],
            'slug' => [
                'ar' => $request->input('slug.ar') ,
                'en' => $request->input('slug.en') ,
            ],
            'content' => [
                'ar' => $request->content_ar,
                'en' => $request->content_en,
            ],
            'meta_description' => [
                'ar' => $request->meta_description_ar,
                'en' => $request->meta_description_en,
            ],
            'meta_keywords' => [
                'ar' => $request->meta_keywords_ar,
                'en' => $request->meta_keywords_en,
            ],
            'meta_title' => [
                'ar' => $request->meta_title_ar,
                'en' => $request->meta_title_en,
            ],
            'image' => $file_name,
            'status' => $request->status,
            'service_id' => $request->service_id,
        ]);

        return $blog;
    }
    public function destroy($blog){

        return $blog->delete();

    }

}
