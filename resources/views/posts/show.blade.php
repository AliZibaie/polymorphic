{{$post}}
<form action="{{route('comments.store', $post)}}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="text" name="content" id="">
    <input type="file" name="image" id="">
    <input type="text" name="comment_id" id="">
    <button type="submit">Save</button>
</form>
