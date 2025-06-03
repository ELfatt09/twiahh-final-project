<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FollowResource\Pages;
use App\Filament\Resources\FollowResource\RelationManagers;
use App\Models\Follow;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FollowResource extends Resource
{
    protected static ?string $model = Follow::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->options(User::all()->pluck('email', 'id'))
                    ->searchable()
                    ->required(),
                Forms\Components\Select::make('follow_id')
                    ->options(User::all()->pluck('email', 'id'))
                    ->searchable()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user_id')
                    ->label('Follower')
                    ->formatStateUsing(function (int $state): string {
                        return User::find($state)?->email ?? '-';
                    })
                    ->sortable(),
                Tables\Columns\TextColumn::make('follow_id')
                    ->label('Following')
                    ->formatStateUsing(function (int $state): string {
                        return User::find($state)?->email ?? '-';
                    })
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFollows::route('/'),
            'create' => Pages\CreateFollow::route('/create'),
            'edit' => Pages\EditFollow::route('/{record}/edit'),
        ];
    }
}
