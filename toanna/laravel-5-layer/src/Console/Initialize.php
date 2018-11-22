<?php
namespace ToanNA\Laravel5Layer\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Str;

class Initialize extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = '5l:init';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Init folder structure';
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = '5l:init';
    /**
     * Reset database configuration.
     */
    public function handle()
    {

    }
}