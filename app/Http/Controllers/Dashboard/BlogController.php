<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Services\Dashboard\Blog\IBlogService;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    protected $iBlogService;

    public function __construct(IBlogService $iBlogService)
    {
        $this->iBlogService = $iBlogService;
    }

    public function index()
    {
        $blogs = $this->iBlogService->getAllBlogs();
        return view('dashboard.blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $services = $this->iBlogService->getServices();
        return view('dashboard.blog.create', compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateArticleRequest $request)
    {
        $article = $this->iBlogService->createBlog($request);
        if (!$article) {
            return back()->with('error', __('dashboard.error_msg'));
        }
        return redirect()->route('dashboard.blog.index')->with('success', __('dashboard.success_msg'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $blog = $this->iBlogService->findBlogById($id);
        $services = $this->iBlogService->getServices();
        return view('dashboard.blog.edit', compact('services', 'blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, $id)
    {
        $blog = $this->iBlogService->updateBlog($id , $request);
        if(!$blog){
            return back()->with('error', __('dashboard.error_msg'));
        }
        return redirect()->route('dashboard.blog.index')->with('success', __('dashboard.success_msg'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $blog = $this->iBlogService->destroy($id);
        if(!$blog){
             return back()->with('error', __('dashboard.error_msg'));
        }
        return redirect()->back()->with('success' , __('dashboard.success_msg'));
    }
}
