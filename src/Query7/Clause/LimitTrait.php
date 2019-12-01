<?php
declare(strict_types=1);
namespace Query7\Clause;

use Query7\CrudQuery\QueryInterface;

trait LimitTrait
{
    /**
     * @var int|null
     */
    protected $offset = null;

    /**
     * @var int|null
     */
    protected $limit = null;

    /**
     * @param integer $min
     * @param integer|null $max
     * @return QueryInterface
     */
    public function limit(int $max = 1, ?int $min = null)
    {
        if ($min === null) {
            $this->limit = $max;
            $this->offset = null;
        } else {
            $this->offset = $max;
            $this->limit = $min;
        }
        return $this;
    }

    /**
     * @return boolean
     */
    public function isValidLimit(): bool
    {
        return $this->limit === null || ($this->offset === null || $this->offset <= $this->limit);
    }

    /**
     * @return string
     */
    public function generateLimit(): string
    {
        return ($this->limit === null) ? "" :
        (($this->offset !== null) ? "LIMIT $this->offset, $this->limit" : "LIMIT $this->limit");
    }
}
