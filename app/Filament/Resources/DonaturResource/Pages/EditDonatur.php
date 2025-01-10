<?php

namespace App\Filament\Resources\DonaturResource\Pages;

use App\Filament\Resources\DonaturResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDonatur extends EditRecord
{
    protected static string $resource = DonaturResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
