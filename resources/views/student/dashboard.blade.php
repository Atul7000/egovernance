@extends('layouts.app')

@section('title', 'Student Dashboard')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card shadow-lg rounded-4 p-2">
                <div class="card-body">
                    <h2 class="text-center text-primary fw-bold mb-3"> Student Dashboard</h2>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="/student/percentage">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Year:</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-calendar3"></i></span>
                                <input type="number" name="year" class="form-control" required placeholder="Enter year">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Standard:</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-mortarboard"></i></span>
                                <input type="text" name="standard" class="form-control" required placeholder="Enter standard">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Percentage:</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-percent"></i></span>
                                <input type="number" step="0.01" name="percentage" class="form-control" required placeholder="Enter percentage">
                            </div>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-success btn-lg fw-semibold">
                                <i class="bi bi-plus-circle"></i> Add Record
                            </button>
                        </div>
                    </form>

                    <h5 class="mt-4 text-center text-secondary fw-bold"> Previous Records</h5>
                    @if($percentages->isEmpty())
                        <p class="text-muted text-center">No records found.</p>
                    @else
                        <ul class="list-group mt-3">
                            @foreach($percentages as $p)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                        <small class="text-muted"><i class="bi bi-calendar-check"></i> Year:</small> <span>{{ $p->year }}</span> |
                                        <small class="text-muted"><i class="bi bi-award"></i> Standard:</small> <span>{{ $p->standard }}</span>
                                    </div>
                                    <span class="badge bg-primary rounded-pill">{{ $p->percentage }}%</span>
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
