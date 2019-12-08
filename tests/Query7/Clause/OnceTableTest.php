<?php
declare(strict_types=1);

namespace Tests\Query7\Clause;

use PHPUnit\Framework\TestCase;
use Query7\Clause\OnceTableInterface;
use Query7\Clause\OnceTableTrait;

class OneTableTest extends TestCase
{

    /**
     * @return OnceTableInterface
     */
    protected function createOnceTable(): OnceTableInterface
    {
        return new class implements OnceTableInterface {
            use OnceTableTrait;
            public function __toString(): string
            {
                return $this->generateOnceTable();
            }
        };
    }

    public function testEmptyTable(): void
    {
        $table = $this->createOnceTable();
        $sql = "";
        $this->assertEquals($sql, $table);
        $this->assertEquals($table->isValidOnceTable(), false);
    }

    public function testTableValid(): void
    {
        $table = $this->createOnceTable();
        $table->setTable("table");
        $sql = "table";
        $this->assertEquals($sql, $table);
        $this->assertEquals($table->isValidOnceTable(), true);
    }

    public function testOnlyOnceTable(): void
    {
        $table = $this->createOnceTable();
        $table->setTable("old");
        $table->setTable("table");
        $sql = "old";
        $this->assertEquals($sql, $table);
        $this->assertEquals($table->isValidOnceTable(), true);
    }
}
