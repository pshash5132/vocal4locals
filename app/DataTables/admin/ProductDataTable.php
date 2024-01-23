<?php

namespace App\DataTables\admin;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class ProductDataTable extends DataTable
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
                $action = "<a href='" . route('admin.product.edit', $query->id) . "' class='btn btn-primary'><i class='fa fa-pencil-alt'></i></a>";
                $delete = "<a href='" . route('admin.product.destroy', $query->id) . "' class='btn btn-danger ml-2 delete-item'><i class='far fa-trash-alt'></i></a>";
                $moreButton = '<div class="dropdown dropleft d-inline">
                <button class="btn btn-primary dropdown-toggel ml-1" type="button" id="dropdownMenuButton2" data-toggle="dropdown" area-haspopup="true" area-expanded="false">
                <i class="fas fa-cog"></i>
                </button>
                <div class="dropdown-menu" x-placement="bottom-start" style="position:absolute;transform:translate3d(0px,28px,0px);top:0px;left:0px;will-change:transform;">
                <a class="dropdown-item has-icon" href="' . route('admin.products-image-gallery.index', ['product' => $query->id]) . '"><i class="far fa-heart"></i>Image Gallery</a>
                <a class="dropdown-item has-icon" href="' . route('admin.products-variant.index', ['product' => $query->id]) . '"><i class="far fa-file"></i>Variants</a>
                </div>
                </div>';
                return $action . $delete . $moreButton;
            })
            ->addColumn('image', function ($query) {
                return '<img src="' . asset($query->thumb_image) . '"/ width="50">';
            })
            ->addColumn('type', function ($query) {
                switch ($query->product_type) {
                    case 'new_arrival':
                        return '<i class="badge badge-success">New Arrival</i>';
                        break;
                    case 'fatured_product':
                        return '<i class="badge badge-warning">Fetured Product</i>';
                        break;
                    case 'top_product':
                        return '<i class="badge badge-primary">Top Product</i>';
                        break;
                    case 'best_product':
                        return '<i class="badge badge-info">Best Product</i>';
                        break;
                    default:
                        return '<i class="badge badge-dark">None</i>';
                        break;
                }
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

            ->addColumn('is_approved', function ($query) {
                if ($query->is_approved == 1) {
                    return '<label class="custom-switch mt-2">
                    <input type="checkbox" checked  name="custom-switch-checkbox" class="custom-switch-input change-is_approved" data-id="' . $query->id . '">
                    <span class="custom-switch-indicator"></span>
                    </label>';
                } else {
                    return '<label class="custom-switch mt-2">
                    <input type="checkbox"  name="custom-switch-checkbox" class="custom-switch-input change-is_approved" data-id="' . $query->id . '">
                    <span class="custom-switch-indicator"></span>
                    </label>';
                }


            })
            ->addColumn('vendor_name', function ($query) {
               return $query->vendor->name;
            })
            ->rawColumns(['image', 'type', 'status', 'action','is_approved'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Product $model): QueryBuilder
    {
        if(Auth::user()->role =='vendor'){
            return $model->where('vendor_id',Auth::user()->vendor->id);
        }
        return $model->orderBy('id', 'desc');
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('product-table')
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
            Column::make('vendor_name'),
            Column::make('image'),
            Column::make('name'),
            Column::make('type')->width(100),
            Column::make('status'),
            Column::make('is_approved'),
            Column::computed('action')->width(200),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Product_' . date('YmdHis');
    }
}