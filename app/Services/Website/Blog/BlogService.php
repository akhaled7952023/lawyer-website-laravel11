<?php
namespace App\Services\Website\Blog;

use App\Repositories\Website\Blog\IBlogRepository;

class BlogService implements IBlogService
{
    protected $iBlogRepository;

    public function __construct(IBlogRepository $iBlogRepository)
    {
        $this->iBlogRepository = $iBlogRepository;
    }

    public function getBlogs()
    {
        return $this->iBlogRepository->getBlogs() ?? abort(404);
    }

    public function getBlogBySlug($slug)
    {
        $blog = $this->iBlogRepository->getBlogBySlug($slug);

        if (!$blog) {
            abort(404);
        }

        return $blog;
    }

    public function getServices()
    {
        return $this->iBlogRepository->getServices();


    }

    public function getBlogsWithCategory($serviceId)
    {
        return $this->iBlogRepository->getBlogsWithCategory($serviceId);

    }

    public function getLastFourBlogs($articleId)
    {
        return  $this->iBlogRepository->getLastFourBlogs($articleId);

    }

    public function getTwoRelatedBlogs($serviceId, $articleId)
    {
        return  $this->iBlogRepository->getTwoRelatedBlogs($serviceId, $articleId);

    }
}
