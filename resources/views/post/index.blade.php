@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-2xl font-bold mb-6">All Posts</h1>
        <a href="{{route('post.add')}}">
            <button>thêm post</button>
        </a>
        @if($posts->isEmpty())
            <p>No posts available.</p>
        @else
            <table class="min-w-full table-auto">
                <thead>
                <tr>
                    <th class="px-4 py-2">ID</th>
                    <th class="px-4 py-2">Post Name</th>
                    <th class="px-4 py-2">Content</th>
                    <th class="px-4 py-2">Translations</th>
                    <th class="px-4 py-2">Created At</th>
                </tr>
                </thead>
                <tbody>
                @foreach($posts as $post)
                    <tr class="border-t">
                        <td class="px-4 py-2">{{ $post->id }}</td>
                        <td class="px-4 py-2">{{ $post->name }}</td>
                        <td class="px-4 py-2">{{ Str::limit($post->content, 50) }}</td>
                        <td class="px-4 py-2">
                            @foreach($post->translations as $translation)
                                <p><strong>Locale:</strong> {{ $translation->locales->name }} | <strong>Name:</strong> {{ $translation->name }}</p>
                            @endforeach
                        </td>
                        <td class="px-4 py-2">{{ $post->created_at->format('d M Y') }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
