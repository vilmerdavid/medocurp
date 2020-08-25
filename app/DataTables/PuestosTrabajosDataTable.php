<?php

namespace App\DataTables;

use App\Models\PuestoTrabajo;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PuestosTrabajosDataTable extends DataTable
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
            ->addColumn('action', function($puesto){
                return view('empresas.accionPuesto',['puesto'=>$puesto])->render();
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \Models/PuestoTrabajo $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(PuestoTrabajo $model)
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
                    ->setTableId('puestostrabajos-table')
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
        return 'PuestosTrabajos_' . date('YmdHis');
    }
}
