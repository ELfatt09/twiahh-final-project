<?php

namespace App\Filament\Resources\ThreadLikeResource\Pages;

use App\Filament\Resources\ThreadLikeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditThreadLike extends EditRecord
{
    protected static string $resource = ThreadLikeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
