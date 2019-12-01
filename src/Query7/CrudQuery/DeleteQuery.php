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
    public function isValid(): bool
    {
        return $this->isValidOnceTable();
    }

    /**
     * @return string
     */
    public function generateQuery(): string
    {
        $table = $this->generateTable();
        $where = $this->generateWhere();
        $order = $this->generateOrderBy();
        $limit = $this->generateLimit();
        return "DELETE FROM $table $where $order $limit";
    }
}
