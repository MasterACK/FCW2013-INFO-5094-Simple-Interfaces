<?php
namespace GroupC\Data\Tests;

class LinkedListTest extends \PHPUnit_Framework_TestCase
{

    public function testGetFirst()
    {
        $linkedList = new \GroupC\Data\LinkedLists\LinkedList();
        $linkedList->add('test');
        $this->assertEquals('test', $linkedList->getFirst()->getValue());
    }

    public function testGetLast()
    {
        $linkedList = new \GroupC\Data\LinkedLists\LinkedList();
        $linkedList->add('first');
        $linkedList->add('last');
        $this->assertEquals('last', $linkedList->getLast()->getValue());
    }

    public function testAdd()
    {
        $linkedList = new \GroupC\Data\LinkedLists\LinkedList();
        $this->assertEquals(0, $linkedList->count());
        $linkedList->add('first');
        $this->assertEquals(1, $linkedList->count());
        $linkedList->add('last');
        $this->assertEquals(2, $linkedList->count());
    }

    public function testAddNode()
    {
        $linkedList = new \GroupC\Data\LinkedLists\LinkedList();
        $node = new \GroupC\Data\LinkedNode(0, 'test');
        $linkedList->addNode($node);
        $this->assertEquals(1, $linkedList->count());
        $this->assertEquals('test', $linkedList->getFirst()->getValue());
    }

    public function testContainsKey()
    {
        $linkedList = new \GroupC\Data\LinkedLists\LinkedList();
        $linkedList->add('first');
        $linkedList->add('last');
        $this->assertTrue($linkedList->containsKey(0));
        $this->assertTrue($linkedList->containsKey(1));
        $this->assertFalse($linkedList->containsKey(2));
    }

    public function testContains()
    {
        $linkedList = new \GroupC\Data\LinkedLists\LinkedList();
        $linkedList->add('first');
        $linkedList->add('last');
        $this->assertTrue($linkedList->contains('first'));
        $this->assertFalse($linkedList->contains('test'));
    }

    public function testFindAll()
    {
        $linkedList = new \GroupC\Data\LinkedLists\LinkedList();
        $linkedList->add('test');
        $linkedList->add('false');
        $linkedList->add('test');
        $all = $linkedList->findAll('test');
        $this->assertTrue(count($all) == 2);
    }

    public function testFindFirst()
    {
        $linkedList = new \GroupC\Data\LinkedLists\LinkedList();
        $linkedList->add('test');
        $linkedList->add('false');
        $linkedList->add('test');
        $this->assertTrue($linkedList->findFirst('test') instanceof \GroupC\Data\ILinkedNode);
        $this->assertTrue($linkedList->findFirst('test')->getKey() == 0);
        $this->assertEquals(null, $linkedList->findFirst('test1'));
    }

    public function testFindLast()
    {
        $linkedList = new \GroupC\Data\LinkedLists\LinkedList();
        $linkedList->add('test');
        $linkedList->add('false');
        $linkedList->add('test');
        $this->assertTrue($linkedList->findLast('test') instanceof \GroupC\Data\ILinkedNode);
        $this->assertTrue($linkedList->findLast('test')->getKey() == 2);
    }

    public function testGet()
    {
        $linkedList = new \GroupC\Data\LinkedLists\LinkedList();
        $linkedList->add('test');
        $linkedList->add('false');
        $linkedList->add('test');
        $this->assertTrue($linkedList->get(0) instanceof \GroupC\Data\ILinkedNode);
        $this->assertTrue($linkedList->get(0)->getValue() == 'test');
    }

    public function testInsertBefore()
    {
        $linkedList = new \GroupC\Data\LinkedLists\LinkedList();
        $linkedList->add('old');
        $linkedList->add('old');
        $linkedList->add('old');
        $this->assertTrue($linkedList->count() == 3);
        $linkedList->insertBefore(1, 'new');
        $this->assertTrue($linkedList->count() == 4);
        $this->assertTrue($linkedList->get(1)->getValue() == 'new');
    }

    public function testInsertAfter()
    {
        $linkedList = new \GroupC\Data\LinkedLists\LinkedList();
        $linkedList->add('old');
        $linkedList->add('old');
        $linkedList->add('old');
        $this->assertTrue($linkedList->count() == 3);
        $linkedList->insertAfter(1, 'new');
        $this->assertTrue($linkedList->count() == 4);
        $this->assertTrue($linkedList->get(2)->getValue() == 'new');    	
    }

    public function testIsEmpty()
    {
        $linkedList = new \GroupC\Data\LinkedLists\LinkedList();
        $this->assertTrue($linkedList->isEmpty());
        $linkedList->add('old');
        $this->assertFalse($linkedList->isEmpty());
    }

    public function testPollFirst()
    {
        $linkedList = new \GroupC\Data\LinkedLists\LinkedList();
        $linkedList->add('test1');
        $linkedList->add('test2');
        $this->assertTrue($linkedList->count() == 2);
        $poll = $linkedList->pollFirst();
        $this->assertTrue($linkedList->count() == 1);
        $this->assertEquals('test1', $poll->getValue());
    }

    public function testPollLast()
    {
        $linkedList = new \GroupC\Data\LinkedLists\LinkedList();
        $linkedList->add('test1');
        $linkedList->add('test2');
        $this->assertTrue($linkedList->count() == 2);
        $poll = $linkedList->pollLast();
        $this->assertTrue($linkedList->count() == 1);
        $this->assertEquals('test2', $poll->getValue());
    }

    public function testRemove()
    {
        $linkedList = new \GroupC\Data\LinkedLists\LinkedList();
        $linkedList->add('test1');
        $linkedList->add('test2');
        $this->assertTrue($linkedList->count() == 2);
        $linkedList->remove('test2');
        $this->assertTrue($linkedList->count() == 1);	 
    }

    public function testRemoveAt()
    {
        $linkedList = new \GroupC\Data\LinkedLists\LinkedList();
        $linkedList->add('test1');
        $linkedList->add('test2');
        $this->assertTrue($linkedList->count() == 2);
        $linkedList->removeAt(1);
        $this->assertTrue($linkedList->count() == 1);	
    }

    public function testRemoveFirst()
    {
        $linkedList = new \GroupC\Data\LinkedLists\LinkedList();
        $linkedList->add('test1');
        $linkedList->add('test2');
        $this->assertTrue($linkedList->count() == 2);
        $linkedList->removeFirst();
        $this->assertTrue($linkedList->count() == 1);
    }

    public function testRemoveLast()
    {
        $linkedList = new \GroupC\Data\LinkedLists\LinkedList();
        $linkedList->add('test1');
        $linkedList->add('test2');
        $this->assertTrue($linkedList->count() == 2);
        $linkedList->removeLast();
        $this->assertTrue($linkedList->count() == 1);
    }

    public function testRemoveNode()
    {
        $linkedList = new \GroupC\Data\LinkedLists\LinkedList();
        $linkedList->add('test1');
        $linkedList->add('test2');
        $node = $linkedList->getFirst();
        $this->assertTrue($linkedList->count() == 2);
        $linkedList->removeNode($node);
        $this->assertTrue($linkedList->count() == 1);
    }

    public function testSort()
    {
        $linkedList = new \GroupC\Data\LinkedLists\LinkedList();
    }

    public function testSortBy()
    {
        $linkedList = new \GroupC\Data\LinkedLists\LinkedList();
    }

    public function testCount()
    {
        $linkedList = new \GroupC\Data\LinkedLists\LinkedList();
        $linkedList->add('test1');
        $linkedList->add('test2');
        $this->assertTrue($linkedList->count() == 2);
    }

    public function testGetIterator()
    {
        $linkedList = new \GroupC\Data\LinkedLists\LinkedList();
        $this->assertTrue($linkedList->getIterator() instanceof \GroupC\Data\LinkedLists\Iterator);
    }
}
