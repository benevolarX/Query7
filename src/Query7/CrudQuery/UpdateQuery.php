<?php
declare(strict_types=1);
namespace Query7\CrudQuery;

use Query7\Clause\OnceTableTrait;
use Query7\Clause\WhereTrait;
use Query7\Clause\OrderByTrait;
use Query7\Clause\LimitTrait;

class UpdateQuery extends AbstractQuery implements UpdateQueryInterface
{
    use OnceTableTrait;
    use WhereTrait;
    use OrderByTrait;
    use LimitTrait;

    /**
     * @var array
     */
    private $vals = [];

    /**
     * @param array $vals
     * @return UpdateQuery
     */
    public function set(array $vals): UpdateQuery
    {
        foreach ($vals as $k => $v) {
            $this->vals[$k] = $v;
        }
        return $this;
    }

    /**
     * @return string
     */
    public function generateSet(): string
    {
        $set = [];
        foreach ($this->vals as $k => $v) {
            $set[] = "$k = $v";
        }
        return \join(', ', $set);
    }

    /**
     * @return boolean
     */
    public function isValidQuery(): bool
    {
        $testTable = $this->isValidOnceTable();
        $testVals = !empty($this->vals);
        return $testTable && $testVals;
    }

    /**
     * @return string
     */
    protected function generateQuery(): string
    {
        $table = $this->generateOnceTable();
        $set = $this->generateSet();
        $where = $this->generateWhere();
        $order = $this->generateOrderBy();
        $limit = $this->generateLimit();
        return "UPDATE $table SET ( $set ) $where $order $limit";
    }
}
