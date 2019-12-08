<?php
declare(strict_types=1);

namespace Tests\Query7\Clause;

use PHPUnit\Framework\TestCase;
use Query7\Clause\JoinInterface;
use Query7\Clause\JoinTrait;

class JoinTest extends TestCase
{

    /**
     * @return JoinInterface
     */
    protected function createJoin(): JoinInterface
    {
        return new class implements JoinInterface {
            use JoinTrait;
            public function __toString(): string
            {
                return $this->generateJoin();
            }
        };
    }

    public function testEmptyJoin(): void
    {
        $join = $this->createJoin();
        $this->assertEquals("", $join->generateJoin());
    }

    public function testInnerJoin(): void
    {
        $join = $this->createJoin();
        $join->innerJoin("table", "condition");
        $sql = "INNER JOIN table ON condition";
        $this->assertEquals($sql, $join);
    }

    public function testLeftJoin(): void
    {
        $join = $this->createJoin();
        $join->leftJoin("table", "condition");
        $sql = "LEFT JOIN table ON condition";
        $this->assertEquals($sql, $join);
    }

    public function testRightJoin(): void
    {
        $join = $this->createJoin();
        $join->rightJoin("table", "condition");
        $sql = "RIGHT JOIN table ON condition";
        $this->assertEquals($sql, $join);
    }

    public function testOnlyOneParameter(): void
    {
        $join = $this->createJoin();
        $join->innerJoin("table");
        $sql = "INNER JOIN table";
        $this->assertEquals($sql, $join);
    }
}
