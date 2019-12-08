<?php
declare(strict_types=1);

namespace Tests\Query7\CrudQuery;

use PHPUnit\Framework\TestCase;
use Query7\CrudQuery\InsertQuery;
use Query7\Query;

class InsertTest extends TestCase
{
    protected function createInsert(): InsertQuery
    {
        return Query::insert();
    }

    public function testEmptyInsert(): void
    {
        $insert = $this->createInsert();
        $sql = "";
        $this->assertEquals($sql, (string) $insert);
        $this->assertEquals($insert->isValidQuery(), false);
    }

    public function testSimpleInsert(): void
    {
        $insert = $this->createInsert();
        $insert->into("table");
        $insert->values([3, 'toto']);
        $sql = "INSERT INTO table VALUES ( 3, toto )";
        $this->assertEquals($sql, (string) $insert);
        $this->assertEquals($insert->isValidQuery(), true);
    }

    public function testInsertColumns(): void
    {
        $insert = $this->createInsert();
        $insert->into("table");
        $insert->columns("id", "name");
        $insert->values([3, 'toto']);
        $sql = "INSERT INTO table ( id, name ) VALUES ( 3, toto )";
        $this->assertEquals($sql, (string) $insert);
        $this->assertEquals($insert->isValidQuery(), true);
    }

    public function testNoVal(): void
    {
        $insert = $this->createInsert();
        $insert->into("table");
        $sql = "";
        $this->assertEquals($insert->isValidQuery(), false);
        $this->assertEquals($sql, (string) $insert);
    }

    public function testNoTable(): void
    {
        $insert = $this->createInsert();
        $insert->values([3, 'toto']);
        $sql = "";
        $this->assertEquals($insert->isValidQuery(), false);
        $this->assertEquals($sql, (string) $insert);
    }
}
