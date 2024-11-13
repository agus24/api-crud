<?php
namespace ApiCrud\ApiCrud\Libraries;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class StubBuilder
{
    private array $stubArguments;
    private array $imports;

    public function __construct(
        private string $stubFile,
        private string $destination,
    ) {}

    public function build()
    {
        $contents = File::get($this->stubFile);
        $this->generateImports();

        foreach ($this->stubArguments as $variable => $value) {
            $contents = Str::of($contents)->replace("{{ $variable }}", $value);
        }

        File::put($this->destination, $contents);
    }

    public function addArguments($name, $value)
    {
        $this->stubArguments[$name] = $value;

        return $this;
    }

    public function addImport($value)
    {
        $this->imports[] = $value;

        return $this;
    }

    public function generateImports()
    {
        $output = [];
        foreach ($this->imports as $import) {
            $output[] = "use {$import};";
        }

        $this->stubArguments["extraImport"] = implode("\n", $output);
        return $this;
    }
}
