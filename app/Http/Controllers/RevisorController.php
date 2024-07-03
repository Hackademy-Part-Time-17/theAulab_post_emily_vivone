<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class RevisorController extends Controller
{
    public function dashboard()
    {
        $unRevisionedArticles = Article::where('is_accepted', NULL)->get();
        $acceptedArticles = Article::where('is_accepted', true)->get();
        $rejectedArticles = Article::where('is_accepted', false)->get();

        return view('revisor.dashboard', compact('unRevisionedArticles', 'acceptedArticles', 'rejectedArticles'));
    }

    public function acceptArticle (Article $article)
    {
        $article->is_accepted = true ;
        $article->save();

        return redirect(route('revisor.dashboard'))->with('message', 'Hai accettato l\'articolo correttamente');
    }

    public function rejectArticle (Article $article)
    {
        $article->is_accepted = false ;
        $article->save();

        return redirect(route('revisor.dashboard'))->with('message', 'Hai rifiutato l\'articolo correttamente');
    }

    public function undorticle (Article $article)
    {
        $article->is_accepted = null ;
        $article->save();

        return redirect(route('revisor.dashboard'))->with('message', 'Hai riportato l\'articolo in revisione');
    }
}
