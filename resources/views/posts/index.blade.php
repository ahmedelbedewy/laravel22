@extends('layouts.app')

@section('title') Index @endsection

@section('content')
<div class="container mt-4">
    <div class="text-center mb-4">
        <a href="{{ route('posts.create') }}" class="btn btn-info btn-animated">Create Post</a>
    </div>
    <table class="table mt-4">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Posted By</th>
                <th scope="col">Created At</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
            <tr class="table-row">
                <td>{{ $post->id }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->user ? $post->user->name : 'Not found' }}</td>
                <td>{{ $post->created_at->format('F d, Y') }}</td>
                <td>
                    <a href="{{ route('posts.show', $post->id) }}" class="btn btn-info btn-animated">View</a>
                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-info btn-animated">Edit</a>
                    <form style="display: inline" method="POST" action="{{ route('posts.destroy', $post->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-info btn-animated">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="footer-note">
    DEVELOPED BY BEDEWY
</div>

<style>
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .fade-in {
        animation: fadeIn 1s ease-out;
    }

    .table-row {
        opacity: 0;
        animation: fadeIn 0.5s ease-out forwards;
    }

    .table-row:nth-child(odd) {
        animation-delay: 0.2s;
    }

    .table-row:nth-child(even) {
        animation-delay: 0.4s;
    }

    .btn-info {
        animation: bounce 2s infinite;
        transition: transform 0.3s ease;
    }

    .btn-info:hover {
        transform: scale(1.05);
    }

    @keyframes bounce {
        0%, 20%, 50%, 80%, 100% {
            transform: translateY(0);
        }
        40% {
            transform: translateY(-30px);
        }
        60% {
            transform: translateY(-15px);
        }
    }

    .footer-note {
        position: fixed;
        top: 10px;
        right: 10px;
        font-size: 0.8rem;
        color: #000000;
        font-family: 'Times New Roman', Times, serif;
        animation: fadeIn 2s ease-out;
    }
</style>
@endsection
