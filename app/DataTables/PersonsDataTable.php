<?php

namespace App\DataTables;

use App\Models\Person;
use Yajra\Datatables\Services\DataTable;

class PersonsDataTable extends DataTable
{
    /**
     * Display ajax response.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->of($this->query())
            ->setRowId('row_{!!$id!!}')
            ->addColumn('name', function($row) {
                return trim($row->last_name.' '.$row->first_name);
            })
            ->addColumn('job', function ($row) {
                $res = '';

                // If company set
                if ($row->company_name) {
                    $res = 'Компания: <b>'.$row->company_name.'</b>';
                }

                // if position set
                if ($row->position) {
                    $res .= ' Должность: <b>'.$row->position.'</b>';
                }

                return trim($res);
            })
            ->addColumn('contact', function ($row) {
                $res = '';
                // if personal_phone set add to result string
                if ($row->personal_phone) {
                    $res = 'Талафон: '.$row->personal_phone;
                }

                // if job_phone set add to result string
                if ($row->job_phone) {
                    $res .= ' Рабочий талафон: '.$row->personal_phone;
                }

                // if personal_email set add to result string
                if ($row->personal_email) {
                    $res .= ' Личный email: '.$row->personal_phone;
                }

                // if job_email set add to result string
                if ($row->job_phone) {
                    $res .= ' Рабочий email: '.$row->personal_phone;
                }

                return $res;
            })
            ->orderColumn('name', 'last_name $1, first_name $1')
            ->orderColumn('job', 'company_name $1, position $1')
            ->filterColumn('name', function($query, $keyword) {
                $query->where('last_name', 'like', "%{$keyword}%");
                $query->orWhere('first_name', 'like', "%{$keyword}%");
            })
            ->filterColumn('job', function($query, $keyword) {
                $query->where('company_name', 'like', "%{$keyword}%");
                $query->orWhere('position', 'like', "%{$keyword}%");
            })
            ->filterColumn('contact', function($query, $keyword) {
                $query->where('srch_phone', 'like', "%{$keyword}%");
                $query->orWhere('personal_email', 'like', "%{$keyword}%");
                $query->orWhere('job_email', 'like', "%{$keyword}%");
            })
            ->make(true);
    }

    /**
     * Get the query object to be processed by dataTables.
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder|\Illuminate\Support\Collection
     */
    public function query()
    {
        $query = Person::select();

        return $this->applyScopes($query);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\Datatables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->columns($this->getColumns())
                    ->ajax('')
                    ->parameters($this->getBuilderParameters());
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            ['name' => 'name','data' => 'name', 'title' => 'Персона', 'width' => '30%'],
            ['name' => 'job', 'data' => 'job', 'title' => 'Где работает', 'width' => '30%'],
            ['name' => 'contact','data' => 'contact', 'title' => 'Контакты', 'orderable' => false],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'personsdatatables_' . time();
    }

    protected function getBuilderParameters()
    {
        return [
            'dom' => "<'row'<'col-md-7'B><'col-md-5'f>><'row'<'col-sm-12'tr>><p>",
            'select' => 'single',
            'buttons' => [
                [
                    "text" => '<span class="glyphicon glyphicon-plus-sign"></span>',
                    'titleAttr' => 'Создать',
                    'id' => 'createTabBtn',
                    'className' => 'btn btn-success create-row',
                ],
                [
                    "text" => '<span class="glyphicon glyphicon-edit"></span>',
                    'titleAttr' => 'Редактировать',
                    'id' => 'editTabBtn',
                    'className' => 'btn btn-warning edit-row'
                ],
                [
                    'text' => '<span class="glyphicon glyphicon-remove"></span>',
                    'titleAttr' => 'Удалить',
                    'id' => 'deleteTabBtn',
                    'className' => 'btn btn-danger delete-row',
                ],
            ],
            'language' => [
                    "processing"        => "Подождите...",
                    "search"            => "Поиск:",
                    "lengthMenu"        => "Показать _MENU_ записей",
                    "info"              => "Записи с _START_ до _END_ из _TOTAL_ записей",
                    "infoEmpty"         => "Записи с 0 до 0 из 0 записей",
                    "infoFiltered"      => "(отфильтровано из _MAX_ записей)",
                    "infoPostFix"       => "",
                    "loadingRecords"    => "Загрузка записей...",
                    "zeroRecords"       => "Записи отсутствуют.",
                    "emptyTable"        => "В таблице отсутствуют данные",
                    "paginate" => [
                        "first"     => "Первая",
                        "previous"  => '<span class="glyphicon glyphicon-backward">',
                        "next"      => '<span class="glyphicon glyphicon-forward">',
                        "last"      => "Последняя"
                    ],
                    "aria" => [
                        "first"             => "Первая",
                        "previous"          => "Предыдущая",
                        "next"              => "Следующая",
                        "last"              => "Последняя",
                        "sortAscending"     => ": активировать для сортировки столбца по возрастанию",
                        "sortDescending"    => ": активировать для сортировки столбца по убыванию"

                ]
            ]
        ];
    }
}
