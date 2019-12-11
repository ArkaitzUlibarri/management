<?php

namespace App\DataTables;

use App\Models\ContractType;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ContractTypeDataTable extends DataTable
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
            ->addColumn('action', 'contractTypes.action');
    }

    /**
     * Get query source of dataTable.
     *
     * @param ContractType $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(ContractType $model)
    {
        return $model->newQuery()->withTrashed();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('dataTableBuilder')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->orderBy(1,'asc')
            ->scrollX(true)
            ->buttons(
                Button::make('create'),
                Button::make('export'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload')
            );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('id'),
            Column::make('code'),
            Column::make('name'),
            Column::make('working_day'),
            Column::make('characteristic_1'),
            Column::make('characteristic_2'),
            Column::make('holidays'),
            Column::make('created_at'),
            Column::make('updated_at'),
            Column::make('deleted_at'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width('15%')
                ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'ContractTypes_' . date('YmdHis');
    }
}
