<?php

namespace App\DataTables;

use App\Models\Lead;
use App\Models\Proposal;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class LeadsDataTable extends DataTable
{

    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', 'pages.leads._columns.action')
//            ->addColumn('name', function (Proposal $proposal) {
//                return $proposal->lead ? $proposal->lead->name : 'N/A';
//            })
            ->rawColumns(['action','lead_name'])
            ->setRowId('id');
    }


    public function query(Lead $model): QueryBuilder
    {
        return $model->newQuery();
    }


    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('leads-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->parameters([
                'bSort' => false,
            ]);
    }


    public function getColumns(): array
    {
        return [
            Column::make('name'),
            Column::make('email'),
            Column::make('phone'),
            Column::make('notes'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->orderable(false)
                ->addClass('text-center'),

        ];
    }


    protected function filename(): string
    {
        return 'Leads_' . date('YmdHis');
    }
}
