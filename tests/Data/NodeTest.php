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

    public function testGetKey()
    {
        $node = new \GroupC\Data\LinkedNode(0, 'value');
        $this->assertEquals(0, $node->getKey());
    }

   public function testGetValue()
   {
        $node = new \GroupC\Data\LinkedNode(0, 'value');
        $this->assertEquals('value', $node->getValue());
   }

   public function testSetKey()
   {
        $node = new \GroupC\Data\LinkedNode(0, 'value');
        $node->setKey(10);
        $this->assertEquals(10, $node->getKey());
   }

   public function testSetValue()
   {
        $node = new \GroupC\Data\LinkedNode(0, 'value');
        $node->setValue('newValue');
        $this->assertEquals('newValue', $node->getValue());
   }
}
