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
    public function into(string $table): InsertQuery;

    /**
     * @param string ...$col
     * @return InsertQueryInterface|InsertQuery
     */
    public function columns(string ...$col): InsertQuery;

    /**
     * @param any ...$vals
     * @return InsertQueryInterface|InsertQuery
     */
    public function values(...$vals): InsertQuery;

    /**
     * @return string
     */
    public function generateColumns(): string;

    /**
     * @return string
     */
    public function generateValues(): string;
}
