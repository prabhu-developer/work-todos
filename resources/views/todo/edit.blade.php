@extends('layouts.app')

@section('content')
    <form action="{{ route('todo.update',$todo->id) }}" class="col-md-6 mx-auto" method="POST">
        @method('PUT')
        @csrf
        <div class="mb-3">
            <label for="title" class="mb-3">
                Todo Title
            </label>
            <input type="text" name="title" value="{{ $todo->title }}" class="form-control form-control-lg bg-pastel-darkblue" autofocus maxlength="350" placeholder="Type here..">
            @error('title')
                <div>
                    <strong class="text-danger">{{ $message }}</strong>
                </div>
            @enderror
        </div>
        <input type="submit" class="btn btn-primary btn-lg" value="UPDATE">
    </form>
@endsection