<?php
declare(strict_types=1);

namespace Tests\Query7\Clause;

use PHPUnit\Framework\TestCase;
use Query7\Clause\GroupByHavingInterface;
use Query7\Clause\GroupByHavingTrait;

class GroupByHavingTest extends TestCase
{

    public function createGroupByHaving(): GroupByHavingInterface
    {
        return new class implements GroupByHavingInterface {
            use GroupByHavingTrait;
            public function __toString(): string
            {
                return $this->generateGroupByHaving();
            }
        };
    }

    public function testEmptyGroupByHaving(): void
    {
        $group = $this->createGroupByHaving();
        $this->assertEquals($group->generateGroupByHaving(), "");
        $this->assertEquals($group->isValidGroupByHaving(), true);
    }

    public function testHavingAndNoGroupBy(): void
    {
        $group = ($this->createGroupByHaving())->having("hello");
        $this->assertEquals($group->generateGroupByHaving(), "");
        $this->assertEquals($group->isValidGroupByHaving(), false);
    }
}
