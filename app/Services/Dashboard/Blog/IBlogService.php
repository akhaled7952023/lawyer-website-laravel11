<?php
namespace App\Services\Dashboard\Blog;

interface IBlogService {

    public function getAllBlogs();
    public function getServices();
    public function createBlog($request);
    public function findBlogById($id);
    public function updateBlog($id, $request );
    public function destroy($id);

}
