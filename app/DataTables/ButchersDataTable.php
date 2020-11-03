<?php

namespace App\DataTables;

use App\Models\Butchers;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class ButchersDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);
        return $dataTable->addColumn('action', 'intros.datatables_actions')->editColumn('image', function ($q) {
            return ($q->image)  ? '<img src="'. asset('/'.$q->image).'" width="150px" hieght="150px" />' : ' no image';
        })->addColumn('views', function ($q) {
            return $q->view_butchers->count();
        })
            ->rawColumns([
                'image',
                'action' ,
                'views'
            ]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Butchers $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Butchers $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false])
            ->parameters([
                'dom'       => 'Bfrtip',
                'stateSave' => true,
                'order'     => [[0, 'desc']],
                'buttons'   => [
                    ['extend' => 'create', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'export', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'print', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reset', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reload', 'className' => 'btn btn-default btn-sm no-corner',],
                ],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [

            'name' => new Column(['title' => __('lang.Name'), 'data' => 'name']),
            'phone' => new Column(['title' => __('lang.Phone'), 'data' => 'phone']),
            'image' => new Column(['title' => __('lang.Image'), 'data' => 'image']),
            'address' => new Column(['title' => __('lang.Address'), 'data' => 'address']),
            'longitude' => new Column(['title' => __('lang.Longitude'), 'data' => 'longitude']),
            'latituede' => new Column(['title' => __('lang.Latituede'), 'data' => 'latituede']),
            'views' => new Column(['title' => __('lang.Views'), 'data' => 'views']),
        ];

    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'butchers_datatable_' . time();
    }
}
