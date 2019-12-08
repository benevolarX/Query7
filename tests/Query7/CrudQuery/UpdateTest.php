<?php
declare(strict_types=1);

namespace Tests\Query7\CrudQuery;

use PHPUnit\Framework\TestCase;
use Query7\CrudQuery\UpdateQueryInterface;
use Query7\Query;

class UpdateTest extends TestCase
{
    /**
     * @return UpdateQueryInterface
     */
    protected function createUpdate(): UpdateQueryInterface
    {
        return Query::update();
    }

    public function testEmptyUpdate(): void
    {
        $update = $this->createUpdate();
        $sql = "";
        $this->assertEquals($sql, (string) $update);
        $this->assertEquals($update->isValidQuery(), false);
    }

    public function testSimpleUpdate(): void
    {
        $update = $this->createUpdate();
        $update->setTable("table");
        $update->set([
            "age" => 2,
            "title" => "hello",
            "coin" => 5
        ]);
        $update->where("id = 3");
        $sql = "UPDATE table SET ( age = 2, title = hello, coin = 5 ) WHERE id = 3";
        $this->assertEquals($sql, (string) $update);
        $this->assertEquals($update->isValidQuery(), true);
    }

    public function testUpdateNoTable(): void
    {
        $update = $this->createUpdate();
        $update->set([
            "age" => 2,
            "title" => "hello",
            "coin" => 5
        ]);
        $update->where("id = 3");
        $sql = "";
        $this->assertEquals($sql, (string) $update);
        $this->assertEquals($update->isValidQuery(), false);
    }

    public function testUpdateNoSet(): void
    {
        $update = $this->createUpdate();
        $update->setTable("table");
        $update->where("id = 3");
        $sql = "";
        $this->assertEquals($sql, (string) $update);
        $this->assertEquals($update->isValidQuery(), false);
    }
}
