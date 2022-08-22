<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\New_;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    //   $posts = Post::get() ; 

    $post = Post::Jaber()->first();
    return $post ; 


    //   return view('posts.index', compact('posts')) ;  
    //   return view('posts.index', ['posts'=>$posts]) ;  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('posts/create') ; 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

        $post = new Post() ; 
        $post->title = $request->title ; 
        $post->body = $request->body ; 
        $post->save();
         


    //    Post::create([

    //     'title'=>$request->title ,
    //     'body'=>$request->body ,

    //    ]);

       return response('تم اضافة البيانات بنجاح ');
    
    //     //   'اسم الحقل في الداتابيز '-> 'اسم التكست في الفورم ' ;

    //     // $request->all() 

    

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
       $posts = Post::onlyTrashed()->get();
       return view('posts.SoftDeletes' , compact('posts'));

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */

    }
        public function edit($id)
    {

        $post = Post::Findorfail($id); 
                  // الطريقة الاولى لجلب البيانات 
        // $post = Post::where('id' , $id)->first() ;  // الطريقة الثانية 
        return view('posts.edit' , compact('post')) ; 
        // if($post){
        //     return $post ; 
        // }
        // else{
        //     return response('خطا لا يوجد سجل في هذا الرقم ')  ; 
        // }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request , $id)
    {
        $post = Post::Findorfail($id) ;
        // $post->title = $request->title ;  // الطريقة الاولى  
        // $post->body = $request->body ; 
        // $post ->save() ; 

        // $post->update([                 // التحديد افضل  الطريقة الثانية 
        //    'title' =>$request->title ,
        //    'body' =>$request->body ,
        // ]);

        $post->update(                   // اختصار الطريقة التانية 
             $request->all()  , 
        ); 

        return redirect('posts') ; 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        // Post::Findorfail($id)->delete(); طريقة اولى 
        Post::destroy($id) ;             // طريقة ثانية 
       return redirect()->route('posts.index'); 
    //    return response('delete Successfully') ; 
    }

    public function restore($id){


        Post::withTrashed()->where('id', $id)->restore();
        return redirect()->back(); 

        // $post = Post::onlyTrashed()->where('id' , $id)->get();
        // $post->restore();
        // return redirect()->back(); 

    }

    public function ForceDelete($id){

        Post::withTrashed()->where('id', $id)->forceDelete();
        return redirect()->back(); 


    }
}
