<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\admin\OrderDataTable;
use App\DataTables\admin\MonthlyOrderDataTable;
use App\Http\Controllers\Controller;
use App\Mail\OrderConfirmation;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $folder = 'order';

    public function index(OrderDataTable $dataTable)
    {
        $folder = $this->folder;
        $page = $this->folder . '.index';
        $from_date =  date("Y-m-01");
        $to_date =  date("Y-m-t");
        return $dataTable->render('admin.layouts.master', compact('page', 'folder','from_date','to_date'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order = Order::findOrFail($id);
        $folder = $this->folder;
        $page = $folder . '.show';
        return view('admin.layouts.master', compact('page', 'folder', 'order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
        return response(['status'=>1,'message'=>'order deleted successfully']);
    }

    public function changeOrderStatus(Request $request)
    {
        $order = Order::findOrFail($request->id);
        $order->order_status = $request->status;
        $order->save();

        Mail::to($order->user->email)->send(new OrderConfirmation($order));
        return response(['status'=>1,'message'=>'Order status updated']);
    }
    public function delivered(Request $request)
    {
        $order = Order::findOrFail($request->id);
        $order->order_status = 'delivered';
        $order->save();

        Mail::to($order->user->email)->send(new OrderConfirmation($order));
        return response(['status'=>1,'message'=>'Order status updated']);
    }
    public function changePaymentStatus(Request $request)
    {
        $order = Order::findOrFail($request->id);
        $order->payment_status = $request->status;
        $order->save();
        return response(['status'=>1,'message'=>'Payment status updated']);
    }

    public function monthlyOrderReport(MonthlyOrderDataTable $dataTable){
        $folder = $this->folder;
        $page = $this->folder . '.index';
        $from_date =  date("Y-m-01");
        $to_date =  date("Y-m-t");
        return $dataTable->render('admin.layouts.master', compact('page', 'folder','from_date','to_date'));
    } 
}