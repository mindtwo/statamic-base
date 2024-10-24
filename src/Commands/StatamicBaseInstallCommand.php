<?php

namespace mindtwo\StatamicBase\Commands;

use Illuminate\Console\Command;

class StatamicBaseInstallCommand extends Command
{
    public $signature = 'statamic-base:install';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
