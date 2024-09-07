<?php

namespace App\DataTables\admin;

use App\Models\Order;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Http\Request;
use Carbon\Carbon;

class MonthlyOrderDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->filter(function ($query) {
                if ($this->request->has('date_from') && $this->request->has('date_to')) {
                    $start_date = Carbon::parse($this->request->get('date_from'))->startOfDay();
                    $end_date = Carbon::parse($this->request->get('date_to'))->endOfDay();
                    $query->where(function ($q) use ($end_date,$start_date) {
                        $q->whereBetween('created_at', [$start_date, $end_date]);
                    });   
                }
            
            })
            ->addColumn('customer', function ($query) {
                return $query->user->name;
            })
            ->addColumn('date', function ($query) {
                return date('d-m-Y', strtotime($query->created_at));
            })
            ->addColumn('coupon', function ($query) {
                $discount = '';
                if(isset($query->coupon) && $query->coupon != ''){
                    $couponData = json_decode($query->coupon);
                    if(isset($couponData->coupon_name) && $couponData->coupon_name != null){
                        $discount = $couponData->coupon_name;
                    }
                }
                return $discount;
            })
            ->addColumn('order_status', function ($query) {
                switch ($query->order_status) {
                    case 'pending':
                        return "<span class='badge bg-warning'> ".ucfirst(strtolower($query->order_status))."</span>";
                        break;
                    case 'processed_and_ready_to_ship':
                        return "<span class='badge bg-info'> ".ucfirst(strtolower($query->order_status))."</span>";
                        break;
                    case 'dropped_off':
                        return "<span class='badge bg-info'> ".ucfirst(strtolower($query->order_status))."</span>";
                        break;
                    case 'shipped':
                        return "<span class='badge bg-info'> ".ucfirst(strtolower($query->order_status))."</span>";
                        break;
                    case 'out_of_delivery':
                        return "<span class='badge bg-primary'> ".ucfirst(strtolower($query->order_status))."</span>";
                        break;
                    case 'delivered':
                        return "<span class='badge bg-success'> ".ucfirst(strtolower($query->order_status))."</span>";
                        break;
                    case 'cancelled':
                        return "<span class='badge bg-danger'> ".ucfirst(strtolower($query->order_status))."</span>";
                        break;
                    default:
                        # code...
                        break;
                }

            })
            ->addColumn('payment_status', function ($query) {
                if ($query->payment_status == 1) {

                    return "<span class='badge bg-success'>Completed</span>";
                } else {
                    return "<span class='badge bg-danger'>Pending</span>";

                }
            })
            ->rawColumns(['order_status', 'payment_status','coupon'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Order $model): QueryBuilder
    {
        if(Auth::user()->role =='vendor'){
            return $model::byVendor(Auth::user()->vendor);
        }
        if ($this->request->has('date_from') && $this->request->has('date_to')) {
            return $model->newQuery();
        }else{
            return $model->newQuery()->whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()]);
        }
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('order-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [

            Column::make('id'),
            Column::make('invoice_id'),
            Column::make('date'),
            Column::make('customer'),
            Column::make('sub_total'),
            Column::make('discount_amount'),
            Column::make('amount'),
            Column::make('coupon'),
            Column::make('payment_method'),
            Column::make('order_status'),
            Column::make('payment_status'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'MonthlyOrder_' . date('YmdHis');
    }
}
