<?php
declare(strict_types=1);
namespace Query7\Clause;

use Query7\CrudQuery\QueryInterface;

trait FromTrait
{
    /**
     * @var string[]
     */
    protected $from = [];

    /**
     * @param string $table
     * @param string|null $alias
     * @return QueryInterface
     */
    public function from(string $table, ?string $alias = null)
    {
        if ($alias) {
            $this->from[$alias] = $table;
        } else {
            $this->from[] = $table;
        }
        return $this;
    }

    /**
     * @return boolean
     */
    public function isValidFrom(): bool
    {
        return !empty($this->from);
    }

    /**
     * @return string
     */
    public function generateFrom(): string
    {
        $from = [];
        foreach ($this->from as $k => $v) {
            $from[] = (\is_string($k)) ? "$v AS $k" : $v;
        }
        return empty($from) ? "" : "FROM " . \join(", ", $from);
    }
}
