<?php
namespace GroupC\Data\Tests;

class NodeTest extends \PHPUnit_Framework_TestCase
{
    public function testInit()
    {
        $node = new \GroupC\Data\LinkedNode(0, 'value');
        $this->assertEquals(0, $node->getKey());
        $this->assertEquals('value', $node->getValue());
    }
}
