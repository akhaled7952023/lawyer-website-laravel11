<?php
namespace App\Repositories\Website\Blog;

use App\Models\Article;
use App\Models\Service;
use Illuminate\Support\Facades\DB;

class BlogRepository implements IBlogRepository{

    public function getBlogs(){
        return Article::active()
    ->select(
        'slug',
        'title',
        'image',
        'created_at',
       // DB::raw('DATE_FORMAT(created_at, "%d-%m-%Y") as formatted_date')
    )
    ->paginate(9);
    }
    public function getBlogBySlug($slug){
        $locale = app()->getLocale();
        return Article::where("slug->{$locale}", $slug)->first();
    }
    public function getServices(){
        return Service::withCount('articles')
        ->addSelect('id', 'title') // فقط الحقول المطلوبة
        ->get();
    }
    public function getBlogsWithCategory($serviceId)
    {
        return Article::where('service_id', $serviceId)
            ->select('slug', 'title', 'image' , 'service_id' , 'created_at')
            ->paginate(9);
    }
    public function getLastFourBlogs($articleId)
    {
        return Article::active()
        ->where('id', '!=', $articleId)
        ->select('slug', 'title', 'image', DB::raw('DATE(created_at) as created_at'))
        ->latest('created_at')
        ->take(4)
        ->get();
    }

    public function getTwoRelatedBlogs($serviceId, $articleId)
{
    return Article::active()
        ->where('service_id', $serviceId)
        ->where('id', '!=', $articleId)
        ->select('slug', 'title', 'image', DB::raw('DATE(created_at) as created_at'))
        ->take(2)
        ->inRandomOrder()
        ->get();
}

}
