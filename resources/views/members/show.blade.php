@extends('members.layout')

@section('content')

<div class="row">
    <div class="pull-left">
        <h2>View/Edit Family Member</h2>
    </div>

    <div class="pull-right">
        <a class="btn btn-primary" href="{{ route('members.index') }}"> Back</a>
    </div>
</div>
<hr />
<div class="row">
    <div class="col-lg-12">
        @if ($errors->any())
        <div class="alert alert-danger">
            <div>You forgot some required information.</div>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
</div>
<form action="{{ route('members.update', $member->id) }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-lg-2 margin-tb">
            <div class="mb-3">
                <label for="id_number" class="form-label">ID Number</label>
                <input type="text" class="form-control" id="id_number" name="id_number" value="{{ $member->id_number }}" required />
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-2 margin-tb">
            <div class="mb-3">
                <label for="first_name" class="form-label">First Name</label>
                <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $member->first_name }}" required/>
            </div>
        </div>
        <div class="col-lg-2 margin-tb">
            <div class="mb-3">
                <label for="first_name" class="form-label">Middle Name</label>
                <input type="text" class="form-control" id="middle_name" name="middle_name" value="{{ $member->middle_name }}" />
            </div>
        </div>
        <div class="col-lg-2 margin-tb">
            <div class="mb-3">
                <label for="last_name" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $member->last_name }}" required/>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-2">
            <div class="mb-3">
                <label for="spouse" class="form-label">Born</label>
                <input type="text" class="form-control" id="born" name="born" placeholder="Enter what is Known" value="{{ $member->born }}"/>
            </div>
        </div>
        <div class="col-lg-2">
            <div class="mb-3">
                <label for="spouse" class="form-label">Died</label>
                <input type="text" class="form-control" id="died" name="died" value="{{ $member->died }}"/>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-2">
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="married" name="married" {{ $member->married==1 ? 'checked' : '' }}>
                <label class="form-check-label" for="married" > Married</label>
            </div>
            <div class="mb-3">
                <label for="spouse" class="form-label">Spouse Name</label>
                <input type="text" class="form-control" id="spouse" name="spouse" value="{{ $member->spouse }}" />
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-2 margin-tb">
            <label for="state" class="form-label">State of Residence</label>
            <select class="form-select" aria-label="State" id="state_id" name="state_id" required>
                <option selected>Select a State</option>
                @foreach ($states as $state)
                <option value="{{ $state->id }}" {{ $member->state_id == $state->id ? 'selected="selected"' : '' }}>{{ $state->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-lg-2 margin-tb">
            <div class="mb-3">
                <label for="city" class="form-label">City</label>
                <input type="text" class="form-control" id="city" name="city" value="{{ $member->city }}" />
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-4 col-sm-4 col-md-4">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </div>
</form>
