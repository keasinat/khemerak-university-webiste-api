<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;
use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;

class ActivityTable extends DataTableComponent
{
    protected $model = Category::class;
    public bool $perPageAll = true;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setPaginationEnabled();
        $this->setPerPageAccepted([10, 25, 50, 100]);
    }

    public function query(): Builder
    {
        $query = category::query();

        return $query;
    }

    public function columns(): array
    {
        return [
            Column::make(__('dashboard.id'), "id")
                ->sortable(),
            Column::make(__('dashboard.group'), "group")
                ->sortable()
                ->searchable(),
            Column::make(__('dashboard.class'), "sub_group")
                ->sortable()
                ->searchable(),
            Column::make(__('dashboard.code'), "code")
                ->sortable()
                ->searchable(),
            Column::make(__('dashboard.description'), "name_km")
                ->sortable()
                ->searchable(),
            ButtonGroupColumn::make('Actions')
            ->buttons([
                LinkColumn::make('My Link 1')
                        ->title(fn($row) => '<i class="fa-solid fa-pen-to-square"></i>')
                        ->location(fn($row) => 'https://'.$row->id.'google1.com')
                        ->attributes(function($row) {
                            return [
                                'target' => '_blank',
                                'class' => 'underline text-blue-500',
                            ];
                        }),
            ]),
            
            
        ];
    }

    public function rowView(): string
    {
        return 'activity.includes.row';
    }
}
