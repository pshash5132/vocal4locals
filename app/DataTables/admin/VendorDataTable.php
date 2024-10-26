<?php

namespace App\DataTables\admin;

use App\Models\Vendor;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class VendorDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
        ->addIndexColumn() // Automatically add a serial number column
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
            ->addColumn('action', function ($query) {
                $action = "<a href='" . route('admin.vendor-profile.edit', $query->id) . "' class='btn btn-primary'><i class='far fa-edit'></i></a>";

                $delete = "<a href='" . route('admin.vendor-profile.destroy', $query->id) . "' class='btn btn-danger ml-2 delete-item'><i class='far fa-trash-alt'></i></a>";
                return $action . $delete;
            })
            ->rawColumns([ 'status', 'action'])

            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Vendor $model): QueryBuilder
    {
        return $model->newQuery()->orderBy('id', 'desc');
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('vendor-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
        //->dom('Bfrtip')
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
            Column::computed('DT_RowIndex')
            ->title('Sr No.') // Title for the serial number column
            ->searchable(false) // Serial number column is not searchable
            ->orderable(false) // Serial number column is not orderable
            ->width(100)
            ->addClass('text-center'),
            Column::make('name'),
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
        return 'Vendor_' . date('YmdHis');
    }
}