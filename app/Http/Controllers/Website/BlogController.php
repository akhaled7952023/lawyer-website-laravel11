<?php

namespace App\Http\Controllers\Website;

use App\Helpers\TranslationHelper;
use App\Http\Controllers\Controller;
use App\Services\Website\Blog\IBlogService;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    protected $iBlogService;

    public function __construct(IBlogService $iBlogService)
    {
        $this->iBlogService = $iBlogService;
    }
    public function index(){
        $articles = $this->iBlogService->getBlogs();

        return view('website.blog.index' , compact('articles'));
    }

    public function show($slug){
        $translatedSlug = TranslationHelper::getTranslatedSlug(\App\Models\Article::class, $slug);

        $article = $this->iBlogService->getBlogBySlug($slug);
        $service_id = $article->service_id;
        $services = $this->iBlogService->getServices();
        $latest_articles = $this->iBlogService->getLastFourBlogs($article->id);
        $related_articles = $this->iBlogService->getTwoRelatedBlogs($service_id , $article->id);

        return view('website.blog.blogdetails', compact('article'  , 'related_articles' , 'services' , 'latest_articles' , 'translatedSlug'));
    }

    public function showarticles($serviceid, $servicetitle){

        $articles = $this->iBlogService->getBlogsWithCategory($serviceid);
    [$title_ar, $title_en] = explode('__', $servicetitle);
    $servicetitle = app()->getLocale() === 'ar' ? $title_ar : $title_en;
        return view('website.blog.article_services' , compact('articles' , 'servicetitle'));
    }

    }
