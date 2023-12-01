<?php
declare(strict_types=1);

namespace App\BusRoutes;

use App\BusRoutes\Models\Bus;

/**
 * @property-read Bus[] $buses
 */
class BusPlanner
{

    /**
     * @param  Bus[]  $buses
     */
    public function __construct(
        private readonly array $buses
    ) {
    }

    public function plan(int $source, int $target):array{
        //build graph
        //find path
        $map_buses_to_stops = array_map($this->extractBusStops(), $this->buses);
        $vertices = array_unique(array_merge(...$map_buses_to_stops));
        $adjacency_list = [];
        foreach ($vertices as $node){
            $adjacency_node = [];
            foreach ($this->buses as $bus){
                if($bus->route->hasStop($node)){
                    $adjacency_list[] = $bus->route->nextStop($node);
                }
            }
            $adjacency_list[$node] = $adjacency_node;
        }





        return [-1];
    }

    /**
     * @return \Closure
     */
    private function extractBusStops(): \Closure
    {
        return fn(Bus $bus) => $bus->route->getVertices();
    }
}