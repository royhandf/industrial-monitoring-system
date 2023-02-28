<?php

namespace App\Http\Controllers;

use App\Models\Machine;
use Illuminate\Http\Request;

class MachineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate([
            'machine_name'  =>  ['required', 'string'],
            'parent_id'     =>  ['required']
        ]);

        $machine = Machine::create([
            'machine_name'  =>  $request->get('machine_name'),
            'parent_id'     =>  $request->get('parent_id')
        ]);
    }
    
    /**
     * Display the specified resource.
     */
    public function show(Machine $machine)
    {
        //
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Machine $machine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Machine $machine)
    {
        $this->validate([
            'machine_name'  =>  ['required', 'string'],
            'parent_id'     =>  ['required']
        ]);
    
        $machine->update([
            'machine_name'  =>  $request->get('machine_name'),
            'parent_id'     =>  $request->get('parent_id')
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Machine $machine)
    {
        $machine->delete();
    }
}
