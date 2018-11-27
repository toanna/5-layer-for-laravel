<?php

namespace Toanna\Laravel5Layer\Console;

use Illuminate\Console\GeneratorCommand;

class BusinessMakeCommand extends GeneratorCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = '5l:business';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new Business Logic Class';

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = '5l:business';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__ . '/stubs/business.stub';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Business';
    }
}
