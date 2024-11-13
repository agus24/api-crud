<?php

namespace ApiCrud\ApiCrud\Commands;

use ApiCrud\ApiCrud\Libraries\StubBuilder;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;

class ApiCrudCommand extends Command
{
    public $signature = 'crud:generate {model}';

    public $description = 'Generate Crud Api';

    private string $model;

    private string $modelPath;

    private string $modelNamespace;

    public function handle(): int
    {
        $this->model = $this->argument('model');
        $this->getModelClassNamespace($this->argument('model'));

        $this->generateLaravelBasicClass();

        return self::SUCCESS;
    }

    private function getModelClassNamespace()
    {
        $basePath = base_path();

        $modelPath = app_path('models/'.$this->model);
        $modelNamespace = Str::of($modelPath)->explode($basePath.'/')[1];
        $modelNamespace = Str::of($modelNamespace)->replace('models', 'Models')->replace('/', '\\')->value;

        $this->modelNamespace = $modelNamespace;
        $this->modelPath = $modelPath;
    }

    private function generateLaravelBasicClass()
    {
        Artisan::call("make:request {$this->model}StoreRequest");
        Artisan::call("make:request {$this->model}UpdateRequest");
        Artisan::call("make:resource {$this->model}Resource");
        $this->generateController();
    }

    private function generateController()
    {
        $controllerFolder = base_path('app/Http/Controllers');
        $model = $this->model;

        $camelCaseModel = Str::of($this->model)->camel();
        $storeRequestName = "{$model}StoreRequest";
        $updateRequestName = "{$model}UpdateRequest";
        $serviceName = "{$model}Service";

        $stubBuilder = new StubBuilder(
            __DIR__.'/../../stubs/controller.stub',
            $controllerFolder."/{$this->model}Controller.php"
        );

        $stubBuilder->addArguments('namespace', 'App\\Http\\Controllers')
            ->addArguments('rootNamespace', 'App\\')
            ->addArguments('class', "{$model}Controller")
            ->addArguments('storeRequestName', $storeRequestName)
            ->addArguments('updateRequestName', $updateRequestName)
            ->addArguments('modelClass', $model)
            ->addArguments('model', '$'.$camelCaseModel)
            ->addArguments('service', $serviceName)
            ->addArguments('serviceVariable', '$'.'service')
            ->addImport("App\\Http\\Requests\\$storeRequestName")
            ->addImport("App\\Http\\Requests\\$updateRequestName")
            ->addImport("App\\Services\\$serviceName")
            ->build();
    }
}
