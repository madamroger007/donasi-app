<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DonaturResource\Pages;
use App\Filament\Resources\DonaturResource\RelationManagers;
use App\Models\Donatur;
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

class DonaturResource extends Resource
{
    protected static ?string $model = Donatur::class;
    protected static ?string $navigationGroup = 'Kelola Donatur';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama')->required()->maxLength(255)->placeholder('Nama Donatur'),
                TextInput::make('no_telepon')->required()->maxLength(255)->numeric()->placeholder('Nomor Kantor jika tidak ada beri angka 0'),
                TextInput::make('no_whatsapp')->required()->maxLength(255)->numeric()->placeholder('628xxxxxxxxxx jika tidak ada beri angka 0'),
                Textarea::make('alamat')->required()->maxLength(255),
                Select::make('tipe_donaturs_id')->relationship('tipedonatur', 'nama')->label('Tipe Donatur')->required(),
                Select::make('status_keanggotaans_id')->relationship('statuskeanggotaan', 'nama')->label('Status Anggota')->required(),
                DatePicker::make('tanggal_lahir')
                    ->native(false)
                    ->required(),
                DatePicker::make('tanggal_gabung')
                    ->native(false)
                    ->required(),
                TextInput::make('kota_lahir')->required()->maxLength(255),
                TextInput::make('kelurahan')->required()->maxLength(255),
                TextInput::make('kecamatan')->required()->maxLength(255),
                TextInput::make('kode_pos')->required()->maxLength(255)->default('-')->label('Kode Pos'),
                TextInput::make('provinsi')->required()->maxLength(255)->label('Provinsi'),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable(),
                TextColumn::make('nama')->sortable()->searchable(),
                TextColumn::make('no_telepon')->sortable()->searchable(),
                TextColumn::make('no_whatsapp')->sortable()->searchable(),
                TextColumn::make('alamat')->limit(10),
                TextColumn::make('tipedonatur.nama')->sortable()->searchable()->label('Tipe Donatur'),
                TextColumn::make('statuskeanggotaan.nama')->sortable()->searchable()->label('Status Anggota'),
                TextColumn::make('tanggal_lahir')->sortable()->date(),
                TextColumn::make('tanggal_gabung')->sortable()->date(),
                TextColumn::make('kota_lahir')->sortable()->searchable(),
                TextColumn::make('kelurahan')->sortable()->searchable(),
                TextColumn::make('kecamatan')->sortable()->searchable(),
                TextColumn::make('kode_pos')
                    ->sortable()
                    ->searchable()
                    ->formatStateUsing(fn(string $state): string => $state ?: 'tidak ada'),
                TextColumn::make('provinsi')->sortable()->searchable(),
                TextColumn::make('created_at')->sortable()->label('dibuat sejak')->date('d F Y H:i:s'),
                TextColumn::make('updated_at')->sortable()->label('diubah sejak')->date('d F Y H:i:s'),
            ])
            ->filters([
                SelectFilter::make('tipe_donaturs_id')
                    ->label('tipe Donatur')
                    ->relationship('tipedonatur', 'nama'),
                SelectFilter::make('status_keanggotaans_id')
                    ->label('Status Anggota')
                    ->relationship('statuskeanggotaan', 'nama')

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
            'index' => Pages\ListDonaturs::route('/'),
            'create' => Pages\CreateDonatur::route('/create'),
            'edit' => Pages\EditDonatur::route('/{record}/edit'),
        ];
    }
}
