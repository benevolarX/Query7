<?php
declare(strict_types=1);
namespace Query7\CrudQuery;

use Query7\Clause\OnceTableInterface;
use Query7\CrudQuery\InsertQuery;

interface InsertQueryInterface extends QueryInterface, OnceTableInterface
{
    
    /**
     * @param string $table
     * @return InsertQueryInterface|InsertQuery
     */
    public function into(string $table): InsertQueryInterface;

    /**
     * @param string ...$col
     * @return InsertQueryInterface|InsertQuery
     */
    public function column(string ...$col): InsertQueryInterface;

    /**
     * @param any ...$vals
     * @return InsertQueryInterface|InsertQuery
     */
    public function values(...$vals): InsertQueryInterface;

    /**
     * @return string
     */
    public function generateColumns(): string;

    /**
     * @return string
     */
    public function generateValues(): string;
}
