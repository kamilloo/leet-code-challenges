<?php
declare(strict_types=1);

namespace App\BusRoutes\Models;

readonly class Bus
{
    public Route $route;
    public string $symbol;

    public function __construct(string $symbol, Route $route)
    {
        $this->route = $route;
        $this->symbol = $symbol;
    }


}