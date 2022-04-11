<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Models\Slider;
use App\Models\User;
use App\Models\Comment;
use App\Models\Mainmenu;
use App\Models\Info;
use App\Models\RunningText;

class PortalController extends Controller
{
    public function index()
    {
        $data['sliders']        = Slider::where('status', 1)->get();
        $data['posts']          = Post::where('status', 1)->get();
        $data['latestposts']    = Post::where('status', 1)->limit(5)->get();
        $data['headline']       = Post::where('status', 1)->where('is_headline', 1)->get();
        $data['user']           = User::first();
        $data['category']       = Category::get();
        $data['runningtext']    = RunningText::where('status',1)->get();
        return view('portal.index', compact('data'));
    }

    public function about()
    {
        $data['posts']          = Post::where('status', 1)->get();
        $data['latestposts']    = Post::where('status', 1)->limit(5)->get();
        $data['category']       = Category::get();
        $data['user']           = User::first();
        return view('portal.about', compact('data'));
    }

    public function contact()
    {
        $data['posts']          = Post::where('status', 1)->get();
        $data['latestposts']    = Post::where('status', 1)->limit(5)->get();
        $data['category']       = Category::get();
        $data['user']           = User::first();
        return view('portal.contact', compact('data'));
    }

    public function post()
    {
        $data['posts']          = Post::where('status', 1)->get();
        $data['latestposts']    = Post::where('status', 1)->limit(5)->get();
        $data['category']       = Category::get();
        $data['user']           = User::first();

        return view('portal.post', compact('data'));
    }

    public function postDetail($id)
    {
        $data['posts']          = Post::where('status', 1)->get();
        $data['latestposts']    = Post::where('status', 1)->limit(5)->get();
        $data['category']       = Category::get();
        $data['comment']        = Comment::where('posts_id', $id)->get();
        $data['user']           = User::first();
        $posts                  = Post::find($id);

        return view('portal.post-detail', compact('posts', 'data'));
    }

    public function menu($id)
    {
        $data['posts']          = Post::where('status', 1)->get();
        $data['latestposts']    = Post::where('status', 1)->limit(5)->get();
        $data['category']       = Category::get();
        $data['user']           = User::first();
        $data['menu']           = Mainmenu::find($id);

        return view('portal.menu', compact('data'));
    }

    public function category($id)
    {
        $data['posts']          = Post::where('status', 1)->where('categories_id',$id)->get();
        $data['latestposts']    = Post::where('status', 1)->limit(5)->get();
        $data['category']       = Category::get();
        $data['user']           = User::first();

        return view('portal.category', compact('data'));
    }

    public function search(Request $request)
    {
        $data['posts']          = Post::where('status', 1)
                                        ->where('title', 'LIKE', '%'.$request->search.'%')
                                        ->orWhere('content', 'LIKE', '%'.$request->search.'%')
                                        ->get();
        $data['latestposts']    = Post::where('status', 1)->limit(5)->get();
        $data['category']       = Category::get();
        $data['user']           = User::first();

        return view('portal.search', compact('data'));
    }

    public function info()
    {
        $data['infos']          = Info::where('status', 1)->get();
        $data['latestinfos']    = Info::where('status', 1)->limit(5)->get();
        $data['user']           = User::first();
        $data['category']       = Category::get();
        $data['latestposts']    = Post::where('status', 1)->limit(5)->get();
   
        return view('portal.info', compact('data'));
    }

    public function infoDetail($id)
    {
        $data['posts']          = Post::where('status', 1)->get();
        $data['latestposts']    = Post::where('status', 1)->limit(5)->get();
        $data['category']       = Category::get();
        $data['comment']        = Comment::where('posts_id', $id)->get();
        $data['user']           = User::first();
        $infos                  = Info::find($id);

        return view('portal.info-detail', compact('infos', 'data'));
    }
}
