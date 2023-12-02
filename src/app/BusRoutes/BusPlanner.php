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
                    $adjacency_node[] = $bus->route->nextStop($node);
                }
            }
            $adjacency_list[$node] = $adjacency_node;
        }

        $source_index = array_search($source, $vertices);
        $queue = new \SplQueue();
        $visited = [];

        $this->dfs($source, $adjacency_list, $visited, $queue, $target);

        if ($queue->isEmpty()){
            return [-1];
        }

        $buses = [];
        $all_stops = [];
        while (!$queue->isEmpty()){
            $stop = $queue->dequeue();
            $all_stops[] = $stop;
            foreach ($this->buses as $bus){
                $stops  = $this->extractBusStops()($bus);
                if (in_array($stop, $stops)){
                    $buses[] = $bus->symbol;
                }
            }
        }
        if (!in_array($target, $all_stops)){
            return [-1];
        }
        return array_values(array_unique($buses));

    }

    /**
     * @return \Closure
     */
    private function extractBusStops(): \Closure
    {
        return fn(Bus $bus) => $bus->route->getVertices();
    }

    /**
     * @param  int  $source
     * @param $adjacency_list
     * @return void
     */
    public function dfs(int $source, $adjacency_list, array &$visited, \SplQueue &$queue, int $target): void
    {
        $visited[] = $source;
        $queue->enqueue($source);
        if ($source == $target){
            return;
        }
        foreach ($adjacency_list[$source] as $adj) {
            if (!in_array($adj, $visited)){
                $this->dfs($adj, $adjacency_list, $visited, $queue, $target);
            }
        }
    }
}