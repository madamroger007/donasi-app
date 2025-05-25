<?php

namespace App\Filament\Resources\DonaturResource\Pages;

use App\Filament\Resources\DonaturResource;
use App\Models\Donatur;
use Barryvdh\DomPDF\Facade\Pdf;
use Filament\Actions\Action;
use Filament\Resources\Pages\ListRecords;
use Filament\Actions;
use Smalot\PdfParser\Parser;
use Filament\Forms\Components\FileUpload;
use Illuminate\Support\Facades\Log;


class ListDonaturs extends ListRecords
{
    protected static string $resource = DonaturResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Tambah Donatur'),
            Action::make('Export PDF')
                ->label('Export PDF')
                ->icon('heroicon-o-document-arrow-down')
                ->action(function () {
                    $donaturs = Donatur::with(['tipedonatur', 'statuskeanggotaan'])->get();
                    $pdf = Pdf::loadView('exports.donaturs', ['donaturs' => $donaturs])->setPaper('a4', 'landscape');
                    return response()->streamDownload(
                        fn() => print($pdf->stream()),
                        'donaturs.pdf'
                    );
                }),
        ];
    }
}
