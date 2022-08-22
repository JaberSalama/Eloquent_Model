<h1>Soft Deletes</h1>

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
        <a href="{{route('posts.restore' , $post->id)}}">Restory</a> <br> 

        <form action="{{route('posts.delete' , $post->id )}}" method="get">
          @csrf

           <button type="submit">Delete</button>
        </form>
      </td>
  </tr>
  
 @endforeach





</table>