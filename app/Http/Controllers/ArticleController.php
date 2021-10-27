<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::when(isset(request()->searchKey),function ($q){
            $searchKey = request()->searchKey;
            return $q->where("article_title","like","%$searchKey%")->orwhere("article_description","like","%$searchKey%");
        })->with(['getUser','getCategory'])->latest('id')->paginate(5);
        return view('article.index',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('article.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category'=>'required|exists:categories,id',
            'article_title' => 'required|min:3|max:1000',
            'article_description'=>'required|min:10',
        ]);

        $article = new Article();
        $article->article_title = $request->article_title;
        $article->article_description = $request->article_description;
        $article->category_id = $request->category;
        $article->save();

        return redirect()->route('article.index')->with('toast','New Article has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('article.show',compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('article.edit',compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'category'=>'required|exists:categories,id',
            'article_title' => 'required|min:3|max:1000',
            'article_description'=>'required|min:10',
        ]);

        $article->article_title = $request->article_title;
        $article->article_description = $request->article_description;
        $article->user_id = Auth::id();
        $article->category_id = $request->category;
        $article->update();

        return redirect()->route('article.index')->with('toast','Article has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article= Article::find($id);
        $article->delete();
        return redirect()->route('article.index',['page'=>request()->page
        ])->with('toast','Article has been deleted');
    }
}
