<?php
declare(strict_types=1);

namespace Tests\Query7;

use PHPUnit\Framework\TestCase;
use Query7\CrudQuery\{
    AbstractQuery,
    DeleteQuery,
    DeleteQueryInterface,
    InsertQuery, 
    InsertQueryInterface, 
    QueryInterface, 
    SelectQuery,
    SelectQueryInterface,
    UpdateQuery,
    UpdateQueryInterface
};
use Query7\Query;

class QueryTest extends TestCase 
{

    public function testInsert(): void 
    {
        $insert = Query::insert();

        $this->assertEquals($insert instanceof QueryInterface, true);
        $this->assertEquals($insert instanceof AbstractQuery, true);
        $this->assertEquals($insert instanceof InsertQueryInterface, true);
        $this->assertEquals($insert instanceof InsertQuery, true);
        $this->assertEquals($insert instanceof Query, false);
    }

    public function testSelect(): void 
    {
        $select = Query::select();

        $this->assertEquals($select instanceof QueryInterface, true);
        $this->assertEquals($select instanceof AbstractQuery, true);
        $this->assertEquals($select instanceof SelectQueryInterface, true);
        $this->assertEquals($select instanceof SelectQuery, true);
        $this->assertEquals($select instanceof Query, false);
    }

    public function testUpdate(): void 
    {
        $update = Query::update();

        $this->assertEquals($update instanceof QueryInterface, true);
        $this->assertEquals($update instanceof AbstractQuery, true);
        $this->assertEquals($update instanceof UpdateQueryInterface, true);
        $this->assertEquals($update instanceof UpdateQuery, true);
        $this->assertEquals($update instanceof Query, false);
    }

    public function testDelete(): void 
    {
        $delete = Query::delete();

        $this->assertEquals($delete instanceof QueryInterface, true);
        $this->assertEquals($delete instanceof AbstractQuery, true);
        $this->assertEquals($delete instanceof DeleteQueryInterface, true);
        $this->assertEquals($delete instanceof DeleteQuery, true);
        $this->assertEquals($delete instanceof Query, false);
    }

}