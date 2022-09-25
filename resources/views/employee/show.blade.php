@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Company</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>{{ $employee->first_name }}</th>
                            <th>{{ $employee->last_name }}</th>
                            <th>{{ $employee->company->name ? $employee->company->name : 'No company' }}</th>
                            <th>
                                <a class="p-1" title="Edit"><i class="text-primary fa-solid fa-file-pen"></i></a>
                                <form action="{{ route('employees.destroy', $employee->id) }}" method="POST"
                                    style="display: inline-block; ">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-link" onclick="return confirm('Are you sure?')" title="Delete"><i
                                            class="text-danger fa-solid fa-trash"></i></button>
                                </form>
                            </th>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
