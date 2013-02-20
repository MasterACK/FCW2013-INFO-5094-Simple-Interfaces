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
}
