<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class MakeServiceCommand extends Command
{
    protected $signature = 'make:service {name}';
    protected $description = 'Tạo một Service mới trong app/Services hoặc app/Domains/{Module}/Services';

    public function handle()
    {
        $name = $this->argument('name');

        $parts = explode('/', $name);
        $serviceName = array_pop($parts);
        $modulePath = implode('/', $parts);

        $directory = app_path("Domains/{$modulePath}/Services");
        $path = "{$directory}/{$serviceName}.php";

        if (file_exists($path)) {
            $this->error("Service {$serviceName} đã tồn tại!");
            return;
        }

        $stub = <<<PHP
<?php

namespace App\Domains\\{$modulePath}\Services;

class {$serviceName}
{
    public function __construct()
    {
        //
    }
}
PHP;

        (new Filesystem())->ensureDirectoryExists($directory);
        file_put_contents($path, $stub);

        $this->info("Service {$serviceName} đã được tạo tại Domains/{$modulePath}/Services!");
    }
}
