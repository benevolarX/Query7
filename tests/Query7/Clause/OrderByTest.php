<?php
declare(strict_types=1);

namespace Tests\Query7\Clause;

use PHPUnit\Framework\TestCase;
use Query7\Clause\OrderByInterface;
use Query7\Clause\OrderByTrait;

class OrderByTest extends TestCase
{

    /**
     * @return OrderByInterface
     */
    protected function createOrderBy(): OrderByInterface
    {
        return new class implements OrderByInterface {
            use OrderByTrait;
            public function __toString(): string
            {
                return $this->generateOrderBy();
            }
        };
    }

    public function testEmptyOrder(): void
    {
        $order = $this->createOrderBy();
        $sql = "";
        $this->assertEquals($sql, $order);
    }

    public function testOrderDesc(): void
    {
        $order = $this->createOrderBy();
        $order->orderBy("date", true);
        $sql = "ORDER BY date DESC";
        $this->assertEquals($sql, $order);
    }

    public function testOrderAsc(): void
    {
        $order = $this->createOrderBy();
        $order->orderBy("date", false);
        $sql = "ORDER BY date ASC";
        $this->assertEquals($sql, $order);
    }
}
