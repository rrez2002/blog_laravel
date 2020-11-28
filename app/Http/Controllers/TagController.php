<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $tags = Tag::all();
        return view('user.tag.index',['tags'=>$tags]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        return view('user.tag.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $tag = new Tag([
            'name'=>$request->input('name')
        ]);
        $tag->save();
        return redirect()->route('tag.index')->with('success','Tag Successfully Created! tag title = '.$request->input('name'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View|Response
     */
    public function edit($id)
    {
        $tag = Tag::find($id);
        return view('user.tag.edit', ['tag' => $tag]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return RedirectResponse|Response
     */
    public function update(Request $request, $id)
    {
        $tag = Tag::find($id);
        $tag->name = $request->input('name');
        $tag->save();
        return redirect()->route('tag.index')->with('warning','Tag Successfully Edited!New tag title = '.$request->input('name'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse|Response
     */
    public function destroy($id)
    {
        $tag = Tag::find($id);
        $tagName = $tag->name;
        $tag->delete();
        return redirect()->back()->with('danger', $tagName . ' Successfully Deleted.');
    }
}
