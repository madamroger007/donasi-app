<?php

namespace App\Filament\Resources\StatusKeanggotaanResource\Pages;

use App\Filament\Resources\StatusKeanggotaanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditStatusKeanggotaan extends EditRecord
{
    protected static string $resource = StatusKeanggotaanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
