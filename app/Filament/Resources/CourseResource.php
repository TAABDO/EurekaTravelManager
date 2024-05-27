<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CourseResource\Pages;
use App\Filament\Resources\CourseResource\RelationManagers;
use App\Models\Course;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CourseResource extends Resource
{
    protected static ?string $model = Course::class;

    protected static ?string $navigationIcon = 'heroicon-o-map';

    public static function form(Form $form): Form
    {
        return $form

            ->schema([

                Forms\Components\TextInput::make('date')
                ->required()
                ->maxLength(255),
                Forms\Components\TextInput::make('depart_point')
                ->required()
                ->maxLength(255),
                Forms\Components\TextInput::make('arrival_point')
                ->required()
                ->maxLength(255),
                Forms\Components\TextInput::make('user_id')
                ->required()
                ->maxLength(255),
                Forms\Components\TextInput::make('car_id')
                ->required()
                ->maxLength(255),
                Forms\Components\TextInput::make('expense_id')
                ->required()
                ->maxLength(255),
                Forms\Components\TextInput::make('gas_id')
                ->required()
                ->maxLength(255),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('date')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('depart_point')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('arrival_point')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('user_id')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('car_id')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('expense_id')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('gas_id')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('created_at')->searchable()->sortable(),
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
            'index' => Pages\ListCourses::route('/'),
            'create' => Pages\CreateCourse::route('/create'),
            'edit' => Pages\EditCourse::route('/{record}/edit'),
        ];
    }
}
