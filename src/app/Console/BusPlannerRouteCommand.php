<?php
declare(strict_types=1);

namespace App\Console;

use App\BusRoutes\BusPlanner;
use App\BusRoutes\Models\Bus;
use App\BusRoutes\Models\Route;

class BusPlannerRouteCommand
{
    /**
     * @param Integer[][] $routes
     * @param Integer $source
     * @param Integer $target
     * @return Integer
     */
    function numBusesToDestination($routes, $source, $target) {

        $buses = [];
        foreach($routes as $name => $route){
            $bus_name = "BUS_" .$name;
            foreach($route as $next => $stop){
                if($next === 0){
                    $bus_route = new Route($stop);
                }else{
                    $bus_route->addStop($stop);
                }
            }
            $buses[] = new Bus($bus_name, $bus_route);
        }

        $planner = new BusPlanner($buses);
        $buses_count = $planner->plan($source,$target);

        if($buses_count[0] == -1){
            return -1;
        }

        return count($buses_count) ?: -1 ;
    }

}