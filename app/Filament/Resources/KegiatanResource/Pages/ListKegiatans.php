<?php

namespace App\Filament\Resources\KegiatanResource\Pages;

use App\Filament\Resources\KegiatanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKegiatans extends ListRecords
{
    protected static string $resource = KegiatanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Tambah Kegiatan'),
            Actions\Action::make('export_pdf')
                ->label('Export PDF')
                ->icon('heroicon-o-document-arrow-down')
                ->action(function () {
                    // Ambil data kegiatan
                    $kegiatans = \App\Models\Kegiatan::all();

                    // Generate PDF menggunakan dompdf atau package lain
                    $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('exports.kegiatans', ['kegiatans' => $kegiatans])->setPaper('a4', 'landscape');

                    // Download file PDF
                    return response()->streamDownload(function () use ($pdf) {
                        echo $pdf->output();
                    }, 'kegiatan.pdf');
                }),
        ];
    }
}
