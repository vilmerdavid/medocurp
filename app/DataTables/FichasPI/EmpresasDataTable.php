<?php

namespace App\DataTables\FichasPI;

use App\Models\Empresa;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class EmpresasDataTable extends DataTable
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
            ->editColumn('logo',function($emp){
                return view('fichas_pi.logo_empresa',['emp'=>$emp])->render();
            })
            ->addColumn('action', function($emp){
                return view('fichas_pi.accion_empresa',['emp'=>$emp,'opcion'=>$this->opcion])->render();
            })
            ->rawColumns(['logo','action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\FichasPI/Empresa $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Empresa $model)
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
                    ->setTableId('fichaspi-empresas-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->parameters($this->getBuilderParameters())
                    ->dom('frtip');
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
            
            Column::make('logo'),
            Column::make('nombre'),
            Column::make('ruc'),
            Column::make('ciiu'),
            Column::make('establecimiento'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'FichasPI/Empresas_' . date('YmdHis');
    }
}
