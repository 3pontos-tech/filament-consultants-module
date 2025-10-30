<?php

namespace TresPontosTech\Consultant\Filament\Resources\Consultants\Schemas;

use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ConsultantForm
{
    public static function configure(Schema $schema): Schema
    {
        $defaultSocialLinks = [
            'facebook' => '',
            'linkedin' => '',
            'instagram' => '',
            'twitter' => '',
            'youtube' => '',
            'tiktok' => '',
        ];
        return $schema
            ->components([
                TextInput::make('provider')
                    ->disabled(),
                TextInput::make('provider_id')
                    ->disabled(),
                TextInput::make('name')
                    ->required(),
                TextInput::make('slug')
                    ->required(),
                TextInput::make('phone')
                    ->tel()
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),
                TextInput::make('short_description')
                    ->columnSpanFull()
                    ->required(),
                RichEditor::make('biography')
                    ->required()
                    ->columnSpanFull(),
                RichEditor::make('readme')
                    ->required()
                    ->columnSpanFull(),
                KeyValue::make('socials_urls')
                    ->required()
                    ->label('Socials')
                    ->keyLabel('Social')
                    ->addable(false)
                    ->editableKeys(false)
                    ->deletable(false)
                    ->default($defaultSocialLinks)
                    ->formatStateUsing(fn ($state) => empty($state) ? $defaultSocialLinks : $state)
                    ->columnSpanFull(),
            ]);
    }
}
