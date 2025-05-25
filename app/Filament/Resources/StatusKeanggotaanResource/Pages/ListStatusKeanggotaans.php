<?php

namespace App\Filament\Resources\StatusKeanggotaanResource\Pages;

use App\Filament\Resources\StatusKeanggotaanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListStatusKeanggotaans extends ListRecords
{
    protected static string $resource = StatusKeanggotaanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Tambah Status Keanggotaan'),
        ];
    }
}
