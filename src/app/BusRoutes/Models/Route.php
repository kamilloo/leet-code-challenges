<?php
declare(strict_types=1);

namespace App\BusRoutes\Models;

class Route
{
    private array $vertices;
    private array $adjacency_list;
    private int $start;

    public function __construct(int $start)
    {
        $this->start = $start;
        $this->vertices[] = $start;
    }

    public function addStop(int $stop):void{
        $this->vertices[] = $stop;
        $this->adjacency_list[$this->last()] = $stop;
        $this->adjacency_list[$stop] = $this->start;
    }

    /**
     * @return int
     */
    public function length(): int
    {
        return count($this->vertices);
    }

    public function print():string{
        return implode('', $this->vertices);
    }

    /**
     * @return int
     */
    private function last(): int
    {
        return $this->length() - 1;
    }

    public function getVertices(): array
    {
        return $this->vertices;
    }


    public function hasStop(int $stop):bool
    {
        return in_array($stop, $this->vertices);
    }

    public function nextStop(int $node):int
    {
        $number_of_stop = array_search($node, $this->vertices);
        if ($number_of_stop == $this->last()){
            return $this->start;
        }
        return $this->vertices[$number_of_stop + 1];


    }

}