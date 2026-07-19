<?php

namespace App\Filament\Resources\Cars\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class CarForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                TextInput::make('code')
                    ->label('Car Code')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(20)
                    ->placeholder('CAR-0001'),

                TextInput::make('plate_number')
                    ->label('Plate Number')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(20)
                    ->placeholder('B 1234 XYZ'),

                TextInput::make('driver_name')
                    ->label('Driver Name')
                    ->required()
                    ->maxLength(100)
                    ->placeholder('John Doe'),

                TextInput::make('phone')
                    ->label('Phone')
                    ->tel()
                    ->maxLength(20)
                    ->placeholder('081234567890'),

                Select::make('status')
                    ->label('Status')
                    ->required()
                    ->default('Standby')
                    ->options([
                        'Standby'   => 'Standby',
                        'Delivery'  => 'Delivery',
                        'Completed' => 'Completed',
                    ])
                    ->native(false),

            ]);
    }
}