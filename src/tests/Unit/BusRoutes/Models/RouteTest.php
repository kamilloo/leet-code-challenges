<?php
declare(strict_types=1);

namespace Tests\Unit\BusRoutes\Models;

use App\BusRoutes\Models\Route;
use PHPUnit\Framework\TestCase;

class RouteTest extends TestCase
{
    /**
     * @test
     */
    public function addStop_whenNoStops_addFirst(){
        $route = new Route(1);
        $route->addStop(2);

        $this->assertSame('12', $route->print());
    }

    /**
     * @test
     */
    public function print_whenNoStops_getOnlyStart(){
        $route = new Route(1);

        $this->assertSame('1', $route->print());
    }

    /**
     * @test
     */
    public function print_whenHasStops_getPath(){
        $route = new Route(1);

        $this->assertSame('1', $route->print());
    }


    /**
     * @test
     */
    public function nextStop_whenHasNextStops_getNextStep(){

        $first_step = 1;
        $route = new Route($first_step);
        $next_step = 2;
        $route->addStop($next_step);

        $this->assertSame($next_step, $route->nextStop($first_step));
    }


    /**
     * @test
     */
    public function nextStop_whenHasNoNextStops_getStart(){

        $start = 1;
        $route = new Route($start);
        $next_step = 2;
        $route->addStop($next_step);

        $this->assertSame($start, $route->nextStop($next_step));
    }
}