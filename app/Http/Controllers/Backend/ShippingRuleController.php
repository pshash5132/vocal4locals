<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\admin\ShippingRuleDataTable;
use App\Http\Controllers\Controller;
use App\Models\ShippingRule;
use Illuminate\Http\Request;

class ShippingRuleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $folder = 'shipping-rule';
    public function index(ShippingRuleDataTable $dataTable)
    {
        $folder = $this->folder;
        $page = $this->folder . '.index';
        return $dataTable->render('admin.layouts.master', compact('page', 'folder'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $folder = $this->folder;
        $page = $folder . '.create';
        return view('admin.layouts.master', compact('page', 'folder'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:200'],
            'type' => ['required'],
            'min_cost' => ['nullable', 'integer'],
            'cost' => ['required', 'integer'],
            'status' => ['required'],
            'start_km' => ['required'],
            'end_km' => ['required'],
        ]);
        $insert = new ShippingRule();
        $insert->name = $request->name;
        $insert->type = $request->type;
        $insert->type = $request->type;
        $insert->cost = $request->cost;
        $insert->status = $request->status;
        $insert->start_km = $request->start_km;
        $insert->end_km = $request->end_km;
        $insert->save();
        toastr('created successfully!', 'success', 'success!');
        return redirect()->route('admin.' . $this->folder . '.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = ShippingRule::findOrFail($id);
        $folder = $this->folder;
        $page = $folder . '/edit';
        return view('admin.layouts.master', compact('page', 'data', 'folder'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required', 'max:200'],
            'type' => ['required'],
            'min_cost' => ['nullable', 'integer'],
            'cost' => ['required', 'integer'],
            'status' => ['required'],
            'start_km' => ['required'],
            'end_km' => ['required'],
        ]);
        $update = ShippingRule::findOrFail($id);
        $update->name = $request->name;
        $update->type = $request->type;
        $update->type = $request->type;
        $update->cost = $request->cost;
        $update->status = $request->status;
        $update->start_km = $request->start_km;
        $update->end_km = $request->end_km;
        $update->save();
        toastr('shipping updated successfully!', 'success', 'success!');
        return redirect()->route('admin.' . $this->folder . '.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = ShippingRule::findOrFail($id);
        $data->delete();
        return response(['status' => '1', 'message' => 'Deleted Successfully']);
    }
    public function changeStatus(Request $request)
    {
        $data = ShippingRule::findOrFail($request->id);
        $data->status = $request->status == 'true' ? 1 : 0;
        $data->save();
        return response(['status' => '1', 'message' => 'Status Updated Successfully']);

    }
}