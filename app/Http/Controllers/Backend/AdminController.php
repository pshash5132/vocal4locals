<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Vendor;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //

    public function dashboard()
    {
        $user = Auth::user();

        $page = 'dashboard';
        
        $users = User::where(['role'=>'user','status'=>'active'])->count();
        $vendors = Vendor::when(Auth::user()->role == 'vendor', function ($query) {
            return $query->where('id', Auth::user()->vendor->id);
       })->count();
        $orders = Order::when(Auth::user()->role == 'vendor', function ($query) {
            return $query->byVendor(Auth::user()->vendor);
       })->count();
        
        $todayAmountSum = Order::whereDate('created_at', Carbon::today())->where('payment_status',1)->when(Auth::user()->role == 'vendor', function ($query) {
             return $query->byVendor(Auth::user()->vendor);
        })->sum('amount');

        $todayOrder = Order::whereDate('created_at', Carbon::today())->where('payment_status',1)->when(Auth::user()->role == 'vendor', function ($query) {
             return $query->byVendor(Auth::user()->vendor);
        })->count();
        $thisWeekOrders = Order::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->when(Auth::user()->role == 'vendor', function ($query) {
             return $query->byVendor(Auth::user()->vendor);
        })->where('payment_status',1)->sum('amount');
        $thisWeekOrdersCount = Order::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->when(Auth::user()->role == 'vendor', function ($query) {
             return $query->byVendor(Auth::user()->vendor);
        })->where('payment_status',1)->count();
        $thisMonthOrders = Order::whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->when(Auth::user()->role == 'vendor', function ($query) {
             return $query->byVendor(Auth::user()->vendor);
        })->where('payment_status',1)->sum('amount');
        $thisMonthOrdersCount = Order::whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->when(Auth::user()->role == 'vendor', function ($query) {
             return $query->byVendor(Auth::user()->vendor);
        })->where('payment_status',1)->count();
        $thisYearOrders = Order::whereBetween('created_at', [Carbon::now()->startOfYear(), Carbon::now()->endOfYear()])->when(Auth::user()->role == 'vendor', function ($query) {
             return $query->byVendor(Auth::user()->vendor);
        })->where('payment_status',1)->sum('amount');
        $thisYearOrdersCount = Order::whereBetween('created_at', [Carbon::now()->startOfYear(), Carbon::now()->endOfYear()])->when(Auth::user()->role == 'vendor', function ($query) {
             return $query->byVendor(Auth::user()->vendor);
        })->where('payment_status',1)->count();
        $thisWeek = array_fill(0, 7, 0);
        $currentWeek = Order::select(
            DB::raw('DAYOFWEEK(created_at) as day'),
            DB::raw('SUM(amount) as total')
        )
        ->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
        ->where('payment_status',1)
        ->when(Auth::user()->role == 'vendor', function ($query) {
             return $query->byVendor(Auth::user()->vendor);
        })
        ->groupBy('day')
        ->get();

        $currentYear = Order::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('SUM(amount) as total')
        )
        ->whereYear('created_at', Carbon::now()->year)
        ->when(Auth::user()->role == 'vendor', function ($query) {
             return $query->byVendor(Auth::user()->vendor);
        })
        ->where('payment_status', 1)
        ->groupBy('month')
        ->get();
        $monthlySales = array_fill(0, 12, 0);
        foreach ($currentYear as $sale) {
            $monthlySales[$sale->month - 1] = $sale->total;
        }
        foreach ($currentWeek as $order) {
            $thisWeek[$order->day - 1] = (int)$order->total;
        }
        
        return view('admin.layouts.master',compact('page','users','thisYearOrdersCount','thisWeekOrdersCount','todayOrder','vendors','monthlySales','thisMonthOrdersCount','orders','todayAmountSum','thisWeekOrders','thisMonthOrders','thisYearOrders','thisWeek'));
    }
    public function login()
    {
        return view('admin.auth.login');
    }
}
