<?php

namespace App\Filament\Resources\TipeDonaturResource\Pages;

use App\Filament\Resources\TipeDonaturResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTipeDonatur extends EditRecord
{
    protected static string $resource = TipeDonaturResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
