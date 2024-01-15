<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\admin\cabInquiriesDataTable;
use App\DataTables\admin\hotelInquiriesDataTable;
use App\DataTables\admin\ServiceInquiryDataTable;
use App\Http\Controllers\Controller;
use App\Models\CabInquiry;
use App\Models\ServiceInquiry;
use Illuminate\Http\Request;

class InquiryController extends Controller
{
    //
    public function hotel(hotelInquiriesDataTable $dataTable)
    {
        $page = 'inquiries.hotel';
        return $dataTable->render('admin.layouts.master', compact('page'));
    }
    public function cab(cabInquiriesDataTable $dataTable)
    {
        $page = 'inquiries.cab';
        return $dataTable->render('admin.layouts.master', compact('page'));
    }
    public function services(ServiceInquiryDataTable $dataTable)
    {
        $page = 'inquiries.service';
        return $dataTable->render('admin.layouts.master', compact('page'));
    }
    public function serviceStatusChange(Request $req)
    {
        $inquiry = ServiceInquiry::find($req->current_id);
        $inquiry->status = $req->status;
        $inquiry->save();
        return ['status' => 1, 'message' => 'Service Inquiry status updated'];
    }
    public function cabStatusChange(Request $req)
    {
        $inquiry = CabInquiry::find($req->current_id);
        $inquiry->status = $req->status;
        $inquiry->save();
        return ['status' => 1, 'message' => 'Cab Inquiry status updated'];
    }
}