<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StatusKeanggotaanResource\Pages;
use App\Filament\Resources\StatusKeanggotaanResource\RelationManagers;
use App\Models\StatusKeanggotaan;
use Faker\Provider\ar_EG\Text;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StatusKeanggotaanResource extends Resource
{
    protected static ?string $model = StatusKeanggotaan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Kelola Donatur';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')->sortable()->label('Nama Status')->searchable(),
                TextColumn::make('created_at')->sortable()->label('dibuat sejak')->date('d F Y H:i:s'),
                TextColumn::make('updated_at')->sortable()->label('diubah sejak')->date('d F Y H:i:s'),
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
            'index' => Pages\ListStatusKeanggotaans::route('/'),
            'create' => Pages\CreateStatusKeanggotaan::route('/create'),
            'edit' => Pages\EditStatusKeanggotaan::route('/{record}/edit'),
        ];
    }
}