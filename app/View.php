<?php

namespace App;

class View
{
    /**
     * @var string
     */
    private $template;

    public function __construct(string $template)
    {
        $this->template = $template;
    }

    public function render(string $data): string
    {
        $file = file_get_contents($this->template);

        if (!$file) {
            throw new \RuntimeException('Cannot load template');
        }

        return str_replace('%data%', $data, $file);
    }
}