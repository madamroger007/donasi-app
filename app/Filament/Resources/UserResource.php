<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->label('Name')
                    ->maxLength(255),
                TextInput::make('email')
                    ->required()
                    ->email()
                    ->label('Email')
                    ->maxLength(255),
                TextInput::make('password')
                    ->password()
                    ->label('Password')
                    ->minLength(8)
                    ->maxLength(255)
                    ->dehydrateStateUsing(fn($state) => bcrypt($state))
                    ->required(fn(Forms\Get $get) => $get('id') === null), // Only required on create
                Select::make('roles')
                    ->relationship('roles', 'name')
                    ->preload()
                    ->label('Roles')
                    ->required()
                    ->searchable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->sortable()->searchable(),
                TextColumn::make('email')->sortable()->searchable(),
                TextColumn::make('roles.name')
                    ->sortable()->label('Role'),

                // IconColumn::make('is_admin')->boolean()->trueColor('success')->falseColor('danger')->trueIcon('heroicon-s-check-circle')->falseIcon('heroicon-s-x-circle')->label("is admin")->alignCenter(),
                TextColumn::make('created_at')->sortable()->dateTime(),
                TextColumn::make('updated_at')->sortable()->dateTime()
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->label('Delete') // Teks tombol Delete
                    ->tooltip('Delete this user') // Tooltip untuk tombol
                    ->icon('heroicon-s-trash') // Ikon tombol
                    ->color('danger'), // Warna tombol
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
