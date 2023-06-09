<?php

namespace App\Http\Controllers;

use App\Models\Machine;
use App\Models\PartMachine;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PartMachineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $partmachines = PartMachine::orderBy('created_at', 'desc')->get();

        // return view to index with data from partmachines
        return view(
            'pages.admin.part_machines.index',
            compact('partmachines'),
            ['title' => 'Part Machine']
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $machines = Machine::get();

        // return view create form with data from machines
        return view(
            'pages.admin.part_machines.create',
            compact('machines'),
            ['title' => 'Add Part Machine']
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (is_null($request->get('machine_id'))) {
            return back()->with('error', 'Data tidak lengkap');
        }

        $this->validate($request, [
            'part_name'             =>  ['required', 'string'],
            'standard_hourmeter'    =>  ['required', 'Integer'],
            'machine_id'            =>  ['required']
        ]);

        $partMachine = PartMachine::create([
            'part_name'             =>  $request->get('part_name'),
            'standard_hourmeter'    =>  $request->get('standard_hourmeter'),
            'machine_id'            =>  $request->get('machine_id')
        ]);

        if ($partMachine) {
            // redirect to index and bring message success
            Alert::success('Berhasil', 'Berhasil menambahkan data');

            return redirect()->route('partmachines.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PartMachine $partmachine)
    {
        $machines = Machine::get();

        // return view to edit with data from hourmeter, and departments
        return view(
            'pages.admin.part_machines.edit',
            compact('partmachine', 'machines'),
            ['title' => 'Edit Part Machine']
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PartMachine $partmachine)
    {
        $this->validate($request, [
            'part_name'             =>  ['required', 'string'],
            'standard_hourmeter'    =>  ['required', 'Integer'],
            'machine_id'            =>  ['required']
        ]);

        $partmachine->update([
            'part_name'             =>  $request->get('part_name'),
            'standard_hourmeter'    =>  $request->get('standard_hourmeter'),
            'machine_id'            =>  $request->get('machine_id')
        ]);

        if ($partmachine) {
            // redirect to index and bring message success
            Alert::success('Berhasil', 'Berhasil mengubah data');

            return redirect()->route('partmachines.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PartMachine $partmachine)
    {
        $partmachine->delete();

        // redirect to index and bring message success
        return redirect()->route('partmachines.index')
            ->with('success', 'Berhasil menghapus data');
    }
}
