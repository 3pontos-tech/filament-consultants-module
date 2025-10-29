<?php

namespace TresPontosTech\Consultant\Core\Enums;

use Filament\Support\Colors\Color;
use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum ConsultantIntegrationProvider: string implements HasColor, HasLabel
{
    case GoHighLevel = 'gohighlevel';

    public function getColor(): array
    {
        return match ($this) {
            self::GoHighLevel => Color::Green,
        };
    }

    public function getLabel(): string
    {
        return match ($this) {
            self::GoHighLevel => 'Go High Level',
        };
    }
}
