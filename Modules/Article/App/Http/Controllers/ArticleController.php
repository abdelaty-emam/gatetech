<?php

namespace Modules\Article\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Article\App\Http\Requests\CreateArticleRequest;
use Modules\Article\App\Repositories\ArticleRepository;

class ArticleController extends Controller
{
    protected $articleRepository;

    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles =  $this->articleRepository->getAll();

        return view('article::index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('article::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateArticleRequest $request): RedirectResponse
    {
        // dd($request);
        $data = $request->validated();
        if ($request->hasFile('photo')) {
            $imageName = $this->upload($request->photo, 'article');
            $data['photo'] = $imageName;
        }
        $this->articleRepository->store($data);
        return redirect()->route('article.index')
               ->with('success', 'Post created successfully.');
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('article::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $article = $this->articleRepository->getById($id);

        return view('article::edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->validated();
        $this->articleRepository->update($data, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->articleRepository->destroy($id);

        return redirect()->route('article.index')->with('status', 'Successfully Deleted');
    }
}
