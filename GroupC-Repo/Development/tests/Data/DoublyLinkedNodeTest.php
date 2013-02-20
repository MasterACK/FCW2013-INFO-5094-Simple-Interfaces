<?php
namespace GroupC\Data\Tests;

class DoublyLinkedNodeTest extends \PHPUnit_Framework_TestCase
{
    public function testInit()
    {
        $doublyLinkedNode = new \GroupC\Data\LinkedNode(0, 'value');
        $this->assertEquals(0, $doublyLinkedNode->getKey());
        $this->assertEquals('value', $doublyLinkedNode->getValue());
    }
}
