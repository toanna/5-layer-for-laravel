<?php

namespace Toanna\Laravel5Layer\Console;

use Illuminate\Foundation\Console\RequestMakeCommand as Command;


class RequestMakeCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = '5l:request';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new Form Request Class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = '5l request';

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\Representation\Http\Requests';
    }
}
