<?php
namespace Toanna\Laravel5Layer\Console;

use Illuminate\Console\Command;
use Illuminate\Console\DetectsApplicationNamespace;

class InitializeCommand extends Command
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
    protected $description = 'Init 5-layer folder structure';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = '5l init';

    /**
     * Reset database configuration.
     */
    public function handle()
    {
        if ($this->confirm('Your default structure will be changed, some files may lost while changing directories, are you sure to run?')) {
            $appDirectory = $this->getAppPath();
            $existFilesToMove = $this->existFilesToMove();
            $baseAppNamespace = $this->getAppNamespace();
            $bootstrapApp = $this->getBasePath().'/bootstrap/app.php';
            $routeProvider = $this->getBasePath().'/app/Providers/RouteServiceProvider.php';

            // STEP 1: Make folder structure
            if (!is_dir($appDirectory)) {
                mkdir($appDirectory);
            }
            $this->parseAndMakeDirRecursive($appDirectory, $this->getFolderStructure());

            // STEP 2: Move exist files to new folder & rename Namespace
            foreach ($existFilesToMove as $source => $destination) {
                $sourceFullDir = $appDirectory . '/' . $source;
                $destinationFullDir = $appDirectory . '/' . $destination;
                $this->copyFolderAndFilesRecursive($sourceFullDir, $destinationFullDir);
                $this->removeFolderAndFilesRecursive($sourceFullDir);
                $this->renameNamespaceRecursive($destinationFullDir, $baseAppNamespace.$source, $baseAppNamespace.str_replace('/', '\\', $destination));
            }

            // STEP 3: Modify bootstrap/app.php
            foreach ($existFilesToMove as $source => $destination) {
                $this->renameNamespaceRecursive($bootstrapApp, $baseAppNamespace.str_replace('/', '\\', $source), $baseAppNamespace.str_replace('/', '\\', $destination));
            }

            // STEP 4: Modify Providers/RouteServiceProvider.php
            foreach ($existFilesToMove as $source => $destination) {
                $this->renameNamespaceRecursive($routeProvider, $baseAppNamespace.str_replace('/', '\\', $source), $baseAppNamespace.str_replace('/', '\\', $destination));
            }

            // STEP 5: Extend handles
            $this->extendHandle();

            // FINAL
            $this->line('Success initialization.');
        }
    }

    /**
     * MATERIALS
     */

    use DetectsApplicationNamespace;

    protected function getFolderStructure()
    {
        return [
            'Abstraction' => [
                'ExternalServiceInterface' => [],
                'RepositoryInterface' => []
            ],
            'Business' => [],
            'BusinessService' => [],
            'Common' => [
                'CircuitBreaker' => [],
                'DomainModels' => [],
                'Exceptions' => [],
                'ExternalConfig' => [],
                'Logging' => []
            ],
            'Dependency' => [
                'ExternalServices' => [],
                'Repositories' => []
            ],
            'Providers' => [],
            'Representation' => [
                'Console' => [],
                'Http' => [
                    'Controllers' => [
                        'Api' => []
                    ],
                    'Middleware' => []
                ]
            ]
        ];
    }

    protected function existFilesToMove()
    {
        return [
            'Console' => 'Representation/Console',
            'Http' => 'Representation/Http',
            'Exceptions' => 'Common/Exceptions',
        ];
    }

    protected function getBasePath()
    {
        return base_path();
    }

    protected function getAppPath()
    {
        return app_path();
    }

    /**
     * FILE HANDLERS
     */

    protected function parseAndMakeDirRecursive($baseDirectory, array $folders)
    {
        foreach ($folders as $folderName => $folderDirectories) {
            $currentFolder = "$baseDirectory/$folderName";
            if (!is_dir($currentFolder)) {
                mkdir($currentFolder);
            }
            if (is_array($folderDirectories) && count($folderDirectories) > 0) {
                $this->parseAndMakeDirRecursive($currentFolder, $folderDirectories);
            }
        }
    }

    protected function removeFolderAndFilesRecursive($directory)
    {
        if (is_dir($directory)) {
            $files = scandir($directory);
            foreach ($files as $file) {
                if ($file != "." && $file != "..") {
                    $this->removeFolderAndFilesRecursive("$directory/$file");
                }
            }
            rmdir($directory);
        } elseif (file_exists($directory)) {
            unlink($directory);
        }
    }

    protected function copyFolderAndFilesRecursive($from, $to)
    {
        if (is_dir($from)) {
            if (file_exists($to)) {
                $this->removeFolderAndFilesRecursive($to);
            }
            @mkdir($to);
            $files = scandir($from);
            foreach ($files as $file) {
                if ($file != "." && $file != "..") {
                    $this->copyFolderAndFilesRecursive("$from/$file", "$to/$file");
                }
            }
        } elseif (file_exists($from)) {
            copy($from, $to);
        }
    }

    protected function renameNamespaceRecursive($basePath, $from, $to)
    {
        if (is_dir($basePath)) {
            $files = scandir($basePath);
            foreach ($files as $file) {
                if ($file != "." && $file != "..") {
                    $this->renameNamespaceRecursive("$basePath/$file", $from, $to);
                }
            }
        } elseif (file_exists($basePath)) {
            $tempContent = file_get_contents($basePath);
            $newContent = str_replace($from, $to, $tempContent);
            file_put_contents($basePath, $newContent);
        }
    }

    /**
     * EXTEND HANDLE
     */

    protected function extendHandle()
    {

    }
}