<?php

namespace Toanna\Laravel5Layer\Console;

use Illuminate\Console\GeneratorCommand;

class ApiControllerMakeCommand extends GeneratorCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = '5l:api_controller';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new API Controller Class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = '5l api_controller';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__ . '/stubs/controller.stub';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Representation\Http\Controllers\Api';
    }
}
