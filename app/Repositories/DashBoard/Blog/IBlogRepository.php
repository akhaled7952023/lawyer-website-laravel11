<?php
namespace App\Repositories\Dashboard\Blog;


interface IBlogRepository{

    public function getAllBlogs();
    public function getServices();
    public function createBlog($request , $file_name);
    public function findBlogById($id);
    public function updateBlog($blog, $request , $file_name);
    public function destroy($blog);

}
