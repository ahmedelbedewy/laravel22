<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\View\View;
use PhpParser\Node\Expr\FuncCall;
use PHPUnit\Framework\MockObject\Rule\Parameters;

class PostController extends Controller
{
    //////////////////
    public function index(): View
    {
        $postsFromDB=Post::all();


        return view('posts.index', ['posts' => $postsFromDB]);
    }
    /////////////////////////////////////

    public function show(POST $post){


return view('posts.show', ['post' => $post]);


    }
    //////////////////////////
    public function create(){

$users=User::all();


return view('posts.create', ['users'=>$users]);
    }
    public function store(Request $request) {
        $data = $request->all();
        $title = $request->input('title');
        $description = $request->input('description');
        $postCreator = $request->input('post_creator');

        Post::create([
            'title' => $title,
            'description' => $description,
            'xyz' => 'some value', //ignore,
            'user_id' => $postCreator,
        ]);

        return to_route('posts.index');
    }
    /////////////////////////////
    public function edit(Post $post){

        $users=User::all();


        return view('posts.edit', ['users'=>$users,'post'=>$post]);

    }
    public function update(Request $request, $postId){
        $title = $request->input('title');
        $description = $request->input('description');
        $postCreator = $request->input('post_creator');

$singlePostFromeDB=Post::find($postId);
$singlePostFromeDB->update([
    'title'=>$title,
    'description'=>$description,
    'user_id'=>$postCreator

]);
return to_route('posts.show',$postId);

    }////////////////////////////

    /////////////////////////
public function destroy($postId){
$post=Post::find($postId);
$post->delete();
    return to_route('posts.index');
}
}


