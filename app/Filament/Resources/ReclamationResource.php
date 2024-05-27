<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\Reclamation;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ReclamationResource\Pages;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use App\Filament\Resources\ReclamationResource\RelationManagers;

class ReclamationResource extends Resource
{
    protected static ?string $model = Reclamation::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\TextInput::make('date')
                ->required()
                ->maxLength(255),
                Forms\Components\TextInput::make('description')
                ->required()
                ->maxLength(255),
                Forms\Components\TextInput::make('user_id')
                ->required()
                ->maxLength(255),
                SpatieMediaLibraryFileUpload::make('reclamationImage')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                tables\Columns\TextColumn::make('date')->searchable()->sortable(),
                tables\Columns\TextColumn::make('description')->searchable()->sortable(),
                tables\Columns\TextColumn::make('user.name')->searchable()->sortable(),
                SpatieMediaLibraryImageColumn::make('reclamationImage')
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
            'index' => Pages\ListReclamations::route('/'),
            'create' => Pages\CreateReclamation::route('/create'),
            'edit' => Pages\EditReclamation::route('/{record}/edit'),
        ];
    }
}
