<?php
declare(strict_types=1);

namespace Tests\Query7\Clause;

use PHPUnit\Framework\TestCase;
use Query7\Clause\LimitInterface;
use Query7\Clause\LimitTrait;

class LimitTest extends TestCase
{

    /**
     * @return LimitInterface
     */
    protected function createLimit(): LimitInterface
    {
        return new class implements LimitInterface {
            use LimitTrait;
            public function __toString(): string
            {
                return $this->generateLimit();
            }
        };
    }

    public function testEmptyLimit(): void
    {
        $limit = $this->createLimit();
        $sql = "";
        $this->assertEquals($sql, $limit);
        $this->assertEquals($limit->isValidLimit(), true);
    }

    public function testLimitMax(): void
    {
        $limit = $this->createLimit();
        $limit->limit(5);
        $sql = "LIMIT 5";
        $this->assertEquals($sql, $limit);
    }

    public function testLimitMinAndMax(): void
    {
        $limit = $this->createLimit();
        $limit->limit(5, 10);
        $sql = "LIMIT 5, 10";
        $this->assertEquals($sql, $limit);
        $this->assertEquals($limit->isValidLimit(), true);
    }

    public function testLimitMinAndMaxInversed(): void
    {
        $limit = $this->createLimit();
        $limit->limit(10, 5);
        $sql = "LIMIT 10, 5";
        $this->assertEquals($sql, $limit);
        $this->assertEquals($limit->isValidLimit(), true);
    }

    public function testInvalidLimit(): void
    {
        $limit = $this->createLimit();
        $limit->offset(5);
        $sql = "";
        $this->assertEquals($sql, $limit);
        $this->assertEquals($limit->isValidLimit(), false);
    }

    public function testMultipleSet(): void
    {
        $limit = $this->createLimit();
        $limit->limit(5);
        $sql = "LIMIT 5";
        $this->assertEquals($sql, $limit);

        $limit->offset(2);
        $sql = "LIMIT 2, 5";
        $this->assertEquals($sql, $limit);

        $limit->limit(20, 30);
        $sql = "LIMIT 20, 30";
        $this->assertEquals($sql, $limit);
    }

    public function testZeroLimit(): void
    {
        $limit = $this->createLimit();
        $limit->limit(0);
        $sql = "";
        $this->assertEquals($sql, $limit);
    }

    public function testNegativeLimit(): void
    {
        $limit = $this->createLimit();
        $limit->limit(-5);
        $sql = "";
        $this->assertEquals($sql, $limit);
    }

    public function testZeroOffset(): void
    {
        $limit = $this->createLimit();
        $limit->offset(0);
        $sql = "";
        $this->assertEquals($sql, $limit);
        $this->assertEquals($limit->isValidLimit(), true);
    }

    public function testNegativeOffset(): void
    {
        $limit = $this->createLimit();
        $limit->offset(-5);
        $sql = "";
        $this->assertEquals($sql, $limit);
        $this->assertEquals($limit->isValidLimit(), true);
    }

    public function testZeroOffsetAndMax(): void
    {
        $limit = $this->createLimit();
        $limit->offset(9);
        $this->assertEquals("", $limit);
        $this->assertEquals($limit->isValidLimit(), false);

        $limit->limit(0, 8);
        $sql = "LIMIT 8";
        $this->assertEquals($sql, $limit);
        $this->assertEquals($limit->isValidLimit(), true);
    }

    public function testRemoveLimitMax(): void
    {
        $limit = $this->createLimit();
        $limit->limit(5, 10);
        $limit->limit(0);
        $sql = "";
        $this->assertEquals($sql, $limit);
        $this->assertEquals($limit->isValidLimit(), false);
    }

    public function testRemoveOffset(): void
    {
        $limit = $this->createLimit();
        $limit->limit(5, 10);
        $limit->offset(-9);
        $sql = "LIMIT 10";
        $this->assertEquals($sql, $limit);
        $this->assertEquals($limit->isValidLimit(), true);
    }
}
