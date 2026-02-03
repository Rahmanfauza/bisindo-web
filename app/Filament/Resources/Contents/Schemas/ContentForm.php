<?php

namespace App\Filament\Resources\Contents\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ContentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                Textarea::make('description')
                    ->default(null)
                    ->columnSpanFull(),
                TextInput::make('video_url')
                    ->url()
                    ->default(null),
                TextInput::make('category')
                    ->required(),
                TextInput::make('thumbnail')
                    ->default(null),
            ]);
    }
}
