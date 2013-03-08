<?php
namespace GroupC\Data\Tests;

class LinkedNodeTest extends \PHPUnit_Framework_TestCase
{
    public function testInit()
    {
        $linkedNode = new \GroupC\Data\LinkedNode(0, 'value');
        $this->assertEquals(0, $linkedNode->getKey());
        $this->assertEquals('value', $linkedNode->getValue());
    }

    public function testGetNext()
    {
        $linkedNode = new \GroupC\Data\LinkedNode(0, 'value');
        $this->assertEquals(null, $linkedNode->getNext()); 	
    }

    public function testSetNext()
    {
        $linkedNode = new \GroupC\Data\LinkedNode(0, 'value');
        $linkedNode2 = new \GroupC\Data\LinkedNode(1, 'value2');
        $linkedNode->setNext($linkedNode2);
        $this->assertTrue($linkedNode->getNext() instanceof \GroupC\Data\ILinkedNode); 	
    }
}
