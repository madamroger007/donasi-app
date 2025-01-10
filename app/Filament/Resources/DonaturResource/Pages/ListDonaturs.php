<?php

namespace App\Filament\Resources\DonaturResource\Pages;

use App\Filament\Resources\DonaturResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDonaturs extends ListRecords
{
    protected static string $resource = DonaturResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
