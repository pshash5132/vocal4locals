<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\admin\CouponDataTable;
use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $folder = 'coupons';
    public function index(CouponDataTable $dataTable)
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
        //
        $folder = $this->folder;
        $page = $folder . '.create';
        return view('admin.layouts.master', compact('page', 'folder', ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'code' => ['required', 'string', 'max:50'],
            'quantity' => ['required', 'integer'],
            'max_use' => ['required', 'integer'],
            'start_date' => ['required', 'string'],
            'end_date' => ['required', 'string'],
            'discount_type' => ['required', 'string'],
            'discount' => ['required', 'integer'],
            'status' => ['required', 'integer'],
        ]);
        $insert = new Coupon();
        $insert->name = $request->name;
        $insert->code = $request->code;
        $insert->quantity = $request->quantity;
        $insert->max_use = $request->max_use;
        $insert->start_date = $request->start_date;
        $insert->end_date = $request->end_date;
        $insert->discount_type = $request->discount_type;
        $insert->discount = $request->discount;
        $insert->status = $request->status;
        $insert->save();
        toastr('Coupon added successfully!');
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
        $data = Coupon::findOrFail($id);
        $folder = $this->folder;
        $page = $folder . '.edit';
        return view('admin.layouts.master', compact('page', 'folder', 'data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'code' => ['required', 'string', 'max:50'],
            'quantity' => ['required', 'integer'],
            'max_use' => ['required', 'integer'],
            'start_date' => ['required', 'string'],
            'end_date' => ['required', 'string'],
            'discount_type' => ['required', 'string'],
            'discount' => ['required', 'integer'],
            'status' => ['required', 'integer'],
        ]);
        $update = Coupon::findOrFail($id);
        $update->name = $request->name;
        $update->code = $request->code;
        $update->quantity = $request->quantity;
        $update->max_use = $request->max_use;
        $update->start_date = $request->start_date;
        $update->end_date = $request->end_date;
        $update->discount_type = $request->discount_type;
        $update->discount = $request->discount;
        $update->status = $request->status;
        $update->save();
        toastr('Coupon updated successfully!');
        return redirect()->route('admin.' . $this->folder . '.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = Coupon::findOrFail($id);
        $delete->delete();
        return response(['status' => '1', 'message' => 'Deleted Successfully']);
    }
    public function changeStatus(Request $req)
    {
        $inquiry = Coupon::find($req->id);
        $inquiry->status = $req->status == 'true' ? 1 : 0;
        $inquiry->save();
        return ['status' => 1, 'message' => 'Coupon status updated'];
    }
}
