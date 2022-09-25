@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                @if (\Session::has('success'))
                    <div class="alert alert-success">
                        {!! \Session::get('success') !!}
                    </div>
                @endif
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Company</th>
                            <th scope="col">
                                Action
                                <a href="{{ route('employees.create') }}" class="p-3">
                                    <i class="text-success fa-solid fa-plus"></i>
                                </a>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employees as $employee)
                            <tr>
                                <th>{{ $employee->id }}</th>
                                <th>{{ $employee->first_name }}</th>
                                <th>{{ $employee->last_name }}</th>
                                <th>{{ $employee->company->name ? $employee->company->name : 'No company' }}</th>
                                <th>
                                    <a href="{{ route('employees.show', $employee->id) }}" class="p-3" title="View"><i
                                            class="text-secondary fa-solid fa-file"></i></a>
                                    <a href="{{ route('employees.edit', $employee->id) }}" class="p-1" title="Edit"><i class="text-primary fa-solid fa-file-pen"></i></a>
                                    <form action="{{ route('employees.destroy', $employee->id) }}" method="POST"
                                        style="display: inline-block; ">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-link" onclick="return confirm('Are you sure?')" title="Delete">
                                            <i class="text-danger fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {!! $employees->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
