<?php

namespace Modules\Admin\Http\Controllers;

use App\Http\Requests\RequestArticle;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AdminArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $articles = Article::paginate(10);

        $viewData = [
            'articles' => $articles
        ];

        return view('admin::article.index', $viewData);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('admin::article.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(RequestArticle $requestArticle)
    {
        $this->insertOrUpdate($requestArticle);
        return redirect('admin/article');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('admin::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $article = Article::find($id);
        return view('admin::article.update', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(RequestArticle $requestArticle, $id)
    {
        $this->insertOrUpdate($requestArticle, $id);
        return redirect('admin/article');
    }

    public function insertOrUpdate(RequestArticle $requestArticle, $id = '')
    {
        $code = 1;
        try {
            $article = new Article();

            if ($id) {
                $article = Article::find($id);
            }

            $article->a_name = $requestArticle->a_name;
            $article->a_slug = str_slug($requestArticle->a_name);
            $article->a_content = $requestArticle->a_content;
            $article->a_description = $requestArticle->a_description;
            $article->a_title_seo = $requestArticle->a_title_seo ? $requestArticle->a_title_seo : $requestArticle->a_name;
            $article->a_description_seo = $requestArticle->a_description_seo ? $requestArticle->a_description_seo : $requestArticle->a_description;
            $article->save();
        } catch (\Exception $exception) {
            $code = 0;
            \Log::error("[Error insertOrUpdate Article]" . $exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        Article::destroy($id);
        return redirect('admin/article');
    }
}
