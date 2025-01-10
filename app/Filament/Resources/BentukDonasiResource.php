<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BentukDonasiResource\Pages;
use App\Filament\Resources\BentukDonasiResource\RelationManagers;

use App\Models\BentukDonasi;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BentukDonasiResource extends Resource
{

    protected static ?string $model = BentukDonasi::class;
    protected static ?string $navigationGroup = 'Kelola Kegiatan';
    protected static ?string $navigationIcon = 'heroicon-o-inbox-arrow-down';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama')->required()->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')->sortable()->searchable(),
                TextColumn::make('created_at')->sortable()->label('dibuat sejak')->date('d F Y H:i:s'),
                TextColumn::make('updated_at')->sortable()->label('diubah sejak')->date('d F Y H:i:s'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
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
            'index' => Pages\ListBentukDonasis::route('/'),
            'create' => Pages\CreateBentukDonasi::route('/create'),
            'edit' => Pages\EditBentukDonasi::route('/{record}/edit'),
        ];
    }
}