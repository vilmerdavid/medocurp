<?php

namespace App\DataTables;

use App\Models\FichaPI;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class FichasPIDataTable extends DataTable
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
            
            ->editColumn('id',function($fi){
                return $fi->user_m->numero_archivo;
            })

            ->filterColumn('id',function($query, $keyword){
                $query->whereHas('user_m', function($query) use ($keyword) {
                    $query->whereRaw("numero_archivo like ?", ["%{$keyword}%"]);
                });            
            })

            ->editColumn('user_id',function($fi){
                return $fi->user_m->historia_clinica_ci;
            })


            ->filterColumn('user_id',function($query, $keyword){
                $query->whereHas('user_m', function($query) use ($keyword) {
                    $query->whereRaw("historia_clinica_ci like ?", ["%{$keyword}%"]);
                });            
            })

            ->editColumn('created_at',function($fi){
                return $fi->created_at;
            })
            ->addColumn('action', function($fi){
                return view('fichas_pi.accion',['fi'=>$fi])->render();
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\FichasPI $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(FichaPI $model)
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
                    ->setTableId('fichaspi-table')
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
            Column::make('id')->title('Número de archivo'),
            Column::make('user_id')->title('Historía clínica'),
            Column::make('created_at')->title('Fecha de ingreso'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'FichasPI_' . date('YmdHis');
    }
}
