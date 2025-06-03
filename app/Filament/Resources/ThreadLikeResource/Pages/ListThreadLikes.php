<?php

namespace App\Filament\Resources\ThreadLikeResource\Pages;

use App\Filament\Resources\ThreadLikeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListThreadLikes extends ListRecords
{
    protected static string $resource = ThreadLikeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
