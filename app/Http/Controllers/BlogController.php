<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
        $articles = Article::when(isset(request()->searchKey),function ($q){
            $searchKey = request()->searchKey;
            return $q->where("article_title","like","%$searchKey%")->orwhere("article_description","like","%$searchKey%");
        })->with(['getUser','getCategory'])->latest('id')->paginate(5);
        return view('welcome',compact('articles'));
    }

    public function detail($id){
        $article = Article::find($id);
        return view('blog.detail',compact('article'));
    }

    public  function baseOnCategory($id){
        $articles = Article::when(isset(request()->searchKey),function ($q){
            $searchKey = request()->searchKey;
            return $q->orwhere("article_title","like","%$searchKey%")->orwhere("article_description","like","%$searchKey%");
        })->where("category_id",$id)->with(['getUser','getCategory'])->latest('id')->paginate(5);
        return view('welcome',compact('articles'));
    }

    public  function baseOnOwner($id){
        $articles = Article::where("user_id",$id)->with(['getUser','getCategory'])->latest('id')->paginate(5);
        return view('welcome',compact('articles'));
    }

    public  function baseOnDate($date){
        $articles = Article::whereDate("created_at",$date)->with(['getUser','getCategory'])->latest('id')->paginate(5);
        return view('welcome',compact('articles'));
    }
}
