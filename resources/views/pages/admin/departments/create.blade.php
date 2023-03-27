@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="container-fluid p-0">
            <div class="card mb-3">
                <div class="card-header mt-3">
                    <h3 class="m-0">Create a new department</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('departments.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="department_name" class="form-label">Department Name</label>
                            <input type="text" class="form-control @error('department_name') is_invalid @enderror"
                                id="department_name" name="department_name" value="{{ old('department_name') }}" autofocus
                                required>
                            @error('department_name')
                                <div class="">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="pt-2 mb-3 d-flex justify-content-end gap-2">
                            <button type="submit" class="btn btn-primary" onclick="handleCreate()">Save</button>
                            <a href="{{ route('departments.index') }}" class="btn btn-danger">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection