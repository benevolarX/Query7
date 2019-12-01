<?php
declare(strict_types=1);
namespace Query7\CrudQuery;

interface UpdateQueryInterface extends QueryInterface
{

    /**
     * @param array $vals
     * @return self
     */
    public function set(array $vals): self;

    /**
     * @return string
     */
    public function generateSet(): string;

}
