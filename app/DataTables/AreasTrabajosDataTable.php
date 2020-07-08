<?php

namespace App\DataTables;

use App\Models\AreaTrabajo;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class AreasTrabajosDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', function($area){
                return view('empresas.accionArea',['area'=>$area])->render();
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \Models/AreaTrabajo $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(AreaTrabajo $model)
    {
        return $model->newQuery()->where('empresa_id',$this->idEmp);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('areastrabajos-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->parameters($this->getBuilderParameters())
                    ->dom('frtip');;
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->title('Acción')
                  ->addClass('text-center'),
            
            Column::make('nombre')
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'AreasTrabajos_' . date('YmdHis');
    }
}
