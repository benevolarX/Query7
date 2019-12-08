<?php
declare(strict_types=1);

namespace Tests\Query7\Clause;

use PHPUnit\Framework\TestCase;
use Query7\Clause\WhereInterface;
use Query7\Clause\WhereTrait;
use Query7\Util\ConditionTree;
use Query7\Util\Leaf;

class WhereTest extends TestCase
{

    /**
     * @return WhereInterface
     */
    protected function createWhere(): WhereInterface
    {
        return new class implements WhereInterface {
            use WhereTrait;
            public function __toString(): string
            {
                return $this->generateWhere();
            }
        };
    }

    public function testEmptyWhere(): void
    {
        $where = $this->createWhere();
        $sql = "";
        $this->assertEquals($sql, $where);
    }
    
    public function testSimpleWhere(): void
    {
        $where = $this->createWhere();
        $where->where("id = 3");
        $sql = "WHERE id = 3";
        $this->assertEquals($sql, (string) $where);
    }

    public function testSimpleWhereAnd(): void
    {
        $where = $this->createWhere();
        $where->where("id = 3");
        $where->andWhere("age > 18");
        $sql = "WHERE (id = 3 AND age > 18)";
        $this->assertEquals($sql, (string) $where);
    }

    public function testMultipleWhereAnd(): void
    {
        $where = $this->createWhere();
        $where->where("id = 3");
        $where->andWhere("age > 18");
        $where->andWhere("age < 99");
        $sql = "WHERE ((id = 3 AND age > 18) AND age < 99)";
        $this->assertEquals($sql, (string) $where);
    }

    public function testSimpleWhereOr(): void
    {
        $where = $this->createWhere();
        $where->where("id = 3");
        $where->orWhere("age > 18");
        $sql = "WHERE (id = 3 OR age > 18)";
        $this->assertEquals($sql, (string) $where);
    }

    public function testMultipleWhereOr(): void
    {
        $where = $this->createWhere();
        $where->where("id = 3");
        $where->orWhere("age > 18");
        $where->orWhere("age < 99");
        $sql = "WHERE ((id = 3 OR age > 18) OR age < 99)";
        $this->assertEquals($sql, (string) $where);
    }

    public function testMixedWhereOrWhereAnd(): void
    {
        $where = $this->createWhere();
        $where->where("id = 3");
        $where->orWhere("age > 18");
        $where->andWhere("age < 99");
        $sql = "WHERE ((id = 3 OR age > 18) AND age < 99)";
        $this->assertEquals($sql, (string) $where);
    }

    public function testSetWhere(): void
    {
        $where = $this->createWhere();
        $where->where("id = 3");
        $where->orWhere("age > 18");
        $where->andWhere("age < 99");
        $condition = new Leaf("id = 9");
        $where->setWhere($condition);
        $sql = "WHERE id = 9";
        $this->assertEquals($sql, (string) $where);
    }
}
