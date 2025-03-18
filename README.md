./vendor/bin/sail composer require laravel/breeze --dev

./vendor/bin/sail artisan breeze:install

./vendor/bin/sail npm install
./vendor/bin/sail npm run dev

./vendor/bin/sail artisan migrate

./vendor/bin/sail artisan route:list


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    });
});


@auth
    <p>Benvenuto, {{ Auth::user()->name }}</p>
@endauth

if (Auth::check()) {
    // L'utente è loggato
}



<!-- resources/views/posts/index.blade.php -->

<h1>All Posts</h1>
<a href="{{ route('posts.create') }}">Create New Post</a>

<ul>
    @foreach ($posts as $post)
        <li>
            <a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a>
            <a href="{{ route('posts.edit', $post->id) }}">Edit</a>
            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </li>
    @endforeach
</ul>


<!-- resources/views/posts/create.blade.php -->

<h1>Create New Post</h1>

<form action="{{ route('posts.store') }}" method="POST">
    @csrf
    <div>
        <label for="title">Title</label>
        <input type="text" name="title" id="title" required>
    </div>
    <div>
        <label for="content">Content</label>
        <textarea name="content" id="content"></textarea>
    </div>
    <button type="submit">Create Post</button>
</form>


<!-- resources/views/posts/edit.blade.php -->

<h1>Edit Post</h1>

<form action="{{ route('posts.update', $post->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div>
        <label for="title">Title</label>
        <input type="text" name="title" id="title" value="{{ $post->title }}" required>
    </div>
    <div>
        <label for="content">Content</label>
        <textarea name="content" id="content">{{ $post->content }}</textarea>
    </div>
    <button type="submit">Update Post</button>
</form>
