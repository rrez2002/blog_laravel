<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $comments = Comment::all();
        return view('user.comment.index', ['comments' => $comments]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function store(Request $request)
    {
        $comment = new Comment([
            'post_id' => $request->input('id'),
            'author' => Auth::user()->name,
            'content' => $request->input('content'),
        ]);
        $comment->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return Comment::where('post_id', $id)->orderBy('id', 'asc')->get();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $comment = Comment::find($id);
        $content = $comment->content;
        $comment->delete();
        return redirect()->back()->with('danger', $content . ' Successfully Deleted.');
    }

    /**
     * @return RedirectResponse
     */
    public function allDestroy()
    {
        DB::table('comments')->delete();
        return redirect()->back()->with('danger', ' Successfully Delete All Comment .');
    }
}
