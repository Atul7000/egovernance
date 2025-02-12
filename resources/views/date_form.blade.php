@extends('layouts.app')

@section('title', 'Year Calculator')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card shadow-lg rounded-4 p-2">
                <div class="card-body">
                    <h4 class="text-center text-primary fw-bold mb-2"> Year Calculator</h4>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                    <form method="POST" action="/calculate-years">
                        @csrf

                        <div class="mb-3">
                            <label for="start_date" class="form-label fw-semibold"> Start Date:</label>
                            <input type="date" id="start_date" name="start_date" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="end_date" class="form-label fw-semibold"> End Date:</label>
                            <input type="date" id="end_date" name="end_date" class="form-control" required>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-calculator"></i> Calculate
                            </button>
                        </div>
                    </form>

                    @if(isset($years))
                        <div class="mt-4">
                            <h6 class="text-secondary fw-bold text-center"> Year Wise Breakdown</h6>
                            <ul class="list-group mt-3">
                                @foreach($years as $year)
                                    <li class="list-group-item text-center fw-semibold">{{ $year }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

