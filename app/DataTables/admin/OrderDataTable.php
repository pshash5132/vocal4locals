<?php

namespace App\DataTables\admin;

use App\Models\Order;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Http\Request;
use Carbon\Carbon;

class OrderDataTable extends DataTable
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
            ->addColumn('action', function ($query) {
                $showBtn = "<a href='" . route('admin.order.show', $query->id) . "' class='btn btn-primary'><i class='fa fa-eye'></i></a>";
                $deleteBtn = "<a href='" . route('admin.order.destroy', $query->id) . "' class='btn btn-danger ml-2 delete-item'><i class='far fa-trash-alt'></i></a>";
                $statusBtn = "<a href='" . route('admin.order.delivered', $query->id) . "' class='btn btn-warning ml-2 deliver-item'><i class='fas fa-truck'></i></a>";

                return $showBtn . $deleteBtn . $statusBtn;
            })
            ->addColumn('customer', function ($query) {
                return $query->user->name;
            })
            ->addColumn('date', function ($query) {
                return date('d-m-Y', strtotime($query->created_at));
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
            ->rawColumns(['order_status', 'action', 'payment_status'])
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
        return $model->newQuery();
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
                Button::make('reload'),
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
            Column::make('order_status'),
            Column::make('payment_status'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(200)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Order_' . date('YmdHis');
    }
}