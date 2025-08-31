<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\Departments\DepartmentResource;
use App\Filament\Resources\Employees\EmployeeResource;
use App\Models\Department;
use App\Models\Employee;
use Filament\Widgets\StatsOverviewWidget;

use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends StatsOverviewWidget
{

    protected function getCards(): array
    {
        return [
            Stat::make('Total Employee', Employee::get()->count())
                ->description('All registered Employee')
                ->url(EmployeeResource::getUrl('index'))
                ->descriptionIcon('heroicon-o-user-group')
                ->color('success'),

            Stat::make('Total Department', Department::get()->count())
                ->description('All registered Department')
                ->url(DepartmentResource::getUrl('index'))
                ->descriptionIcon('heroicon-o-building-office-2')
                ->color('success'),

            Stat::make('Deleted Employee', Employee::onlyTrashed()->count())
                ->description('All Deleted Employee')
                ->url(EmployeeResource::getUrl('index'))
                ->descriptionIcon('heroicon-o-user-group')
                ->color('success'),

            Stat::make('Highest Salary', "Rs. " . number_format(Employee::max("salary")))
                ->color('success'),

            Stat::make('Lowest Salary', "Rs. " . number_format(Employee::min("salary")))
                ->color('success'),

            Stat::make('Total Salary', "Rs. " . number_format(Employee::sum("salary")))
                ->description('Salary Graph')
                ->chart(Employee::pluck("salary")->toArray())
                ->color('success'),
        ];
    }
}
