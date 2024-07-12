@extends('layouts.app')

@section('title') Create @endsection

@section('content')
<div class="container mt-4">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">Create New Post</div>
        <div class="card-body">
          <form method="POST" action="{{ route('posts.store') }}" class="form-container">
            @csrf
            <div class="mb-3">
              <label for="title" class="form-label">Title</label>
              <input id="title" name="title" type="text" class="form-control" placeholder="Enter the title" required>
            </div>
            <div class="mb-3">
              <label for="description" class="form-label">Description</label>
              <input id="description" name="description" type="text" class="form-control" placeholder="Enter the description" required>
            </div>
            <div class="mb-3">
              <label for="post_creator" class="form-label">Post Creator</label>
              <select id="post_creator" name="post_creator" class="form-control" required>
                @foreach ($users as $user)
                  <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
              </select>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
<div style="position: fixed; top: 10px; right: 10px; font-size: 0.8rem; color: #000000; font-family: 'Times New Roman', Times, serif; animation: fadeIn 2s;">
    DEVELOPED BY BEDEWY
</div>

<style>
  /* Fade-in effect for the form container */
  @keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
  }

  .form-container {
    animation: fadeIn 1s ease-out;
  }

  /* Card styling */
  .card {
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  }

  .card-header {
    font-size: 1.25rem;
    font-weight: bold;
  }

  /* Input focus styling */
  .form-control:focus {
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    border-color: #007bff;
    transition: box-shadow 0.3s ease, border-color 0.3s ease;
  }

  /* Button hover effect */
  .btn-success {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }

  .btn-success:hover {
    transform: scale(1.05);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
  }

  /* Placeholder styling */
  .form-control::placeholder {
    color: #6c757d;
    opacity: 1;
  }
</style>
