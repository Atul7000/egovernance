@extends('layouts.app')

@section('title', 'Students List')

@section('content')
<div class="container my-3">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg rounded-4 p-2">
                <div class="card-body">
                    <h3 class="text-center text-primary fw-bold mb-3"> Students List</h3>

                    @if($students->isEmpty())
                        <p class="text-muted text-center">No students found.</p>
                    @else
                        <ul class="list-group">
                            @foreach($students as $s)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <strong>{{ $s->name }}</strong>
                                    <a href="/teacher/student/{{ $s->id }}" class="btn btn-outline-primary btn-sm">
                                        <i class="bi bi-eye"></i> View Details
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
