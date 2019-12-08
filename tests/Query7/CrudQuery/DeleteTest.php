<?php
declare(strict_types=1);

namespace Tests\Query7\CrudQuery;

use PHPUnit\Framework\TestCase;
use Query7\CrudQuery\DeleteQuery;
use Query7\Query;

class DeleteTest extends TestCase
{
    protected function createDelete(): DeleteQuery
    {
        return Query::delete();
    }

    public function testEmptyDelete(): void
    {
        $delete = $this->createDelete();
        $sql = "";
        $this->assertEquals($sql, (string) $delete);
        $this->assertEquals($delete->isValidQuery(), false);
    }

    public function testSimpleDelete(): void
    {
        $delete = $this->createDelete();
        $delete->setTable("table");
        $delete->where("id = 3");
        $sql = "DELETE FROM table WHERE id = 3";
        $this->assertEquals($sql, (string) $delete);
        $this->assertEquals($delete->isValidQuery(), true);
    }

    public function testDeleteNoTable(): void
    {
        $delete = $this->createDelete();
        $delete->where("id = 3");
        $sql = "";
        $this->assertEquals($sql, (string) $delete);
        $this->assertEquals($delete->isValidQuery(), false);
    }
}
