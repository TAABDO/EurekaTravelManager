<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BookingResource\Pages;
use App\Filament\Resources\BookingResource\RelationManagers;
use App\Models\Booking;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BookingResource extends Resource
{
    protected static ?string $model = Booking::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar';
    protected static ?string $navigationGroup = 'bookings';


    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\TextInput::make('reference')
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('date')
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('seat')
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('pax')
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('amount')
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('paiement_mode')
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('comment')
                ->required()
                ->maxLength(255),

            Forms\Components\TextInput::make('client.fullname')
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('client.email')
                ->required()
                ->maxLength(255),

        ]);
    }
    // `seat`, `pax`, `amount`, `paiement_mode`, `comment`, `service_id`, `agency_id`, `user_id`, `client_id`, `course_id`
    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            Tables\Columns\TextColumn::make('reference')->searchable()->sortable(),
            Tables\Columns\TextColumn::make('date')->searchable()->sortable(),
            Tables\Columns\TextColumn::make('seat')->searchable()->sortable(),
            Tables\Columns\TextColumn::make('pax')->searchable()->sortable(),
            Tables\Columns\TextColumn::make('amount')->prefix('€')->searchable()->sortable(),
            Tables\Columns\TextColumn::make('paiement_mode')->searchable()->sortable(),
            Tables\Columns\TextColumn::make('comment')->searchable()->sortable(),
            Tables\Columns\TextColumn::make('service.type')->label('ServiceType')->searchable()->sortable(),
            Tables\Columns\TextColumn::make('agency.name')->label('agency')->searchable()->sortable(),
            Tables\Columns\TextColumn::make('user.name')->label('driver')->searchable()->sortable(),
            Tables\Columns\TextColumn::make('user.status')->label('UserStatus')->searchable()->sortable(),
            Tables\Columns\TextColumn::make('client.fullname')->searchable()->sortable(),
            Tables\Columns\TextColumn::make('course_id')->searchable()->sortable(),

                  ])
            ->filters([
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ForceDeleteAction::make(),
                Tables\Actions\RestoreAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                Tables\Actions\DeleteBulkAction::make(),
                Tables\Actions\ForceDeleteBulkAction::make(),
                Tables\Actions\RestoreBulkAction::make(),
                ]),

            ]);
    }
    public static function getEloquentQuery(): Builder
    {
    return parent::getEloquentQuery()
        ->withoutGlobalScopes([
            SoftDeletingScope::class,
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
            'index' => Pages\ListBookings::route('/'),
            'create' => Pages\CreateBooking::route('/create'),
            'edit' => Pages\EditBooking::route('/{record}/edit'),
        ];
    }

}
