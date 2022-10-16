<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\ButtonGroupColumn;
use App\Models\Category;

class ActivityTable extends DataTableComponent
{
    protected $model = Category::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make(__('dashboard.id'), "id")
                ->sortable(),
            Column::make(__('dashboard.group'), "group")
                ->sortable(),
            Column::make(__('dashboard.class'), "sub_group")
                ->sortable(),
            Column::make(__('dashboard.code'), "code")
                ->sortable(),
            Column::make(__('dashboard.description'), "name_km")
                ->sortable(),
            // ButtonGroupColumn::make('Actions')->atrribute(function($row) {
            //     return [
            //         'class' => ''
            //     ];
            // }),
            
            
        ];
    }

    public function rowView(): string
    {
        return 'activity.includes.row';
    }
}
