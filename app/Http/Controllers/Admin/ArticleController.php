<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use App\Mail\SendNewMail;
use Illuminate\Support\Facades\Mail;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Prendo l'id dell'utente autenticato
        $user_id = Auth::id();
        //dd($user_id);

        // Mostro solo i post dell'utente 
        $articles = Article::where('user_id', $user_id)->get();
        
        return view('admin.post.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $request->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'content' => 'required',
            'slug' => 'required|unique:articles',
            'image' => 'image'
        ]);

        $path = Storage::disk('public')->put('images', $data['image']);

        $newArticle = new Article;
        $newArticle->user_id = Auth::id();
        $newArticle->title = $data['title'];
        $newArticle->excerpt = $data['excerpt'];
        $newArticle->content = $data['content'];
        $newArticle->slug = $data['slug'];
        $newArticle->image = $path;

        $newArticle->save();
        
        Mail::to($newArticle->user->email)->send(new SendNewMail($newArticle));

        return redirect()->route('admin.posts.show', $newArticle->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::find($id);
        return view('admin.post.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('admin.post.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $request->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'content' => 'required',
            'slug' => [
                'required',
                Rule::unique('articles')->ignore($id),
            ],
            'image' => 'nullable|image'
        ]);

        $path = Storage::disk('public')->put('images', $data['image']);
        
        $article = Article::find($id);

        $article->user_id = Auth::id();
        $article->title = $data['title'];
        $article->excerpt = $data['excerpt'];
        $article->content = $data['content'];
        $article->slug = $data['slug'];
        $article->image = $path;

        $article->update($data);

        return redirect()->route('admin.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::find($id);
        $article->delete();

        return redirect()->route('admin.posts.index');
    }
}
