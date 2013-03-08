FCW2013-INFO-5094-Project-1
===================================

Project 1 Group C

This project shows you the data containers and collections used by singly and doubly linked lists without the use of an array to store and manage each node in the lists.

GNU General Public License, version 3 (GPL-3.0)
http://opensource.org/licenses/GPL-3.0

How to get started: Extract package and load index.php. Documentation can be accessed with the docs folder with the index.html.


LinkedList.php
-Gets and sets the next LinkedNodes. The variable $firstnode holds the reference for the first node and $lastnode holds the refernece for the last node. Nodes can also be added by using the function add using the variable $value. Also you can check the array using various functions including if its empty and removing nodes.

DoublyLinkedList.php
-Gets and sets the previous LinkedNodes. The variable $previous holds the reference for the previous node. It extends the LinkedList capabilities and implements the DoublyLinkedList.

IteratorMode.php
-This class is used to operate as an ENUM data type that allows for different mode options to be specified. The modes are KEEP, DELETE, FIFO, and LIFO.

Iterator.php
-Iterates the nodes and checks to see which current node is being used. Checks to see which node is the current one by running various functions. Sets and gets the current mode being used.


