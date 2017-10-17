<?php

namespace App;

use DI\Container;

class Application
{
    /**
     * @var Host
     */
    private $host;

    /**
     * @var View
     */
    private $view;

    /**
     * @var string
     */
    private $hostname;

    public function __construct(Container $container)
    {
        $this->host = $container->get(Host::class);
        $this->view = $container->get(View::class);
    }

    public function register(string $hostname)
    {
        $this->hostname = $hostname;
        $this->host->register($hostname);
    }

    public function run()
    {
        $hosts = $this->host->getHosts();
        $data = '';

        foreach ($hosts as $hostname => $count) {
            $color = ($hostname == $this->hostname) ? '3CB371' : 'fff';
            $data .= sprintf('<tr style="background-color: #%s"><td>%s</td><td>%d</td></tr>', $color, $hostname, $count);
        }

        echo $this->view->render($data);
    }
}