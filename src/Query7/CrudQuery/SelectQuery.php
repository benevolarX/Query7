<?php
declare(strict_types=1);
namespace Query7\CrudQuery;

use Query7\Clause\FromTrait;
use Query7\Clause\JoinTrait;
use Query7\Clause\GroupByHavingTrait;
use Query7\Clause\WhereTrait;
use Query7\Clause\OrderByTrait;
use Query7\Clause\LimitTrait;

class SelectQuery extends AbstractQuery implements SelectQueryInterface
{
    use FromTrait;
    use JoinTrait;
    use GroupByHavingTrait;
    use WhereTrait;
    use OrderByTrait;
    use LimitTrait;

    /**
     * @var string[]
     */
    private $columns = [];

    /**
     * @param string $col
     * @param string|null $alias
     * @return SelectQueryInterface
     */
    public function column(string $col, ?string $alias = null): SelectQuery
    {
        $newCol = ($alias === null) ? $col : "$col AS $alias";
        if (! \in_array($newCol, $this->columns)) {
            $this->columns[] = $newCol;
        }
        return $this;
    }

    /**
     * @param string ...$cols
     * @return SelectQueryInterface
     */
    public function columns(string ...$cols): SelectQuery
    {
        foreach ($cols as $col) {
            $this->column($col);
        }
        return $this;
    }

    /**
     * @return boolean
     */
    public function isValid(): bool
    {
        $testFrom = $this->isValidFrom();
        $testGroupByHaving = $this->isValidGroupByHaving();
        $testLimit = $this->isValidLimit();
        return $testFrom && $testGroupByHaving && $testLimit;
    }

    /**
     * @return string
     */
    public function generateQuery(): string
    {
        $cols = empty($this->columns) ? '*' : join(', ', $this->columns);
        $fromTable = $this->generateFrom();
        $join = $this->generateJoin();
        $groupByHaving = $this->generateGroupByHaving();
        $where = $this->generateWhere();
        $orderBy = $this->generateOrderBy();
        $limit = $this->generateLimit();
        return "SELECT $cols $fromTable $join $groupByHaving $where $orderBy $limit";
    }
}
