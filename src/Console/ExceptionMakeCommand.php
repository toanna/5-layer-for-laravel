<?php

namespace Toanna\Laravel5Layer\Console;

use Illuminate\Console\GeneratorCommand;

class ExceptionMakeCommand extends GeneratorCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = '5l:exception';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new custom Exception Class';

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = '5l:exception {name}';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = '5l exception';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__ . '/stubs/exception.stub';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Common\Exceptions';
    }
}
