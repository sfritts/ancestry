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
<hr />
<div class="row">
    <table class="table" id="members-list">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Location</th>
            </tr>
        </thead>
        <tbody>
            @foreach($members as $member)
            <tr class='member-row' data-url='{{ route('members.show', $member->id) }}'>
                <th scope="row">{{ $member->id_number }}</th>
                <td>{{ $member->first_name }} {{ $member->middle_name }} {{ $member->last_name }}</td>
                <td>{{ $member->city }}, {{ $member->state->name }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script type='text/javascript'>
    
    function addMemberRowsClick(){
        var membersTable = document.getElementById('members-list');
        var membersRows  = membersTable.getElementsByTagName('tr');
        for(var r = 1; r < membersRows.length; r++ ){
            var row = membersTable.rows[r];
            var addClickHandler = function(row){
                return function(){
                    window.location.href = row.dataset.url;
                }
            }
            row.onclick = addClickHandler(row);
        }
    }
    
    window.onload = function(){ addMemberRowsClick() }
    
</script>