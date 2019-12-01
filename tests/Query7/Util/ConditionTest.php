<?php
declare(strict_types=1);

namespace Tests\Query7\Util;

use PHPUnit\Framework\TestCase;
use Query7\Util\Condition;

class ConditionTest extends TestCase
{
    public function testNull(): void
    {
        $null = " IS NULL";
        $this->assertEquals($null, Condition::IS_NULL);
        $notNull = " IS NOT NULL";
        $this->assertEquals($notNull, Condition::IS_NOT_NULL);
    }

    public function testLike(): void
    {
        $condition = Condition::like("hello");
        $this->assertEquals(\is_string($condition), true);
        $this->assertEquals($condition, " LIKE hello");
    }

    public function testBetween(): void
    {
        $sql = " BETWEEN :min AND :max";
        $condition = Condition::between(":min", ":max");
        $this->assertEquals(\is_string($condition), true);
        $this->assertEquals($sql, $condition);
    }

    public function testIn(): void
    {
        $tab = [1, 2, 3];
        $sql = " IN ( 1, 2, 3 )";
        $condition = Condition::in($tab);
        $this->assertEquals($condition, $sql);
        $condition = Condition::in("1, 2, 3");
        $this->assertEquals($condition, $sql);
    }

    public function testEqual(): void
    {
        $condition = Condition::isEqual(5);
        $sql = " = 5";
        $this->assertEquals($sql, $condition);
    }

    public function testNotEqual(): void
    {
        $condition = Condition::isNotEqual(5);
        $sql = " <> 5";
        $this->assertEquals($sql, $condition);
    }

    public function testInf(): void
    {
        $condition = Condition::isInf(5);
        $sql = " < 5";
        $this->assertEquals($sql, $condition);
    }

    public function testInfOrEqual(): void
    {
        $condition = Condition::isInfOrEqual(5);
        $sql = " <= 5";
        $this->assertEquals($sql, $condition);
    }

    public function testSup(): void
    {
        $condition = Condition::isSup(5);
        $sql = " > 5";
        $this->assertEquals($sql, $condition);
    }

    public function testSupOrEqual(): void
    {
        $condition = Condition::isSupOrEqual(5);
        $sql = " >= 5";
        $this->assertEquals($sql, $condition);
    }
}
