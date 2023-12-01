<?php
declare(strict_types=1);

namespace Tests\Unit\SeatReservation;

use App\SeatReservation\SeatManager;
use PHPUnit\Framework\TestCase;

class SeatManagerTest extends TestCase
{
    /** @test */
    public function reserve_whenAllSeatsFree_getReserved(){
        $seat_manager = new SeatManager(5);

        $reserved = $seat_manager->reserve();

        $this->assertSame(1, $reserved);
    }

    /** @test */
    public function reserve_whenFreeSeatExists_getReserved(){
        $seat_manager = new SeatManager(5);

        $seat_manager->reserve();
        $seat_manager->reserve();
        $seat_manager->reserve();
        $seat_manager->unreserve(2);
        $reserved = $seat_manager->reserve();


        $this->assertSame(2, $reserved);
    }

    /** @test */
    public function reserve_whenSeatsFull_throwException(){
        $seat_manager = new SeatManager(1);

        $reserved = $seat_manager->reserve();
        try {
            $reserved = $seat_manager->reserve();
        }catch (\RuntimeException $exception){
            $this->assertSame('Seats full', $exception->getMessage());
        }
    }

    /** @test */
    public function unreserve_whenSeatReserved_unReserved(){
        $seat_manager = new SeatManager(5);

        $reserved = $seat_manager->reserve();

        $seat_manager->unreserve($reserved);

        $this->assertSame(1, $reserved);
    }
}