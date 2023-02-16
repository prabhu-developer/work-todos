@extends('layouts.app')

@section('content')
    <div class="text-end">
        <a href="{{ route('todo.create') }}" class="btn btn-primary mb-3"> 
            <i class="bi bi-plus me-1"></i> 
            {{ __('app.new_todo') }} 
        </a>
    </div>
    <div class="row g-3">
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <b class="text-primary">
                        {{ __('app.total_todo') }}
                    </b>
                </div>
                <div class="card-footer">
                    <div class="h3 fw-bold">35</div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <b class="text-primary">
                        {{ __('app.completed_todo') }}
                    </b>
                </div>
                <div class="card-footer">
                    <div class="h3 fw-bold">35</div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <b class="text-primary">
                        {{ __('app.pending_todo') }}
                    </b>
                </div>
                <div class="card-footer">
                    <div class="h3 fw-bold">35</div>
                </div>
            </div>
        </div>
    </div>
@endsection
