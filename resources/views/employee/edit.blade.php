@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Edit {{ $employee->first_name }} {{ $employee->last_name }}</div>
                    <div class="card-body">
                        @if($errors->any())
                        {!! implode('', $errors->all('<div class="text-danger">:message</div>')) !!}
                        @endif
                        <form method="POST" action="{{route('employees.update', [$employee])}}">
                            <input name="_method" type="hidden" value="PUT">
                            @csrf
                            <div class="form-group">
                                <label for="first_name">First name</label>
                                <input type="text" class="form-control" placeholder="First Name" name="first_name"
                                    value="{{ old('first_name', $employee->first_name) }}" required>
                            </div>
                            <div class="form-group">
                                <label for="last_name">Last name</label>
                                <input type="tetxt" class="form-control" placeholder="Last Name" name="last_name"
                                    value="{{ old('last_name', $employee->last_name) }}" required>
                            </div>
                            <div class="form-group">
                                <label for="company">Company</label>
                                <select class="form-control" name="company_id">
                                    @foreach ($companies as $company)
                                        <option value="{{ $company->id }}"
                                            {{ $company->id == $employee->company_id ? 'selected' : '' }}>
                                            {{ $company->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="mt-3 btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
