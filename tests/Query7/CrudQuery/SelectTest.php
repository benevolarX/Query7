<?php
declare(strict_types=1);

namespace Tests\Query7\CrudQuery;

use PHPUnit\Framework\TestCase;
use Query7\CrudQuery\SelectQueryInterface;
use Query7\Query;

class SelectTest extends TestCase
{
    /**
     * @return SelectQueryInterface
     */
    protected function createSelect(): SelectQueryInterface
    {
        return Query::select();
    }

    public function testEmptySelect(): void
    {
        $select = $this->createSelect();
        $sql = "";
        $this->assertEquals($sql, (string) $select);
        $this->assertEquals($select->isValidQuery(), false);
    }

    public function testSimpleSelect(): void
    {
        $select = $this->createSelect();
        $select->from("table");
        $sql = "SELECT * FROM table";
        $this->assertEquals($sql, (string) $select);
        $this->assertEquals($select->isValidQuery(), true);
    }

    public function testColumn(): void
    {
        $select = $this->createSelect();
        $select->from("table");
        $select->column("name");
        $sql = "SELECT name FROM table";
        $this->assertEquals($sql, (string) $select);
        $this->assertEquals($select->isValidQuery(), true);
    }

    public function testColumnWhithAlias(): void
    {
        $select = $this->createSelect();
        $select->from("table");
        $select->column("name", "n");
        $sql = "SELECT name AS n FROM table";
        $this->assertEquals($sql, (string) $select);
        $this->assertEquals($select->isValidQuery(), true);
    }

    public function testColumns(): void
    {
        $select = $this->createSelect();
        $select->from("table");
        $select->columns("name", "email", "phone");
        $sql = "SELECT name, email, phone FROM table";
        $this->assertEquals($sql, (string) $select);
        $this->assertEquals($select->isValidQuery(), true);
    }
}
