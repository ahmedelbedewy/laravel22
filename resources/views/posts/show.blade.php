@extends('layouts.app')

@section('title') Show @endsection

@section('content')
<div class="container mt-4">
    <!-- Post Info Card -->
    <div class="card shadow-lg mb-4" style="border-radius: 10px;">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Post Info</h5>
        </div>
        <div class="card-body">
            <h5 class="card-title">Title: {{ $post->title }}</h5>
            <p class="card-text">Description: {{ $post->this_decs }}</p>
        </div>
    </div>

    <!-- Post Creator Info Card -->
    <div class="card shadow-lg" style="border-radius: 10px;">
        <div class="card-header bg-secondary text-white">
            <h5 class="mb-0">Post Creator Info</h5>
        </div>
        <div class="card-body">
            <h5 class="card-title">Name: {{ $post->user ? $post->user->name : 'Not found' }}</h5>
            <p class="card-text">Email: {{ $post->user ? $post->user->email : 'Not available' }}</p>
            <p class="card-text">Created At: {{ $post->user ? $post->user->created_at->format('F d, Y') : 'Not available' }}</p>
        </div>
    </div>
</div>

<div style="position: fixed; top: 10px; right: 10px; font-size: 0.8rem; color: #000000; font-family: 'Times New Roman', Times, serif; animation: fadeIn 2s;">
    DEVELOPED BY BEDEWY
</div>
@endsection

<style>
  /* Fade-in effect for cards */
  @keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
  }

  .card {
    animation: fadeIn 1s ease-out;
  }

  /* Card hover effect */
  .card:hover {
    transform: scale(1.02);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }

  /* Card header background colors */
  .card-header.bg-primary {
    background-color: #007bff;
  }

  .card-header.bg-secondary {
    background-color: #6c757d;
  }
</style>
