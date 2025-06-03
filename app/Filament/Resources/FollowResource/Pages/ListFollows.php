<?php

namespace App\Filament\Resources\FollowResource\Pages;

use App\Filament\Resources\FollowResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFollows extends ListRecords
{
    protected static string $resource = FollowResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
