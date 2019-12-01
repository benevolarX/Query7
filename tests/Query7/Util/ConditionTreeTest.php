<?php
declare(strict_types=1);

namespace Tests\Query7\Util;

use PHPUnit\Framework\TestCase;
use Query7\Util\Leaf;
use Query7\Util\Tree;

class CondtionTreeTest extends TestCase 
{

    public function testLeaf(): void 
    {
        $leaf = new Leaf("hello");
        $this->assertEquals("hello", $leaf);
    }

    public function testTree(): void 
    {
        $left = new Leaf("left");
        $right = new Leaf("right");
        $tree = new Tree($left, $right);
        $sql = "(left AND right)";
        $this->assertEquals($sql, $tree);

        $sql = "(right OR left)";
        $tree = new Tree($right, $left, 'OR');
        $this->assertEquals($sql, $tree);
    }

    public function testOr(): void 
    {
        $left = new Leaf("left");
        $right = new Leaf("right");
        $tree = $left->or($right);
        $sql = "(left OR right)";
        $this->assertEquals($sql, $tree);

        $sql = "(right OR left)";
        $tree = $right->or($left);
        $this->assertEquals($sql, $tree);
    }

    public function testAnd(): void 
    {
        $left = new Leaf("left");
        $right = new Leaf("right");
        $tree = $left->and($right);
        $sql = "(left AND right)";
        $this->assertEquals($sql, $tree);

        $sql = "(right AND left)";
        $tree = $right->and($left);
        $this->assertEquals($sql, $tree);
    }

}