<?php

namespace Toanna\Laravel5Layer\Console;

use Illuminate\Foundation\Console\ConsoleMakeCommand as Command;

class ConsoleMakeCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = '5l:command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new Artisan Command';

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = '5l:command';

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\Representation\Console\Commands';
    }
}
