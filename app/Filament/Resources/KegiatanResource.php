<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KegiatanResource\Pages;
use App\Filament\Resources\KegiatanResource\RelationManagers;
use App\Models\Kegiatan;
use Filament\Forms;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KegiatanResource extends Resource
{
    protected static ?string $model = Kegiatan::class;
    protected static ?string $navigationGroup = 'Kelola Kegiatan';

    protected static ?string $navigationIcon = 'heroicon-o-arrow-path';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('judul')->required()->maxLength(255),
                Textarea::make('keterangan')->required()->maxLength(255),
                DateTimePicker::make('tanggal_kegiatan')
                    ->native(false)

                    ->required(),
                TextInput::make('jenis_kegiatan')->required()->maxLength(255),
                TextInput::make('sumber_donasi')->required()->maxLength(255),
                TextInput::make('penanggung_jawab')->required()->maxLength(255),
                Select::make('bentuk_donasi_id')->relationship('bentukdonasi', 'nama')->label('Bentuk Donasi')->required(),
                TextInput::make('jumlah')->required()->maxLength(255)->label('Jumlah donasi'),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('judul')->sortable()->searchable(),
                TextColumn::make('keterangan')

                ->limit(10) // Batasi jumlah karakter, misalnya 50 karakter
                ->label('Keterangan'),
                TextColumn::make('tanggal_kegiatan')->sortable()->date(),
                TextColumn::make('jenis_kegiatan'),
                TextColumn::make('sumber_donasi')->sortable()->searchable(),
                TextColumn::make('bentukdonasi.nama')->sortable()->searchable()->label('Bentuk Donasi'),
                TextColumn::make('jumlah')->sortable(),
                TextColumn::make('penanggung_jawab')->sortable()->searchable(),
                TextColumn::make('created_at')->sortable()->date('d F Y H:i:s')->label('dibuat sejak'),
                TextColumn::make('updated_at')->sortable()->date('d F Y H:i:s')->label('diubah sejak'),

            ])
            ->filters([
                SelectFilter::make('bentukdonasi_id')
                ->label('Bentuk Donasi')
                ->relationship('bentukdonasi', 'nama')
                ->searchable(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListKegiatans::route('/'),
            'create' => Pages\CreateKegiatan::route('/create'),
            'edit' => Pages\EditKegiatan::route('/{record}/edit'),
        ];
    }
}
