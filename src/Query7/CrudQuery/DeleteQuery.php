<?php
declare(strict_types=1);
namespace Query7\CrudQuery;

use Query7\Clause\OnceTableTrait;
use Query7\Clause\WhereTrait;
use Query7\Clause\OrderByTrait;
use Query7\Clause\LimitTrait;

class DeleteQuery extends AbstractQuery implements DeleteQueryInterface
{
    use OnceTableTrait;
    use WhereTrait;
    use OrderByTrait;
    use LimitTrait;

    /**
     * @return boolean
     */
    public function isValidQuery(): bool
    {
        $table = $this->isValidOnceTable();
        $limit = $this->isValidLimit();
        return $table && $limit;
    }

    /**
     * @return string
     */
    protected function generateQuery(): string
    {
        $table = $this->generateOnceTable();
        $where = $this->generateWhere();
        $order = $this->generateOrderBy();
        $limit = $this->generateLimit();
        return "DELETE FROM $table $where $order $limit";
    }
}
