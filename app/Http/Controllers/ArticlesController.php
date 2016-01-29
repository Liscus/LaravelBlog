<?php

namespace App\Http\Controllers;

use App\Article;
use App\Tag;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth;

class ArticlesController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth', ['except' => ['only' => 'index']]);
    }


    public function index()
    {

    	$articles = Article::latest('published_at')->published()->get();
        $latest = Article::latest()->first();
        
    	return view('articles.index', compact('articles'));
      
    }


    public function show(Article $article)
    {
    	return view('articles.show')->with('article', $article);
    }


    public function create()
    {
        $tags = Tag::lists('name', 'id');
        return view('articles.create')->with('tags', $tags);
    }


    public function store(ArticleRequest $request)
    {
        $this->createArticle($request);

        flash('Your article has been created');

        return redirect('/articles')->with('flash_message');
    }


    public function edit(Article $article)
    {
        $tags = Tag::lists('name', 'id');

        return view('articles.edit', array('article' => $article, 'tags' => $tags));
    }


    public function update(ArticleRequest $request, Article $article)
    {
        $article->update($request->all());

        $article->tags()->sync((!$request->input('taglist') ? [] : $request->input('taglist')));

        return redirect('/articles/' . $article->id );
    }


    public function tags()
    {
        return $this->belongs('App\Tag');
    }


    public function getTagListAttribute()
    {
        return $this->tags->lists('id');
    }


    private function syncTags(Article $article, array $tags)
    {
        $article->tags()->sync($tags);
    }


    private function createArticle($request)
    {
        $article = \Auth::user()->articles()->create($request->all());

        $this->syncTags($article, $request->input('taglist'));

        return $article;
    }



}
