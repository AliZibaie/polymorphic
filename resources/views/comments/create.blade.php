<form action="{{route('posts.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="text" name="content" id="">
    <input type="file" name="image" id="">
    <button type="submit">Save</button>
</form>
