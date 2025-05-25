<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KegiatanResource\Pages;
use App\Filament\Resources\KegiatanResource\RelationManagers;
use App\Models\Kegiatan;
use Dom\Text;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
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
                TextInput::make('judul')->required()->maxLength(255)->placeholder('Judul Kegiatan'),
                Textarea::make('keterangan')->required()->maxLength(255)->placeholder('Keterangan Kegiatan'),
                DatePicker::make('tanggal_kegiatan')
                    ->native(false)

                    ->required()->placeholder('Tanggal Kegiatan'),
                TextInput::make('jenis_kegiatan')->required()->maxLength(255)->placeholder('Jenis Kegiatan'),
                TextInput::make('nama_donatur')->required()->maxLength(255)->placeholder('Nama Donatur'),
                TextInput::make('sumber_donasi')->required()->maxLength(255)->placeholder('Sumber Donasinya apa'),
                TextInput::make('penanggung_jawab')->required()->maxLength(255)->placeholder('Penanggung Jawab Kegiatan'),
                TextInput::make('bentuk_donasi')->required()->maxLength(255)->placeholder('Beras, Uang, dll'),
                TextInput::make('masuk_donasi')->required()->maxLength(255)->label('Masuk Donasi')->placeholder('Rp. 1000, 1kg'),
                TextInput::make('keluar_donasi')->required()->maxLength(255)->label('Keluar Donasi')->placeholder('Rp. 1000, 1kg'),
                TextInput::make('jumlah')->required()->maxLength(255)->label('Jumlah donasi')->placeholder('Rp. 1000, 1kg'),

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
                TextColumn::make('nama_donatur')->sortable()->searchable(),
                TextColumn::make('sumber_donasi')->sortable()->searchable(),
                TextColumn::make('bentuk_donasi')->sortable()->searchable()->label('Bentuk Donasi'),
                TextColumn::make('penanggung_jawab')->sortable()->searchable(),
                TextColumn::make('jumlah')->sortable(),
                TextColumn::make('masuk_donasi')->sortable()->searchable(),
                TextColumn::make('keluar_donasi')->sortable()->searchable(),
                TextColumn::make('created_at')->sortable()->date('d F Y H:i:s')->label('dibuat sejak'),
                TextColumn::make('updated_at')->sortable()->date('d F Y H:i:s')->label('diubah sejak'),

            ])
            ->filters([

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
