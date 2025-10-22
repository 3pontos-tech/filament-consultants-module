<?php

namespace TresPontosTech\Consultant\Commands;

use Illuminate\Console\Command;

class ConsultantCommand extends Command
{
    public $signature = 'filament-consultants-module';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
