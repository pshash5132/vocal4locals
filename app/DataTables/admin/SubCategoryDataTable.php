<?php

namespace App\DataTables\admin;

use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class SubCategoryDataTable extends DataTable
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
                $action = "<a href='" . route('admin.sub-category.edit', $query->id) . "' class='btn btn-primary'><i class='fa fa-pencil-alt'></i></a>";
                $delete = "<a href='" . route('admin.sub-category.destroy', $query->id) . "' class='btn btn-danger ml-2 delete-item'><i class='far fa-trash-alt'></i></a>";
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
            ->addColumn('category', function ($query) {
                return $query->category->name;

            })

            ->rawColumns(['action', 'icon', 'status'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(SubCategory $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('subcategory-table')
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
            Column::make('id')->width(100),
            Column::make('category')->width(200),
            Column::make('name')->width(200),
            Column::make('status')->width(100),
            Column::computed('action')->width(250)
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'SubCategory_' . date('YmdHis');
    }
}
