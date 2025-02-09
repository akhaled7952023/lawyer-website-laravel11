<?php
namespace App\Repositories\Website\Blog;


interface IBlogRepository{

    public function getBlogs();
    public function getBlogBySlug($slug);
    public function getServices();
    public function getBlogsWithCategory($serviceId);
    public function getLastFourBlogs($articleId);
    public function getTwoRelatedBlogs($serviceId, $articleId);



}
