<h1> Edit Post</h1>

<form action="{{route('posts.update' , $post->id)}}" method="post">

@method('PATCH')
@csrf 
 <input type="text" name="title" value="{{$post->title}}"><br> <br> 
 <input type="text" name="body" value="{{$post->body}}"><br> <br> 
 <button type="submit">Update</button> <br> <br>

</form>