@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Telephone</th>
                            <th scope="col">Employees</th>
                            <th scope="col">Logo</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($companies as $row)
                            <tr>
                                <th scope="row">{{ $row->id }}</th>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->email }}</td>
                                <td>{{ $row->telephone }}</td>
                                <td>
                                    @if($row->employees)
                                    {{count($row->employees)}} employee(s)
                                    <ul>
                                    @foreach ($row->employees as $employeeRow)
                                        <li>{{$employeeRow->first_name}} {{$employeeRow->last_name}}</li>
                                    @endforeach
                                    </ul>
                                    @else

                                    @endif
                                </td>
                                <td><img class="img-max" src="{{ $row->logo }}"></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {!! $companies->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
