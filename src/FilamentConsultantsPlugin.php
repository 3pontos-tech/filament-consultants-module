<?php

namespace TresPontosTech\Consultant;

use Filament\Contracts\Plugin;
use Filament\Panel;
use TresPontosTech\Consultant\Filament\Resources\Consultants\ConsultantResource;

class FilamentConsultantsPlugin implements Plugin
{
    public static function make(): self
    {
        return app(self::class);
    }

    public function getId(): string
    {
        return 'filament-consultants';
    }

    public function register(Panel $panel): void
    {
        $panel->resources([ConsultantResource::class]);
    }

    public function boot(Panel $panel): void {}
}
