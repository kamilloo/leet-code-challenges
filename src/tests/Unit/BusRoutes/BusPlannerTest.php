<?php
declare(strict_types=1);

namespace Tests\Unit\BusRoutes;

use App\BusRoutes\BusPlanner;
use App\BusRoutes\Models\Bus;
use App\BusRoutes\Models\Route;
use PHPUnit\Framework\TestCase;

class BusPlannerTest extends TestCase
{
    /**
     * @test
     */
    public function plan_whenPathExist_getBusesCount():void{

        $routeA = new Route(1);
        $busA = new Bus('A', $routeA);
        $routeB = new Route(10);
        $busB = new Bus('B', $routeB);

        $planner = new BusPlanner([$busA, $busB]);
        $buses_count = $planner->plan(1,10);
        $this->assertSame(['A', 'B'], $buses_count);
    }

    /**
     * @test
     */
    public function plan_whenPathNotExist_getMinusOne():void{

        $routeA = new Route(1);
        $busA = new Bus('A', $routeA);
        $routeB = new Route(10);
        $busB = new Bus('B', $routeB);

        $planner = new BusPlanner([$busA, $busB]);
        $buses_count = $planner->plan(1,10);
        $this->assertSame([-1], $buses_count);
    }
}