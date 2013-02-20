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

    public function testGetPrev()
    {
        $doublyLinkedNode = new \GroupC\Data\DoublyLinkedNode(0, 'value');
        $this->assertEquals(null, $doublyLinkedNode->getNext()); 	
    }

    public function testSetPrev()
    {
        $doublyLinkedNode = new \GroupC\Data\DoublyLinkedNode(0, 'value');
        $doublyLinkedNode2 = new \GroupC\Data\DoublyLinkedNode(1, 'value2');
        $doublyLinkedNode->setNext($doublyLinkedNode2);
        $this->assertTrue($doublyLinkedNode->getNext() instanceof \GroupC\Data\IDoublyLinkedNode); 	   	
    }
}
