<?php

namespace Toanna\Laravel5Layer\Console;

use Illuminate\Foundation\Console\ResourceMakeCommand as Command;


class ResourceMakeCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = '5l:resource';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new Resource';

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = '5l:resource {name}';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = '5l resource';

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\Representation\Http\Resources';
    }
}
