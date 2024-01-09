<?php

namespace App\DataTables\admin;

use App\Models\cabInquiry;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class cabInquiriesDataTable extends DataTable
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
                $action = "<select data-id='" . $query->id . "' class='select_action'>
                            <option ".($query->status==1 ?'selected':'')." value='1'>New</option>
                            <option ".($query->status==2 ?'selected':'')." value='2'>Pending</option>
                            <option ".($query->status==3 ?'selected':'')." value='3'>Booked</option>
                            <option ".($query->status==4 ?'selected':'')." value='4'>Not Available</option>
                            <option ".($query->status==5 ?'selected':'')." value='5'>Cancelled</option>
                        </select>";
                return $action;
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
    public function query(cabInquiry $model): QueryBuilder
    {
        return $model->newQuery()->with('user')->orderBy('id', 'desc');
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('cabinquiries-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
        //->dom('Bfrtip')
        // ->orderBy(0)
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
            Column::make('from_location'),
            Column::make('to_location'),
            Column::make('departure'),
            Column::make('return'),
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
        return 'cabInquiries_' . date('YmdHis');
    }
}