<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $posts = Post::where('admin', Auth::user()->email)->get();
        return view('user.post.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        return view('user.post.create', ['tags' => Tag::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'status' => 'required',
        ]);
        $post = new Post([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'image' => $this->image($request),
            'status' => $request->input('status'),
            'admin' => Auth::user()->email,
        ]);
        $post->save();
        $like = new Like([
            'post_id' => $post->id
        ]);
        $like->save();
        $post->tags()->attach($request->input('tags'));
        return redirect()->route('post.store')->with('success', 'Post successfully Created,Title is: ' . $request->input('title'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View|Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        $like = Like::where('post_id', $id)->first();
        $comments = (new CommentController)->show($id);
        return view('user.post.show', ['post' => $post, 'like' => $like , 'comments' => $comments]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View|Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('user.post.edit', ['post' => $post, 'tags' => Tag::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse|Response
     * @throws ValidationException
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'status' => 'required',
        ]);
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->status = $request->input('status');
        if ($request->file('image')) {
            $post->image = $this->image($request);
        }
        $post->tags()->detach();
        $post->tags()->attach($request->input('tags'));
        $post->save();
        return redirect()->route('post.index')->with('warning', 'Post Successfully Edited,New Title: ' . $request->input('title'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse|Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $title = $post->title;
        $post->tags()->detach();
        $post->delete();
        return redirect()->back()->with('danger', $title . ' Successfully Deleted.');
    }

    /**
     * @param $request
     * @return string
     */
    private function image($request)
    {
        {
            $year = now()->year;
            $month = now()->month;
            $day = now()->day;

            $dir = "public/postImage/$year/$month/$day";
            $name = $request->file('image')->getClientOriginalName();
            $request->file('image')->storePubliclyAs($dir, $name);

            return "$dir/$name";

        }
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function getLikePost($id)
    {
        $like = Like::where('post_id', $id)->first();
        $like->like += 1;
        $like->save();
        return back();
    }
}
