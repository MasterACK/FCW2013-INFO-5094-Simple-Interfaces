<?php
ini_set('display_errors', 'on');
error_reporting(E_ALL | E_STRICT);

require_once 'src/bootstrap.php';

//Test Node Object
print '<strong>Node</strong><br />';
$node = new \GroupC\Data\Node(0, 'value');
print 'Key: ' . $node->getKey() . '<br />';
print 'Value: ' . $node->getValue() . '<br />';
$node->setKey(3);
$node->setValue('test');
print 'New Key: ' . $node->getKey() . '<br />';
print 'New Value: ' . $node->getValue() . '<br />';
print '<hr /><br />';

//Test LinkedNode Object
print '<strong>Linked Node</strong><br />';
$linkedNode = new \GroupC\Data\LinkedNode(0, 'value');
$linkedNode2 = new \GroupC\Data\LinkedNode(10, 'two');
print 'Key: ' . $linkedNode->getKey() . '<br />';
print 'Value: ' . $linkedNode->getValue() . '<br />';
$linkedNode->setKey(3);
$linkedNode->setValue('test');
print 'New Key: ' . $linkedNode->getKey() . '<br />';
print 'New Value: ' . $linkedNode->getValue() . '<br />';
print_r($linkedNode->getNext());
print '<br />';
$linkedNode->setNext($linkedNode2);
print_r($linkedNode->getNext());
print '<br />';
print '<hr /><br />';

//Test DoublyLinkedNode Object
print '<strong>Doubly Linked Node</strong><br />';
$DoublyLinkedNode = new \GroupC\Data\DoublyLinkedNode(0, 'value');
$DoublyLinkedNode2 = new \GroupC\Data\DoublyLinkedNode(10, 'two');
$DoublyLinkedNode3 = new \GroupC\Data\DoublyLinkedNode(10, 'one');
print 'Key: ' . $DoublyLinkedNode->getKey() . '<br />';
print 'Value: ' . $DoublyLinkedNode->getValue() . '<br />';
$DoublyLinkedNode->setKey(3);
$DoublyLinkedNode->setValue('test');
print 'New Key: ' . $DoublyLinkedNode->getKey() . '<br />';
print 'New Value: ' . $DoublyLinkedNode->getValue() . '<br />';
print_r($DoublyLinkedNode->getNext());
print '<br />';
$DoublyLinkedNode->setNext($DoublyLinkedNode2);
print_r($DoublyLinkedNode->getNext());
print '<br />';
print_r($DoublyLinkedNode->getPrevious());
print '<br />';
$DoublyLinkedNode->setPrevious($DoublyLinkedNode3);
print_r($DoublyLinkedNode->getPrevious());
print '<br />';
print '<hr /><br />';

//Test LinkedList Object
print '<strong>Linked List</strong><br />';
$linkedList = new \GroupC\Data\LinkedLists\LinkedList();
$linkedList->add(1);
$linkedList->add(2);
$linkedList->add(3);
$linkedList->add(4);
print 'Count: ' . $linkedList->count() . '<br />';
print 'Get First: ';
print_r($linkedList->getFirst());
print '<br />';
print 'Get Last: ';
print_r($linkedList->getLast());
print '<br />';
print 'Get Array: ';
print_r($linkedList->asArray());
print '<br />';
print 'Contains Key True: ' . $linkedList->containsKey(2) . '<br />';
print 'Contains Value True: ' . $linkedList->contains(2) . '<br />';
print 'Contains Key False: ' . $linkedList->containsKey(6) . '<br />';
print 'Contains Value False: ' . $linkedList->contains('test') . '<br />';
print 'Find/Find First: ';
print_r($linkedList->find(2));
print '<br />';
print 'Get: ';
print_r($linkedList->get(1));
print '<br />';
print 'Insert before: ' . $linkedList->insertBefore(2, 'test') . '<br />';
print 'Get Array: ';
print_r($linkedList->asArray());
print '<br />';
/*
$linkedList->insertAfter(2, 'test1');
print 'Get Array: ';
print_r($linkedList->asArray());
print '<br />';
*/
print 'Is empty: ' . $linkedList->isEmpty() . '<br />';
print 'Poll First: ';
print_r($linkedList->pollFirst());
print '<br />';
print 'Get Array: ';
print_r($linkedList->asArray());
print '<br />';
print 'Poll Last: ';
print_r($linkedList->pollLast());
print '<br />';
print 'Get Array: ';
print_r($linkedList->asArray());
print '<br />';
$linkedList->remove(3);
print 'Get Array: ';
print_r($linkedList->asArray());
print '<br />';
$linkedList->removeAt(0);
print 'Get Array: ';
print_r($linkedList->asArray());
print '<br />';

print '<hr /><br />';

//Test DoublyLinkedList Object
print '<strong>Doubly Linked List</strong><br />';
$doublyLinkedList = new \GroupC\Data\LinkedLists\DoublyLinkedList();
$doublyLinkedList->add(1);
$doublyLinkedList->add(2);
$doublyLinkedList->add(3);
$doublyLinkedList->add(4);
print '<hr /><br />';

//Test Iterator Object
print '<strong>Iterator</strong><br />';
print '<br />';
print '<em>Linked List Iterator</em><br />';
$linkedList1 = new \GroupC\Data\LinkedLists\LinkedList();
$linkedList1->add(2);
$linkedList1->add(3);
$linkedList1->add(4);
$linkedListIterator = new \GroupC\Data\LinkedLists\Iterator($linkedList1, 9);
foreach($linkedListIterator as $key => $value) {
    print 'Key: ' . $key . ' - Value: ' . $value . '<br />'; 
}
print '<br />';
print 'Get Array: ';
print_r($linkedList1->asArray());
print '<br />';
print '<em>Doubly Linked List Iterator</em><br />';
$doublyLinkedListIterator = new \GroupC\Data\LinkedLists\Iterator($doublyLinkedList);
foreach($doublyLinkedListIterator as $key => $value) {
    print 'Key: ' . $key . ' - Value: ' . $value . '<br />'; 
}
print '<hr /><br />';
