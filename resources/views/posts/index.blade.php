<h1>Show All Posts </h1>

<table style="margin: 20px ">

<th>id</th>
<th>title </th>
<th>body </th>
<th>pro </th>

 @foreach($posts as $post)
    
 
  <tr>
      <td>{{$post->id}}</td>  
      <td>{{$post->title}}</td>  
      <td>{{$post->body}}</td>  
      <td>{{$post->pro}}</td>  
      <td>
        <a href="{{route('posts.edit' , $post->id)}}">Edit</a> <br> 
        <form action="{{route('posts.destroy' , $post->id )}}" method="post">
          @method('DELETE')
          @csrf

           <button type="submit">SoftDelete</button>
        </form>
      </td>
  </tr>
  
 @endforeach





</table>