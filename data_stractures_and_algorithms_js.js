/* Javascript Data Structures and Algorithms */

//===================================================
//Linked List
//===================================================

// Object-Based Linked List Design:

// node class:
function Node (element) {
	this.element = element;
	this.next = null;
}

// linked list class:
function LList() {
	this.head = new Node('head');
	this.find = find;
	this.insert = insert;
	this.findPrevious = findPrevious;
	this.remove = remove;
	this.display = display;
}

// find helper function
function find (item) {
	var currNode = this.head;
	
	while(currNode.element != item) {
		currNode = currNode.next;
	}

	return currNode;
}

// insert function
function insert(newElement, item) {
	var newNode = new Node(newElement);
	var current = this.find(item);
	newNode.next = current.next;
	current.next = newNode;
}

// test display function
function display() {
	var currNode = this.head;
	while(!(currNode.next == null)) {
		console.log(currNode.next.element);
		currNode = currNode.next;
	}
}

// main test program 1 - comment remove, expected: Conway, Russellville, Alma
var cities = new LList();
cities.insert("Conway", "head");
cities.insert("Russellville", "Conway");
cities.insert("Alma", "Russellville");
cities.display();  

// findPrevious helper function
function findPrevious (item) {
	var currNode = this.head;
	
	while(!(currNode.next == null) && (currNode.next.element != item)) {
		currNode = currNode.next;
	}

	return currNode;
}

// remove function
function remove (item) {
	var prevNode = this.findPrevious(item);

	if (!(prevNode.next == null)) {
		prevNode.next = prevNode.next.next;
	}
}

// test main program 2
var cities = new LList();
cities.insert("Conway", "head");
cities.insert("Russellville", "Conway");
cities.insert("Carlisle", "Russellville");
cities.insert("Alma", "Carlisle");
cities.display();
console.log();
cities.remove("Carlisle");
cities.display();

// Doubly Linked Lists:

// add the new previous property
function Node (element) {
	this.element = element;
	this.next = null;
	this.previous = null;
}

// add the new functions, remove findPrevious
function LList() {
   this.head = new Node("head");
   this.find = find;
   this.insert = insert;
   this.display = display;
   this.remove = remove;
   this.findLast = findLast;
   this.dispReverse = dispReverse;
}

// modify insert to point to previous
function insert (newElement, item) {
	var newNode = new Node(newElement);
	var current = this.find(item);
	newNode.next = current.next;
	newNode.previous = current;
	current.next = newNode;
}

// remove function is more efficient
function remove(item) {
   var currNode = this.find(item);
   
   if (!(currNode.next == null)) {
       currNode.previous.next = currNode.next;
       currNode.next.previous = currNode.previous;
       currNode.next = null;
       currNode.previous = null;
   }
}

// utility function findLast helps reverse elements
function findLast() {
   var currNode = this.head;
   
   while (!(currNode.next == null)) {
      currNode = currNode.next;
   }
   
   return currNode;
}

// reverse elements
function dispReverse() {
   var currNode = this.head;
   currNode = this.findLast();
   
   while (!(currNode.previous == null)) {
      print(currNode.element);
      currNode = currNode.previous;
   }
}

// Circularly Linked Lists:

