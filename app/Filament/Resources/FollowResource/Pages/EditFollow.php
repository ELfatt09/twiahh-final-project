<?php

namespace App\Filament\Resources\FollowResource\Pages;

use App\Filament\Resources\FollowResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFollow extends EditRecord
{
    protected static string $resource = FollowResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
