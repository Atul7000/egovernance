@extends('layouts.app')

@section('title', 'Student Details')

@section('content')
<div class="container my-3">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg rounded-4 p-2">
                <div class="card-body">
                    <h3 class="text-center text-primary fw-bold mb-3"> {{ $student->name }}'s Details</h3>

                    <h5 class="text-secondary fw-semibold text-center"> Academic Records</h5>

                    @if($percentages->isEmpty())
                        <p class="text-muted text-center">No records found.</p>
                    @else
                        <table class="table table-bordered mt-3">
                            <thead class="table-primary text-center">
                                <tr>
                                    <th>Year</th>
                                    <th>Standard</th>
                                    <th>Percentage</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($percentages as $p)
                                    <tr class="text-center">
                                        <td>{{ $p->year }}</td>
                                        <td>{{ $p->standard }}</td>
                                        <td><span class="badge bg-success">{{ $p->percentage }}%</span></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif

                    <div class="text-center mt-4">
                        <a href="{{ url()->previous() }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i> Back
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
