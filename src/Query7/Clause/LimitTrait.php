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
            $this->setLimit($max);
        } else {
            $this->setOffset($max);
            $this->setLimit($min);
        }
        return $this;
    }

    /**
     * @param integer $offset
     * @return QueryInterface
     */
    public function offset(int $offset)
    {
        $this->setOffset($offset);
        return $this;
    }

    /**
     * @return boolean
     */
    public function isValidLimit(): bool
    {
        return $this->limit !== null || $this->offset === null;
    }

    /**
     * @return string
     */
    public function generateLimit(): string
    {
        return ($this->limit === null) ? "" :
        (($this->offset !== null) ? "LIMIT $this->offset, $this->limit" : "LIMIT $this->limit");
    }

    private function setLimit(int $n)
    {
        $this->limit = ($n > 0) ? $n : null;
    }

    private function setOffset(int $n)
    {
        $this->offset = ($n > 0) ? $n : null;
    }
}
