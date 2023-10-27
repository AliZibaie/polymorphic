<form action="{{route('comments.update', [$post, $comment])}}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="text" name="content" id="" value="{{$comment->content}}" disabled>
    <input type="file" name="image" id="">
    <img src="{{url($comment->image->url)}}" alt="">
    <button type="submit">Save</button>
</form>
