<?php

namespace App\Filament\Resources\BentukDonasiResource\Pages;

use App\Filament\Resources\BentukDonasiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBentukDonasi extends EditRecord
{
    protected static string $resource = BentukDonasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
