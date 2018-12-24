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
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = '5l command';

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
