<?php

namespace Toanna\Laravel5Layer\Console;

use Illuminate\Console\GeneratorCommand;

class AbstractionMakeCommand extends GeneratorCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = '5l:abstraction';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new Abstraction Interface';

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = '5l:abstraction';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__ . '/stubs/abstraction.stub';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Abstraction';
    }
}
