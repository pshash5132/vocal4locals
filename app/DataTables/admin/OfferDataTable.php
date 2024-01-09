<?php

namespace App\DataTables\admin;

use App\Models\Offer;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class OfferDataTable extends DataTable
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
                $action = "<a href='" . route('admin.offer.edit', $query->id) . "' class='btn btn-primary'><i class='fa fa-pencil-alt'></i></a>";
                $delete = "<a href='" . route('admin.offer.destroy', $query->id) . "' class='btn btn-danger ml-2 delete-item'><i class='far fa-trash-alt'></i></a>";
                return $action . $delete;
            })

            ->addColumn('status', function ($query) {
                if ($query->status == 1) {

                    return '<label class="custom-switch mt-2">
                <input type="checkbox" checked  name="custom-switch-checkbox" class="custom-switch-input change-status" data-id="' . $query->id . '">
                <span class="custom-switch-indicator"></span>
                </label>';
                } else {
                    return '<label class="custom-switch mt-2">
                <input type="checkbox"  name="custom-switch-checkbox" class="custom-switch-input change-status" data-id="' . $query->id . '">
                <span class="custom-switch-indicator"></span>
                </label>';
                }

            })

            ->rawColumns(['action', 'status'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Offer $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('offer-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
        //->dom('Bfrtip')
            ->orderBy(0)
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
            Column::make('title'),
            Column::make('status'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(250)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Offer_' . date('YmdHis');
    }
}
