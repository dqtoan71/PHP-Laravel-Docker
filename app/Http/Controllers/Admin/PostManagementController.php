<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class PostManagementController extends AdminController
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $posts = Post::orderBy('id', 'DESC')->paginate(config('admin.perPage'));

        return view('admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $post = new Post();

        return view('admin.post.create', compact('post'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request): RedirectResponse
    {
        $request->validated();

        Post::create(array_merge($request->all(), ['created_by' => auth()->user()->id, 'updated_by' => auth()->user()->id]));

        $notification = [
            'msg' => 'Post created successfully',
            'status' => 1,
        ];

        return Redirect::route('post-management.index')
            ->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $post = Post::find($id);

        return view('admin.post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $post = Post::find($id);

        return view('admin.post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, $id): RedirectResponse
    {
        $request->validated();

        $post = Post::find($id);

        $post->update(array_merge($request->all(), ['updated_by' => auth()->user()->id]));


        $notification = [
            'msg' => 'Post updated successfully',
            'status' => 1,
        ];

        return Redirect::route('post-management.index')
            ->with($notification);
    }

    public function destroy($id): RedirectResponse
    {
        Post::find($id)->delete();



        $notification = [
            'msg' => 'Post deleted successfully',
            'status' => 1,
        ];

        return Redirect::route('post-management.index')
            ->with($notification);
    }
}
