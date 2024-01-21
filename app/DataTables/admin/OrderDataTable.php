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
            ->addColumn('action', function ($query) {
                $showBtn = "<a href='" . route('admin.order.show', $query->id) . "' class='btn btn-primary'><i class='fa fa-eye'></i></a>";
                $deleteBtn = "<a href='" . route('admin.product.destroy', $query->id) . "' class='btn btn-danger ml-2 delete-item'><i class='far fa-trash-alt'></i></a>";
                $statusBtn = "<a href='" . route('admin.product.destroy', $query->id) . "' class='btn btn-warning ml-2 delete-item'><i class='fas fa-truck'></i></a>";

                return $showBtn . $deleteBtn . $statusBtn;
            })
            ->addColumn('customer', function ($query) {
                return $query->user->name;
            })
            ->addColumn('date', function ($query) {
                return date('d-m-Y', strtotime($query->created_at));
            })
            ->addColumn('order_status', function ($query) {
                return "<span class='badge bg-warning'>$query->order_status</span>";
            })
            ->addColumn('payment_status', function ($query) {
                if ($query->payment_status == 1) {

                    return "<span class='badge bg-success'>$query->payment_status</span>";
                } else {
                    return "<span class='badge bg-danger'>$query->payment_status</span>";

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
            return $model::byVendor(Auth::user()->vendor)->get();
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
