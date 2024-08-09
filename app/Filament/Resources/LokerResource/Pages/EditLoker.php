<?php

namespace App\Filament\Resources\LokerResource\Pages;

use App\Models\Loker;
use Filament\Actions;
use Illuminate\Support\Facades\Storage;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\LokerResource;

class EditLoker extends EditRecord
{
    protected static string $resource = LokerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()->after(
                function(Loker $record) {
                    if($record->thumbnail){
                        Storage::disk('public')->delete($record->thumbnail);
                    }
                }
            ),
        ];
    }
}
