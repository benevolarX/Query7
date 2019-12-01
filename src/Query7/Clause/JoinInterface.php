<?php
declare(strict_types=1);
namespace Query7\Clause;

use Query7\CrudQuery\QueryInterface;

interface JoinInterface
{

    /**
     * @param string $table
     * @param string|null $condition
     * @return QueryInterface
     */
    public function innerJoin(string $table, ?string $condition = null);

    /**
     * @param string $table
     * @param string|null $condition
     * @return QueryInterface
     */
    public function leftJoin(string $table, ?string $condition = null);

    /**
     * @param string $table
     * @param string|null $condition
     * @return QueryInterface
     */
    public function rightJoin(string $table, ?string $condition = null);

    /**
     * @return string
     */
    public function generateJoin(): string;
}
