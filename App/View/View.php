<?php
namespace App\View;

class View
{
    public $storage = [];


    public function assign(string $name, $value): View
    {
        $this->storage[$name] = $value;
        return $this;
    }

    public function render(string $template): string
    {
        ob_start();
        $this->display($template);
        $result = ob_get_contents();
        ob_end_clean();

        return $result;
    }


    public function display(string $templatePath): void
    {
        foreach ($this->storage as $varName => $value) {
            $$varName = $value;
        }
        include $templatePath;
    }
}
