<?php
declare(strict_types=1);

namespace App\SeatReservation;

class SeatManager
{
    private $seats_reservation = [];
    private int $seat_numbers;

    public function __construct(int $seat_numbers)
    {
        $this->seat_numbers = $seat_numbers;

    }

    public function reserve():int{
        if (count($this->seats_reservation) < $this->seat_numbers){
            sort($this->seats_reservation);
            for ($i = 1;$i<=$this->seat_numbers;$i++){
                if (!in_array($i, $this->seats_reservation)){
                    $this->seats_reservation[] = $i;
                    return $i;
                }
            }
        }
        throw new \RuntimeException("Seats full");
    }

    public function unreserve(int $seatNumber):void{
        if ($seatNumber < $this->seat_numbers ){
            $key = array_search($seatNumber, $this->seats_reservation);
            if ($key !== false){
                unset($this->seats_reservation[$key]);
            }
        }
    }
}