<?php

namespace App\Http\Controllers;

use App\Events\PostViewEvent;
use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\Session\Store;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    public function index()
    {
//        echo asset('/storage/61ffdab05e30b.jpg');
        $posts = Post::with('user')->get();
//        dd($posts);
        return view('posts.index', compact(['posts']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        $post = new Post();
        if ($request->hasFile('files')) {
            $file = $request->file('files');
            $file->store('files /images');
//            echo Storage::disk('public')->get('images/xGzOSOCu07Do1NnMHkgTo4c2JGLSVzmTl2SnVt5I.jpg');
//            $files=$request->files('files');
//            $extention = $request->files->extension();
//            $ranom=uniqid(2);
//            $name=$ranom.'.'.$extention;
//            $input['path']=$name;
//            $post->path=$name;
//            $files->move('images' , $name);
        }

//        $request->validate([
//            'title'=>['required' , 'unique:posts'] ,
//            'description'=>['required'] ,
//        ]);
//        $validated = $request->validated();

        // Retrieve a portion of the validated input data...
//        $validated = $request->safe()->only(['title', 'description']);
//        $validated = $request->safe()->except(['name', 'email']);


//        $post->title=$request->title;
//        $post->content=$request->description;
//        $post->user_id=1;
//        $post->save();
//        return redirect('posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        event(new PostViewEvent($post));
        return view('posts.show', compact(['post']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $user=Auth::user();
        return view('posts.edit', compact(['post']));
//        if ($user->can('update',$post)){
//            return view('posts.edit', compact(['post']));
//        }
//        else{
//            return "شما اجازه ویرایش این پست را ندارید!";
//        }
//        if (Gate::allows('edit-post',$post)) {
//            return view('posts.edit', compact(['post']));
//        }
//        else{
//            return "شما اجازه ویرایش این پست را ندارید!";
//        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->title = $request->title;
        $post->content = $request->description;
        $post->save();
        return redirect('/posts');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect('/posts');
    }
//    public function updateForm($id , $name){
//        return view('user.update',compact(['id' , 'name']));
//    }
//
//    public function showAllUser()
//    {
//        $users=['ali' , 'mahmod' , 'hassan'];
//        return view('user.list',compact('users'));
//    }
//
//    public function inserTest()
//    {
//        DB::insert('insert into test(name , lastname , email) values (? , ? , ?)' , ['arash','hamidzadeh' , 'a@gmail.com']);
//    }
//    public function selectTest()
//    {
//        $result=DB::select('select * from test');
//        return $result;
//    }
//    public function updateTest()
//    {
//        DB::update('update test set email="arash@gmail.com" where id=?' , [1]);
//    }
//    public function deleteTest()
//    {
//        DB::delete('delete from test where id=3');
//    }
//
//    public function test()
//    {
//         return Test::where('name','arash')->orderBy('id','desc')->take(1)->get();
//    }
//
//    public function postAdd()
//    {
////        $post=new Post();
////        $post->title="پست شماره یک";
////        $post->content="محتوای پست شماره یک";
////        $post->save();
//        Post::create(['title'=>'پست شماره 3' , 'content'=>'محتوای پست شماره 3']);
//    }
//
//    public function updatePost($id)
//    {
////        $post=Post::findOrFail($id);
////        $post->title="ویرایش پست شماره 2";
////        $post->content="محتوای ویرایش شده پست شماره 2";
////        $post->save();
//        Post::where('id',$id)->update(['title'=>'پست شماره دو' , 'content'=>'محتوای پست شماره دو']);
//    }
//
//    public function workWithTrash()
//    {
////        $post=Post::where('id',1)->first();
////        $post->delete();
//        Post::destroy(1);
//    }
//
//    public function restorePost()
//    {
//        Post::onlyTrashed()->where('id',1)->restore();
//    }
//
//    public function forceDeletePost()
//    {
//        Post::onlyTrashed()->where('id',1)->forceDelete();
//    }
//
//    public function selectPost()
//    {
//        return Post::all();
//    }
//    public function viewFormPost()
//    {
//        return view('post.add');
//    }

//    public function addPost()
//    {
//
////        $data=$_GET['frm'];
//
//        print_r($_GET);
////        Post::create(['title'=>$_POST['title'],'content'=>$_POST['content']]);
//    }
//
//    public function listAllPost()
//    {
//        $posts=Post::all();
//        return view('post.list',compact('posts'));
//    }
}













