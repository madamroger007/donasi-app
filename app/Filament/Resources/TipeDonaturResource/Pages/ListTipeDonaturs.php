<?php

namespace App\Filament\Resources\TipeDonaturResource\Pages;

use App\Filament\Resources\TipeDonaturResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTipeDonaturs extends ListRecords
{
    protected static string $resource = TipeDonaturResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Tambah Tipe Donatur'),
        ];
    }
}
