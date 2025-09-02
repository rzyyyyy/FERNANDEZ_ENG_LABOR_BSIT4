// resources/views/posts/index.blade.php
<h2>Posts</h2>
<a href="{{ route('posts.create') }}">Add Post</a>
<ul>
@foreach($posts as $post)
    <li>{{ $post->title }} 
        <a href="{{ route('posts.edit', $post) }}">Edit</a>
        <form action="{{ route('posts.destroy', $post) }}" method="POST">
            @csrf @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    </li>
@endforeach
</ul>

// resources/views/posts/create.blade.php
<form method="POST" action="{{ route('posts.store') }}">
    @csrf
    <input type="text" name="title" placeholder="Title">
    <textarea name="content" placeholder="Content"></textarea>
    <button type="submit">Save</button>
</form>

// resources/views/posts/edit.blade.php
<form method="POST" action="{{ route('posts.update', $post) }}">
    @csrf @method('PUT')
    <input type="text" name="title" value="{{ $post->title }}">
    <textarea name="content">{{ $post->content }}</textarea>
    <button type="submit">Update</button>
</form>
