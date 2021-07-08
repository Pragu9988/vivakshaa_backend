<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $blogs = Blog::select();
            return $this->getDatatableOf($blogs, Auth::user());
        }
        return view('blog.index');
    }

    private function getDatatableOf($blogs, $user)
    {
        return DataTables::of($blogs)
        ->addColumn('actions', function ($blog) use ($user) {
            $actions['authorizedToEdit'] = $user->can('update', [Blog::class, $blog]);
            $actions['authorizedToDelete'] = $user->can('delete', [Blog::class, $blog]);
            $actions['edit'] = route('blog.edit', $blog->id);
            $actions['delete'] = route('blog.destroy', $blog->id);
            return $actions;
        })
            ->editColumn('body', function($blog){
                return Str::limit(strip_tags($blog->body), 50);
            })
            ->editColumn('created_at', function($blog){
                return $blog->created_at->diffForHumans();
            })
            ->escapeColumns([])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Blog $blog)
    {
        $inputs = $request->input();
        $file = $this->getImageToUpload($request);
        $inputs['cover_pic'] = $file ? $this->uploadCoverImage($file, $request->title, $blog) : $blog->cover_pic;
        Blog::create($inputs);
        return redirect('/blog')->with(['message' => 'Blog created successfully!', 'alert-type' => 'success']);
    }

    private function uploadCoverImage($file, $title, $blog = null)
    {
        $this->removeImageIfExists($blog);
        if (!is_file($file)) {
            return $file;
        }
        $file_ext = $file->getClientOriginalExtension();
        $title = str_replace(" ", "_", $title);
        $title = strtolower($title);
        $title = $title . date('YmdHis') . '.' . $file_ext;
        $now = Carbon::now();
        $file_path = '/uploads/blog/';
        $file->move('.' . $file_path, $title);

        return $title;
    }

    private function removeImageIfExists($blog)
    {
        if ($blog) {
            $file_path = base_path() . '/public' . $blog->cover_pic;
            if (File::exists($file_path) && $blog->cover_pic != null) {
                unlink($file_path);
            }
        }
    }

    private function getImageToUpload($request)
    {
        if ($request->cover_pic) {
            return $request->cover_pic;
        } else {
            return null;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $blog= Blog::where('slug', $slug)->first();
        return view('home.blog-detail')->with('blog', $blog);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        return view('blog.create')->with('blog', $blog);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        $inputs = $request->input();
        $file = $this->getImageToUpload($request);
        $inputs['cover_pic'] = $file ? $this->uploadCoverImage($file, $request->title, $blog) : $blog->cover_pic;
        $blog->update($inputs);
        return redirect('/blog')->with(['message' => 'Blog updated successfully!', 'alert-type' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $question->delete();
        return back()->with(['message' => 'Blog deleted successfully!', 'alert-type' => 'success']);
    }

    public function blogIndex() {
        $blogs = Blog::orderBy('id', 'desc')->paginate(5);
        return view ('home.blog', ['blogs' => $blogs]);
    }
}
