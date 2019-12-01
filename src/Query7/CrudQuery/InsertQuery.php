<?php
declare(strict_types=1);
namespace Query7\CrudQuery;

use Query7\Clause\OnceTableTrait;

class InsertQuery extends AbstractQuery implements InsertQueryInterface
{
    use OnceTableTrait;

    /**
     * @var array
     */
    private $columns = [];

    /**
     * @var array
     */
    private $vals = [];

    /**
     * @param string $table
     * @return InsertQueryInterface|InsertQuery
     */
    public function into(string $table): InsertQueryInterface
    {
        return $this->setTable($table);
    }

    /**
     * @param string ...$col
     * @return InsertQueryInterface|InsertQuery
     */
    public function column(string ...$col): InsertQueryInterface
    {
        $this->columns = \array_merge($this->columns, $col);
        return $this;
    }

    /**
     * @param any ...$vals
     * @return InsertQueryInterface|InsertQuery
     */
    public function values(...$vals): InsertQueryInterface
    {
        $this->vals = \array_merge($this->vals, ...$vals);
        return $this;
    }

    /**
     * @return string
     */
    public function generateColumns(): string
    {
        if (!empty($this->columns)) {
            $cols = \join(', ', $this->columns);
            return "( $cols )";
        }
        return "";
    }

    /**
     * @return string
     */
    public function generateValues(): string
    {
        if (!empty($this->vals)) {
            $vals = \join(', ', $this->vals);
            return "( $vals )";
        }
        return "";
    }

    /**
     * @return boolean
     */
    public function isValid(): bool
    {
        $testTable = $this->isValidTable();
        $testVals = !empty($this->vals);
        return $testTable && $testVals;
    }

    /**
     * @return string
     */
    public function generateQuery(): string
    {
        $table = $this->generateTable();
        $cols = $this->generateColumns();
        $vals = $this->generateValues();
        return "INSERT INTO $table $cols VALUES ( $vals ) ";
    }
}
