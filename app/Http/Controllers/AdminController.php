<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard() 
    {
        $adminRequests = User::where('is_admin', NULL)->get();
        $revisorRequests = User::where('is_revisor', NULL)->get();
        $writerRequests = User::where('is_writer', NULL)->get();

        return view('admin.dashboard', compact('adminRequests', 'revisorRequests', 'writerRequests'));
    }

    public function setAdmin(User $user)
    {
        $user->is_admin = true;
        $user->save();

        return redirect(route('admin.dashboard'))->with('message', 'Hai correttamente reso Amministratore l\'utente' . $user->name );
    }

    public function setRevisor(User $user)
    {
        $user->is_revisor = true;
        $user->save();

        return redirect(route('admin.dashboard'))->with('message', 'Hai correttamente reso Revisore l\'utente' . $user->name );
    }

    public function setWriter(User $user)
    {
        $user->is_writer = true;
        $user->save();

        return redirect(route('admin.dashboard'))->with('message', 'Hai correttamente reso Redattore l\'utente ' . ucfirst($user->name) );
    }

    public function editTag (Request $request, Tag $tag)
    {
        $request->validate([
            'name' => 'required|unique:tags'
        ]);

        $tag->update([
            'name' => strtolower($request->name),
        ]);

        return redirect(route('admin.dashboard'))->with('message', 'Hai correttamente aggiornato il tag ');
        
    }

    public function deleteTag(Tag $tag)
    {
        foreach ($tag->articles as $article) {
            $article->tags()->detach($tag);
        }

        $tag->delete();

        return redirect(route('admin.dashboard'))->with('message', 'Hai correttamente eliminato il tag ' . $tag->name);

    }

    public function editCategory (Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|unique:categories'
        ]);

        $category->update([
            'name' => strtolower($request->name),
        ]);

        return redirect(route('admin.dashboard'))->with('message', 'Hai correttamente aggiornato la categoria ');
        
    }

    public function deleteCategory(Category $category)
    {
        Category::destroy($category->id);

        return redirect(route('admin.dashboard'))->with('message', 'Hai correttamente eliminato la categoria');

    }

    public function storeCategory (Request $request)
    {
        Category::create([
            'name' => $request->name,
        ]);

        return redirect(route('admin.dashboard'))->with('message', 'Hai aggiunto la categoria: ' . $request->name);
    }
}
