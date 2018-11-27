<?php

namespace Toanna\Laravel5Layer\Console;

use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputOption;

class DomainModelMakeCommand extends GeneratorCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = '5l:domain_model';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new Domain Model Class';

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = '5l:domain_model {name}';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = '5l domain_model';

    /**
     * Replace the class name for the given stub.
     *
     * @param  string  $stub
     * @param  string  $name
     * @return string
     */
    protected function replaceClass($stub, $name)
    {
        $stub = parent::replaceClass($stub, $name);

        $stub = $this->replaceProperties($stub);
        $stub = $this->replaceInit($stub);
        $stub = $this->replaceMethods($stub);

        return $stub;
    }

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__ . '/stubs/domain-model.stub';
    }

    protected function replaceInit($stub)
    {
        $properties = $this->option('properties');
        $properties = explode(',', $properties);

        $propertiesReplace = '';
        $i                 = 0;
        $numProp           = count($properties);
        foreach ($properties as $property) {
            $property = trim($property, " ");
            if (++$i === $numProp) {
                $propertiesReplace .= sprintf("\$this->%s = isset(\$params['%s']) ?: null;" . str_repeat(' ', 8), $property, $property);
            } else {
                $propertiesReplace .= sprintf("\$this->%s = isset(\$params['%s']) ?: null;\n" . str_repeat(' ', 8), $property, $property);
            }
        }

        $stub = str_replace('{{init}}', $propertiesReplace, $stub);

        return $stub;
    }

    protected function replaceProperties($stub)
    {
        $properties = $this->option('properties');
        $properties = explode(',', $properties);

        $propertiesReplace = '';
        foreach ($properties as $property) {
            $property = trim($property, " ");
            $propertiesReplace .= sprintf("private \$%s;\n" . str_repeat(' ', 4), $property);
        }
        $stub = str_replace('{{properties}}', $propertiesReplace, $stub);

        return $stub;
    }

    protected function replaceMethods($stub)
    {
        $properties = $this->option('properties');
        $properties = explode(',', $properties);

        $methodsReplace = '';
        $i              = 0;
        $numProp        = count($properties);
        foreach ($properties as $property) {
            $property = trim($property, " ");
            $method   = ucfirst(camel_case($property));
            $methodsReplace .= sprintf(
                "public function set%s(\$%s)
    {
        \$this->%s = \$%s;
    }\n\n" . str_repeat(' ', 4),
                $method,
                $property,
                $property,
                $property
            );

            if (++$i === $numProp) {

                $methodsReplace .= sprintf(
                    "public function get%s()
    {
        return \$this->%s;
    }",
                    $method,
                    $property
                );

            } else {
                $methodsReplace .= sprintf(
                    "public function get%s()
    {
        return \$this->%s;
    }\n\n" . str_repeat(' ', 4),
                    $method,
                    $property
                );
            }
        }

        $stub = str_replace('{{methods}}', $methodsReplace, $stub);

        return $stub;
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Common\DomainModels';
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['properties', 'p', InputOption::VALUE_OPTIONAL, 'Attribute list, separated by commas.', 'id,created_at,update_at'],
        ];
    }
}
