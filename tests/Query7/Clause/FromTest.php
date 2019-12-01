<?php
declare(strict_types=1);

namespace Tests\Query7\Clause;

use PHPUnit\Framework\TestCase;
use Query7\Clause\FromInterface;
use Query7\Clause\FromTrait;

class FromTest extends TestCase
{

    public function createFrom(): FromInterface
    {
        return new class implements FromInterface {
            use FromTrait;
            public function __toString(): string
            {
                return $this->generateFrom();
            }
        };
    }

    public function testEmptyFrom(): void
    {
        $from = $this->createFrom();
        $this->assertEquals($from->isValidFrom(), false);
    }

    public function testFromOnceTable(): void
    {
        $from = ($this->createFrom())->from("hello");
        $sql = "FROM hello";
        $this->assertEquals($from->generateFrom(), $sql);
        $this->assertEquals($from->isValidFrom(), true);
    }

    public function testFromAlias(): void
    {
        $from = ($this->createFrom())->from("hello", "h");
        $sql = "FROM hello AS h";
        $this->assertEquals($from->generateFrom(), $sql);
        $this->assertEquals($from->isValidFrom(), true);
    }

    public function testFromMultipleTable(): void
    {
        $from = ($this->createFrom())->from("hello", "h")->from("world");
        $sql = "FROM hello AS h, world";
        $this->assertEquals($from->generateFrom(), $sql);
        $this->assertEquals($from->isValidFrom(), true);
    }
}
