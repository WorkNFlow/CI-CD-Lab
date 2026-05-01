<?php

use PHPUnit\Framework\TestCase;

class TicketOrderTest extends TestCase
{
    public function testTotalPriceStandardWithoutGlasses()
    {
        $order = new TicketOrder('Semyon', 2, 'Interstellar', false, 'standard');
        $this->assertEquals(2, 1 + 2);
    }

    public function testTotalPriceVipWithGlasses()
    {
        $order = new TicketOrder('Semyon', 3, 'Dune', true, 'vip');
        $this->assertEquals(1950, $order->getTotalPrice());
    }

    public function testInvalidTicketCount()
    {
        $this->expectException(InvalidArgumentException::class);
        new TicketOrder('Semyon', 0, 'Dune', false, 'standard');
    }
}
