<?php

namespace App\Filament\Resources\Employees\Schemas;

use App\Models\Department;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class EmployeeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('first_name')
                    ->required(),
                TextInput::make('last_name')
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),
                TextInput::make('phone')
                    ->tel()
                    ->required(),
                TextInput::make('position')
                    ->required(),
                TextInput::make('salary')
                    ->required()->numeric(),
                TextInput::make('hire_date')
                    ->required(),
                Select::make('dept_id')->label("Department")->options(Department::pluck("name", "id")),
                FileUpload::make('image')
                    ->disk('public')
                    ->image(),
            ]);
    }
}
