<?php

namespace App\Http\Controllers;

use Aginev\Datagrid\Datagrid;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $articles = Article::paginate(25);


        $grid = new Datagrid($articles, $request->get('f', []));
        $grid->setColumn('title', 'Title')
            ->setColumn('text', 'Text')
            ->setActionColumn(['wrapper' => function ($value, $row) {
                if (Auth::user() != null) {
                    if (Auth::user()->id == $row->authorID) {
                        return '<a href="' . route('article.edit', [$row->id]) . '" title="Edit" class="btn btn-sm btn-primary">Edit</a>
                        <button value="' . $row->id. '" title="Delete" class="btn btn-sm btn-danger vymazButton">Delete</button>';
                    } elseif (Auth::user()->email == 'admin@admin.admin') {
                        return '<a href="' . route('article.edit', [$row->id]) . '" title="Edit" class="btn btn-sm btn-primary">Edit</a>
                  <button value="' . $row->id . '" title="Delete" class="btn btn-sm btn-danger vymazButton">Delete</button>';
                    }
                }
            }]);

        return view('article.index', ['grid' => $grid]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('article.create', ['action' => route('article.store'), 'method' => 'post']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'text' => 'required'
        ]);

        $article = Article::create($request->all());
        $article->authorID = Auth::user()->id;  //TOTO JE MOJ KAMARAD
        $article->save();
        return redirect()->route('article.show');
    }


    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $articles = Article::all()->toArray();
        return view('article.showAll', compact('articles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('article.edit', ['action' => route('article.update', $article->id), 'method' => 'put', 'model' => $article]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'required',
            'text' => 'required']);


        $article->update($request->all());
        return redirect()->route('article.show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */

    public function destroy($id)
    {
        $article = Article::find($id);
        $article->delete();
//        return redirect()->route('article.index');
        return json_encode(array('statusCode' => 200));
    }
}
