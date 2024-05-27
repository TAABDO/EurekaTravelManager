<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\BookingResource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LastBooking extends BaseWidget
{

    protected static ?int $sort = 5;

    protected int | string | array $columnSpan = 'full';


    public function table(Table $table): Table
    {
        return $table
            ->query(BookingResource::getEloquentQuery())
            ->defaultPaginationPageOption(5)
            ->defaultSort('created_at', 'desc')
            ->columns([

                Tables\Columns\TextColumn::make('reference')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('date')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('seat')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('amount')->prefix('€')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('client.fullname')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('course.depart_point')->searchable()->sortable(),
            ]);
    }
}
