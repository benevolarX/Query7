<?php
declare(strict_types=1);
namespace Query7\CrudQuery;

use Query7\Clause\OnceTableInterface;

interface InsertQueryInterface extends QueryInterface, OnceTableInterface
{
    
    /**
     * @param string $table
     * @return InsertQueryInterface
     */
    public function into(string $table): self;

    /**
     * @param string ...$col
     * @return InsertQueryInterface
     */
    public function column(string ...$col): self;

    /**
     * @param any ...$vals
     * @return InsertQueryInterface
     */
    public function values(...$vals): self;

    /**
     * @return string
     */
    public function generateColumns(): string;

    /**
     * @return string
     */
    public function generateValues(): string;
}
