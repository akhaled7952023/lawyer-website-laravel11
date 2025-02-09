<?php
namespace App\Services\Website\Blog;


interface IBlogService{

    public function getBlogs();
    public function getBlogBySlug($slug);
    public function getServices();
    public function getBlogsWithCategory($serviceId);
    public function getLastFourBlogs($articleId);
    public function getTwoRelatedBlogs($serviceId, $articleId);

}
