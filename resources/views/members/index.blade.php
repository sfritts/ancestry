@extends('members.layout')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Frederick Fritts and His Decendants</h2>
        </div>
        <hr />
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('members.create') }}"> Add a Family Member</a>
        </div>
    </div>
</div>


