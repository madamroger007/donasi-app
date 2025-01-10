<?php

namespace App\Filament\Resources\BentukDonasiResource\Pages;

use App\Filament\Resources\BentukDonasiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBentukDonasis extends ListRecords
{
    protected static string $resource = BentukDonasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
