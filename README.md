FCW2013-INFO-5094-Simple-Interfaces
===================================

Assignment 8 Group C

GNU General Public License, version 3 (GPL-3.0)
http://opensource.org/licenses/GPL-3.0

Node.php
$node = new \GroupC\Data\LinkedNode(0, 'value');
-Gets and sets the key for the current node
-Gets and sets the value for the current node
-$key holds the index of the current node
-$value holds the value of the current node

LinkedNode.php
$linkedNode = new \GroupC\Data\LinkedNode(0, 'value');
-Gets and sets the next LinkedNodes
-$next holds the reference for the next node

DoublyLinkedNode.php
$doublyLinkedNode = new \GroupC\Data\LinkedNode(0, 'value');
-Gets and sets the previous LinkedNodes
-$previous holds the reference for the previous node

