<?php

namespace App\DataTables\admin;

use App\Models\hotelInquiry;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class hotelInquiriesDataTable extends DataTable
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
                $action = "<a href='" . route('admin.inquirySlider.edit', $query->id) . "' class='btn btn-primary'><i class='fa fa-check'></i></a>";
                $delete = "<a href='" . route('admin.inquirySlider.destroy', $query->id) . "' class='btn btn-danger ml-2 delete-item'><i class='far fa-trash-alt'></i></a>";
                return $action . $delete;
            })
            ->addColumn('name', function ($query) {

                return $query->user->name;
            })
            ->addColumn('email', function ($query) {
                return $query->user->email;
            })
            ->addColumn('mobile', function ($query) {
                return $query->user->mobile;
            })
            ->addColumn('created_at', function ($query) {
                return date('Y-M-d h:i a', strtotime($query->created_at));
            })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(hotelInquiry $model): QueryBuilder
    {
        return $model->newQuery()->with('user')->orderBy('id', 'desc');
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('hotelinquiries-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
        //->dom('Bfrtip')
        // ->orderBy(1)
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
            Column::make('name'),
            Column::make('email'),
            Column::make('mobile'),
            Column::make('location'),
            Column::make('check_in'),
            Column::make('check_out'),
            Column::make('rooms'),
            Column::make('adults'),
            Column::make('childrens'),
            Column::make('childrens_age'),
            Column::make('budget'),
            Column::make('created_at'),
            Column::computed('action')
                ->exportable(true)
                ->printable(true)
                ->width(300)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'hotelInquiries_' . date('YmdHis');
    }
}
