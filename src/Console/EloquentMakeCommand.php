<?php

namespace Toanna\Laravel5Layer\Console;

use Illuminate\Console\GeneratorCommand;

class EloquentMakeCommand extends GeneratorCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = '5l:eloquent';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new Eloquent ORM Class';

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = '5l:eloquent';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__ . '/stubs/eloquent.stub';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Dependency\Repositories\Sql\Eloquent';
    }
}
