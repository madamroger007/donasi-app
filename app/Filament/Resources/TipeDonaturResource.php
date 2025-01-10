<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TipeDonaturResource\Pages;
use App\Filament\Resources\TipeDonaturResource\RelationManagers;

use App\Models\TipeDonatur;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TipeDonaturResource extends Resource
{
    protected static ?string $model = TipeDonatur::class;

    protected static ?string $navigationGroup = 'Kelola Donatur';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

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
                TextColumn::make('nama')->sortable()->label('Nama Tipe')->searchable(),
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
            'index' => Pages\ListTipeDonaturs::route('/'),
            'create' => Pages\CreateTipeDonatur::route('/create'),
            'edit' => Pages\EditTipeDonatur::route('/{record}/edit'),
        ];
    }
}