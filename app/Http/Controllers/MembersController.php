<?php

namespace App\Http\Controllers;

use App\Models\members;
use App\Models\states;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Validation\Validator;

class MembersController extends Controller {

    /**
     * Display a listing of the resource.
     */
    public function index() {
        $data['members'] = members::with('state')->get(['id_number', 'first_name', 'middle_name', 'last_name', 'state_id', 'city']);
        return view('members.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        // get a list of states.
        $data['states'] = states::get(["id", "name"]);

        return view('members.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $request->validate([
            'id_number'  => 'required',
            'first_name' => 'required',
            'last_name'  => 'required',
            'state_id'   => 'required|exists:states,id'
        ]);

        $request->merge(['married' => $request->has("married") ? 1 : 0]);

        members::create($request->all());

        return redirect()->route("members.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(members $members) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(members $members) {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, members $members) {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(members $members) {
        //
    }
}
