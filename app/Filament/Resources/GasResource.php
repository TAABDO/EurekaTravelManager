<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GasResource\Pages;
use App\Filament\Resources\GasResource\RelationManagers;
use App\Models\Gas;
use Filament\Forms;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GasResource extends Resource
{
    protected static ?string $model = Gas::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Depenses';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('km_depart')->label('Km Depart')->required(),
                TextInput::make('km_arrival')->label('Km Arrival')->required(),
                TextInput::make('km_total')->label('Km Total')->required(),
                TextInput::make('amount')->label('Amount')->required(),
                TimePicker::make('time')->label('Time')->required(),
                TextInput::make('paiement_mode')->label('Paiement mode')->required(),
                Textarea::make('comment')->label('Comment')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('course.depart_point')->label('Depart Point')->sortable()->searchable(),
                TextColumn::make('km_depart')->label('Km Depart')->sortable()->searchable(),
                TextColumn::make('km_arrival')->label('Km Arrival')->sortable()->searchable(),
                TextColumn::make('km_total')->label('Km Total')->sortable()->searchable(),
                TextColumn::make('amount')->label('Amount')->sortable()->searchable(),
                TextColumn::make('time')->label('Time')->sortable()->searchable(),
                TextColumn::make('paiement_mode')->label('Paiement mode')->sortable()->searchable(),
                TextColumn::make('comment')->label('Comment')->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGases::route('/'),
            'create' => Pages\CreateGas::route('/create'),
            'edit' => Pages\EditGas::route('/{record}/edit'),
        ];
    }
}
