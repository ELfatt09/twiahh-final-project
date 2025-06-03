<?php

namespace App\Filament\Resources\ThreadSaveResource\Pages;

use App\Filament\Resources\ThreadSaveResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListThreadSaves extends ListRecords
{
    protected static string $resource = ThreadSaveResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
