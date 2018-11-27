<?php

namespace Toanna\Laravel5Layer\Console;

use Illuminate\Console\GeneratorCommand;

class DependencyMakeCommand extends GeneratorCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = '5l:dependency';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new Dependency Class';

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = '5l:dependency {name}';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = '5l dependency';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__ . '/stubs/dependency.stub';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Dependency';
    }
}
