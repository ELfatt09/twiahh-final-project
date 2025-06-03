<?php

namespace App\Filament\Resources\ThreadSaveResource\Pages;

use App\Filament\Resources\ThreadSaveResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditThreadSave extends EditRecord
{
    protected static string $resource = ThreadSaveResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
