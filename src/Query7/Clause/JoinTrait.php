<?php
declare(strict_types=1);
namespace Query7\Clause;

use Query7\CrudQuery\QueryInterface;

trait JoinTrait
{
    /**
     * @var string[]
     */
    protected $join = [];

    /**
     * @param string $table
     * @param string|null $condition
     * @return QueryInterface
     */
    public function innerJoin(string $table, ?string $condition = null)
    {
        return $this->join('INNER JOIN', $table, $condition);
    }

    /**
     * @param string $table
     * @param string|null $condition
     * @return QueryInterface
     */
    public function leftJoin(string $table, ?string $condition = null)
    {
        return $this->join('LEFT JOIN', $table, $condition);
    }

    /**
     * @param string $table
     * @param string|null $condition
     * @return QueryInterface
     */
    public function rightJoin(string $table, ?string $condition = null)
    {
        return $this->join('RIGHT JOIN', $table, $condition);
    }

    /**
     * @param string $type
     * @param string $table
     * @param string|null $condition
     * @return QueryInterface
     */
    protected function join(string $type, string $table, ?string $condition)
    {
        $on = $condition === null ? "" : "ON $condition";
        $this->join[] = "$type $table $on";
        return $this;
    }

    /**
     * @return string
     */
    public function generateJoin(): string
    {
        return (empty($this->join)) ? "" : \join(' ', $this->join);
    }
}
