/*JavaScript OOP*/
// * Creating and using objects:
- Objects:
	- states - implemented through variables/data
	- behaviors - defined through functions
- Class:
	- classes act as templates from which an instance
	 of an object is created at run time. Classes define
	 the properties of the object and the methods used 
	 to control the object s behavior
	- they provide the structure for objects
	- Classes define:
		- set of attributes - represent by variables and
		 properties. Hold their state.
	    - set of actions(behaviors) - methods
- An object is concrete instance of a particular class
 
- JavaScript is designed on a simple object-based paradigm
	- an object is collection of properties
	- an object property is association with a name and 
	 a value
	- a value of property can be either a method or a 
	 field
- property may be a variable or a method:
var length = arr.length;	//property length of Array
var words = text.split("");

- JavaScript is dynamic language -
	- variables don t have type, but their values do
	- Number, String, Boolean, Null, Undefined and Object
	- Object is the only reference type 
		- copied by reference
	- typeof - keyword returns type

console.log(typeof new Object() === typeof new Array());	//true

	- primitive types in JavaScript have reference 
	 wrapper

var number = 5;	// holds a primitive value of 5
var numberObj = new Number(5);	// holds a reference value of 5

var fname = "Pesho";
var lname = "Ivanov";
var person ={
	firstName: fname,
	lastName: lname,
	toString: function personToString() {
		return this.firstName + " " + this.lastName;
	} 
};

lname = "Petrov";	// does not affect the object state
console.log(person.lastName);	// logged Ivanov, reference

- JSON Object -
	- stands for JavaScript Object Notation
	- a data format used in JavaScript

var person = {
	firstName: "Doncho",
	lastName: "Minkov",
	toString: function personToString () {
		return this.firstName + " " + this.lastName;
	}
}

console.log(person.toString());	// writes "Doncho Minkov"

- instead of:

var person = new Person();
person.firstName = "Doncho";
person.lastName = "Minkov";
person.toString = personToString(){
	return this.firstName + " " + this.lastName;
}

- the JSON is easier to write and be send to the server,
 kilobytes can be saved and the site is faster

- the || is supported in JavaScript. if new name is 
 passed rename else keep the old value

 function renamePerson (personObj, fname, lname) {
 	personObj.firstName = fname || personObj.firstName;
 	personObj.lastName = lname || personObj.lastName;
 }

- problem: repeating code for every new object 
- solution: constructor functions

function buildPerson (fname, lname) {
	return{
		fname: fname,
		lname: lname,
		toString: function(){
			return this.fname + " " + this.lname;
		}
	}
}

var minkov = buildPerson("Doncho", "Minkov");
var georgiev = buildPerson("Georgi", "georgiev");

- the [] notation to access proprties -
	- in JavaScript the proprties are just
	 a set of key value pairs

document.write === document["write"]	// result is true

	- but this is not very good idea to use,
	 because the "" may be confused for a String

- JSON:

	- standart:

	var person = new Object();
	person.firstname = 'Doncho';
	person.lasname = 'Minkov';
	person.toString = function() {
		return this.firstname + ' ' + this.lastname;
	}

	- JSON:

	var person = {
		firstname: "Doncho",
		lastname: "Minkov",
		toString: function() {
			return this.firstname + ' ' + this.lastname;
		}
	}

	- saves space, used for data transfer on the web
	- but too much repetion of code if we need more persons
	
	- Factory Function:

	function buildPerson(fname, lname) {
		return {
			firstname: fname;
			lastname: lname;
			toString: function() {
				return this.firstname + ' ' + this.lastname;
			}
		}
	}

	- Constructor Function:

	function Person (fname, lname) {
		this.fnane = fname;
		this.lname = lname;
	}

	Person.prototype.toString = function () {
		return this.firstname + ' ' + this.lastname;
	}

	- Multiple Functions:
		- attached to the prototype property as a JSON object
	
	Person.prototype = {
		sayHello: function() {
			console.log();
		},
		sayAge: function() {
			console.log();
		}
	}

	- Private:

	function Person (fname, lname) {
		var firstname = fname;
		var lastname = lname;
		this.sayHello = function sayHello () {
			// will have access to the private fields firstname and last name, because of closure
		}
	}

	Person.prototype.sayAge = function() {
		// will not have access to the private fields
	}

	- Public:

	function Person (fname, lname) {
		this.firstname = fname;
		this.lastname = lname;
	}

	Person.prototype.sayHello = function() {
		// will have access to the public fields firstname and lastname
	}

// * Advanced functions:
- Functions - are small named snippets of code
	- can take parameters of any type
	- each function gets two special Objects
		- arguments - an array holding all parameters
		- this - information about the context
	- can return result of any type
- 

- arr.splice(pos, len, newElements);
	- has nagative indexes
	- use to add, remove and replace elements 
- declaration:
function printLogo () {
	console.log("Telerik Corp.");
}
- expression:
var print = function printLogo () {
	console.log("Telerik Corp.");
} 
- anonymous functions:
var print = function () {
	console.log("Telerik Corp.");
}

// outer can access only itself and inner, inner and outer, everywhere
function outer () {
	function inner () {
		function mostInner () {

		}
	}
} 

- immediatly executed functions:
(function(){

}());



- TutsPlus: Object-Orieted |JavaScript

	- Primitive types: != Object
		- String
		- Number
		- Boolean
		- Undefined
		- Null

	- Reference types: === Object
		- Object
		- Array
		- Function
		- Date
		- RegExp

		- DOM API, other outer libraries


	- Wrapper objects:
		- only objects can have properties, but:

		'hello'.length 
		>>> 5
			- behind the scenes JavaScript converts it to an object

		new String('hello').length;
		>>> 5

		- from every primitive type can be created an object

		var number = 10;
		num = new Number(10);
		number.property = 'hello';
		num.property 
		>>> 'hello'

	- Creating Objects and Factory Functions:

		- old way:

		var person = new Object();
		person.firstname = 'John';	// properties does no existuntil thet are defined
		person.lasname = 'Doe';

		person.sayHi = function() {	// JavaScript does not have methods but only properties, which may content a method 
			return 'Hi there';
		};
			// objects' public properties and methods are called members 
		
		- Object Literal Notation:

		var person = {
			firstname: 'John',
			lastname: 'Doe', 
			sayHi: function () {
				return 'Hi there';
			}
		}; 

			- much better performance
			- better organization
			- less typing

			- Interface here == object signiture - the object members

		- Factories and Constructor Functions are used for creating objects 

			- Factory:

			var createPerson = function(firstname, lastname) {
				return {
					firstname: firstname;
					lastname: lastname;
					sayHi: function() {
						return 'Hi there';
					} 
				};
			};

			var johnDoe = createPerson('john', 'Doe');

	- The this keyword:

		- in most languages: 
			- so that object can refer to itself inside that object methods

		- in JavaScript:
			- functions are objects
			- if we assign them to a property they become this propertys method
			- so we can change the value of the this keyword
				- by simply assaigning that function to different variable, property 
				- or passing it to another function

		- use bind() to bind methods to a certain this - object
		- IE8 < support

	- Data and Accessor Properties:

		- Object.defineProperty();
			- ECMAScript 5

			var createPerson = function(firstname, lastname) {
				var person = {};

				// args: the object, the name of the property, a descriptor object
				// data descriptors: allows readonly properties,
				// accessor descriptors: get and set functions,
				// 
				Object.defineProperty(person, 'firstname', {
					value: firstname,
					//writable: false 	// if omitted it is read only
					//cofigurable: true // 
					//enumerable: true  // allows the properties to be enumerated with key()
				});

				Object.defineProperty(person, 'lastname', {
					value: firstname,
				});

				// multiple properties
				// args: the object, object with the properties
				Object.defineProperties(person{
					firstname: {		// descriptor object
						value: firstname
					},
					lastname: {
						value: lastname
					},
					fullname: {				// set writable to true to use this property
						get: function() { 
							return this.firstname + ' ' + this.lastname; 
						},
						set: function(value) {
							this.firstname = value;
							this.lastname = value;
						}
					}
				});

				return person;
			}







// * JavaScript OOP:
- OOP means that the application/program is constructed as a set of objects
	- each object has its purpose
	- each object can hold other objects

- JavaScript is  prototype-oriented language
	- uses prototypes to drfine its properties
	- does not have definition for class or constructor

- Dynamic language
	- no types and polymorphism
	- but most things may be achived in many ways
	- many way to support OOP
		- Classical, Functional, Prototypal

- Classical OOP
	
	- uses functions to createe objects
		- no class or constructor
		- functions play the role of object constructors
		- new:

//ex1:

	function Person () {}
	var gosho = new Person();	// instance of Person
	var maria = new Person(); 	// another instance of Person

	- each of the instances is independant
		- they have their own state and behaviors
	- function constructors can take parameters to give instances 

//ex2:

	function Person(name, age) {
		console.log('Name: ' + name + ', Age: ' + age);
	}

	var personGosho = new Person('Georgi', 23);

	// logs: Name: Georgi, Age: 23

	var personMaria = new Person('Maria', 18);

	// logs: Name: Maria, Age: 18

	- Prototypes:

		- every object has a hidden property prototypes
		- its kind of its parent object

		- prototypes have properties available to all instances
			- the object type is the parent of all object
			- all objects has toString() method
		- when adding properties to a prototype, all instances will have these properties

//ex3:

	// adding a method to arrays to sum thier number elements
	Array.prototype.sum = function() {
		var sum = 0;

		for (var i = 0; i < this.length; i++) {
			
			if (typeof this[i] === 'number') {
				sum += this[i];
			}
		}

		return sum;
	}

	var numbers = [1, 2, 3, 4, 5];
	console.log(numbers.sum());
	//logs: 15

	- Objects can also define custom state
		- custom properties that only instance of this type have
	- Use the keyword this
		- to attach properties to object

//ex4:

	function Person(name, age) {
		this.name = name;
		this.age = age;
	}

	var personMamria = new Person('Maria', 18);
	console.log(personMaria.name);

	- Property values can be either variables or functions
		- functions are called methods

//ex5:

	function Person(name,age){
		this.name = name;
		this.age = age;
		this.sayHello = function() {
			console.log('My name is ' + this.name + ' and I am ' + this.age + '-years old');
		}
	}

	var Maria = new Preson('Maria', 18);
	maria.sayHello();

	- Yet attaching methods inside the function constructor is very slow
	- better attach them to the prototype

//ex6:

	function Person(name. age) {
		this.name = name;
		this.age = age;
	}

	Person.prototype.sayHello = function() {
		console.log('My name is ' + this.name + ' and I am ' + this.age + '-years old');
	}

	- There are drawbacks:
		- a function constructor creates a closure, so only objects within its
		scope can access its objects
		- methods attached to the prototype cannot access private data

//ex7:
		//ReferenceError: name is not defined


	- Access Modifiers:

		- Only two kinds:
			- public
			- private

		- How to create private members?
			- just create an variable inside the function constructor
		- pubic members are attached to this


	- The this Function Object:

		- available everywhere
		- but with different meaning
		- this can have two values:
			- Global scope - i.e. window
			- A concreate object - when using the new operator

			- when executed over a function, without the new operator
			this refers ti the parent scope

//ex8:

	function Person(name) {
		this.name = name;
		this.getName = function getPersonName() {
			return this.name;	// here this means the Person object
		}
	} 

	var p = new Person('Gosho');
	var getName = p.getName;	// here this means its parent scope(window)
	console.log(p.getName());	// Gosho
	console.log(getName());		// undefined



			- this is easily fixed
				- just assign this to a variable (self)
				- and use it instead of this

	function Person(name) {
		var self = this;
		self.name = name;
		self.getName = function getPersonName() {
			return self.name;	
		}
	} 

	var p = new Person('Gosho');
	var getName = p.getName;	
	console.log(p.getName());	// Gosho
	console.log(getName());		// Gosho


		- JavaScript cannot limit function to be used only as constructors

//ex9:

	function Person(name) {
		var self = this;
		self.name = name;
		self.getName = function getPersonName() {
			return self.name;	
		}
	} 

	var p = Person('Gosho');	// What will be the value of this?


		- The only way to mark something as constructor is to name it PascalCase
		and hope that the user of your code will so nice to call PascalCase-named
		functions with new

	- Namespaces:

		- How can this be done with JavaScript?
			- maybe JS has the easiest solution
			- just define you objects and meyhods in a closure 
			and return an object that contains them

		- This is called the Module pattern:

//ex10:
	
	var schoolNS = (function() {
		function Person(name, age) {}
		function Student(name, age, grade) {}
		function Teacher(name, age, speciality) {}
		function Class(name) {}
		function School(name) {}
		return {
			Person: Person,
			Student: Student,
			Teacher: Teacher,
			Class: Class,
			School: School
		};
	}());

	var student = new schoolNS.Person('Gosho', 23);

// * Inheritance

- Object Prototypes:

	- JavaScript is prototype-oriented language
		- every object has a prototype	
			- it can be an empty object
		- a prototype contains properties that are shared across 
		all objects with this prototype
		- the prototype can be used to extend the original functionality
			- adding a method to String for escaping

//ex1:
	
	String.prototype.htmlEscape = functioin() {
		return this.replace(/&/g,"&amp").replace(/>/g, "&gt;");
	}

- The Prototype Chain:

	- Objects in JavaScript can have only a single prototype
		- their prototype also has a prototype, etc...
		- this is called the prototype Chain
	- when a prperty is called on an objects
		- this object is searched for the property
		- if the object does not contain such prperty, its prototype is checked for the propert,etc...
		- if null prototype is reached, the result is undefined

- Classical OOP:

	- Classical OOP aims to the way of OOP in C-like languages
		- may be also called functional OOP

	- we define a function, that is used as a constructor and invoked with new
		- these functions are called function constructors
		- they create an object with the given specifics

	- almost every function can be invoked with new 
		- this creates an object scope
		- this contains the instance of the object that is initialized 
		with the function constructor

//ex2:

	function Person(fname, lname) {
		this.introduce = function() {
			return 'Hello! My name is ' + fname + ' ' + lname;
		}
	}

	var joro = new Person('Joro', 'Mentata');
	var pesho = new Person('Pesho', 'Vodkata');
	console.log(joro.introduce());

	//logs: 'Hello! my name is Joro Mentata'

- Inheritance in Classical OOP:

	- Inheritance is a way to extend the functionality of an object, into another object
		- like Student inhrits Person
		- Person inherits Mammal, etc...

	- In JavaScript, inheritance is achived by setting the prototype of the derived type 
	to an instance of the super type

//ex3:

	function Person(fname, lname) {}
	function Student(fname, lname, grade) {}

	Student.prototype = new Person();

		- now all instances of the type Student are also of type Person 
		and have Person functionality

	var student = new Student('Kiro', 'Troikata', 7);

	-  Inheritance is done through prototypes
		- set the prototype of an object to its parent
		- need to set the correct constructor

	function Person(name, age) {
		this.name = name;
		this.age = age;
	}
	function Student(name, age, grade) {	
		this.name = name;					// repaeting code not quite good, right?
		this.age = age;
		this.grade = grade;
	}

	Student.prototype = new Person();
	student.prototype.constructor = Student;

	var isStudentPerson = new Student() instanceof Person;

	- Yet this is not fully usable Inheritance
		- the parent consructor is not reused
	- Remember call and apply?
		- Person is just a function, so it has them

//ex4:
	
	function Person(name, age) {
		this.name = name;
		this.age = age;
	}
	function Student(name, age, grade) {
		Person.apply(this, arguments);	//Person.call(this, name, age);
		this.grade = grade;
	}

	Student.prototype = new Person();
	Student.prototype.constructor = Student;

- Access Modifiers in Classical Inheritance:

	- Classical OOP supports data hiding
		- some of the state and behavior of an object can be hidden to outside objects
		- done with closure

	- To make an object hidden (private), just initialize it inside the 
	function constructor (with var)
	- To make an object visible(public) to outside objects, attach it to this

//ex5:

	function Person(fname, lname) {
		var fullname  = fname + ' ' + lname;
		this.sayName = function() {
			return fullname;
		}
	}	

- Duplicated Functions:

	- Support for hidden (private) data is costly
		- if a function should have an access to a private object, the function and
		the object should be declared in the same scope
			- in the function constructor
	
	- Functions in function constructor are slow
		- each time an object is instantiated with a function constructor, all member 
		functions are created anew
			- if we have N Persons, there will be N identical functions fullname()

	- Coping of the same function many times gets both runtime and memory
		- imagine a function constructor with 15 different public functions
			- and 100 objects that are created with this constructor
			- these are 1500 functions, when they can ve just 15

	- The solution?
		- use private data only when it is really necessary

- All Public Data:

	- The solution to duplicated member functions is to make all the data public
		- and then attach the methods to the prototype of the function constructor
		- that way all instances of this function constructor share the same prototype

//ex6:
	
	function Person(fname, lname) {
		this.fname = fname;
		this.lname = lname;
	}

	Person.prototype = {
		fullname: function () {
			return this.fname + ' ' + this.lname;
		}
		changeFname: function(fname) {
			this.fname = fname || this.fname;
		}
	}

- Functional Inheritance:

	- Functional inheritance can be achived by extending the prototype of the Function object

//ex7:
	
	Function.prototype.inherit = function(parent) {
		var oldPrototype = this.prototype;
		var prototype = new parent();
		this.prototype._super = prototype;
		for(var prop in oldPrototype) {
			this,prototype[prop] = oldPrototype[prop];
		}
	}

		- now we can inherit this way:

	var Person = Class.create({...});
	var Student = Class.create({...});

	Student.inherit(Person);

- Prototypal OOP:

	- Uses the prototypal nature of JavaScript to produce objects
		- objets are created from functions
	- In proptypal OOP all properties of objects are public

	- Create an Object templete
		- then clone it into another object

//ex8:

	var Person = {
		init: function() {...},
		fullname: function() {...}
	}

	var pesho = Object.create(Person);
	pesho.init('Peter', 'Petrov', 'Pesho Vodkata');
	var joro = Object.create(Person);
	joro.init('Georgi', 'Georgiev', 'Joro Mentata');

	- Objects create objects
	- Object.create() is nit supported everywhere

	if(!Object.create) {
		Object.create = function(obj) {
			function f() {};
			f.prototype = obj;
			return new f();
		}
	}

	- Create an empty function constructor
		- set its properties to the object
		- create and return an instance of the function constructor


- Prototypal Inheritance:

	- Prototypal inheritance is not like Classical
	- All instances are created from common JavaScriptobjects
	- i.e. instanceof does not work
	- Much like the Object.create(), but adds more properties to the object

//ex9:

	var Person = {...}
	var Student = Person.extend({...});

	- The implementation of the object.extend() is custom and must be implemented manually

//ex10:

	Object.prototype.extend = function(properties) {
		function f() {};
		f.prototype = Object.create(this);

		for(var prop in properties) {
			f.prototype[prop] = properties[prop];
		}
		f.prototype._super = this;
		return new f();
	}

- Classical Inheritance with Object.create:
	
	- Syntax:
		Object.create(proto [, propertiesObject ])

		- proto
    		- The object which should be the prototype of the newly-created object.
    	
    	- propertiesObject
    		- If specified and not undefined, an object whose enumerable own properties 
    		(that is, those properties defined upon itself and not enumerable properties 
    		along its prototype chain) specify property descriptors to be added to the
    		newly-created object, with the corresponding property names. These properties 
    		correspond to the second argument of Object.defineProperties.
	
	// Shape - superclass
	function Shape() {
	  this.x = 0;
	  this.y = 0;
	}

	// superclass method
	Shape.prototype.move = function(x, y) {
	    this.x += x;
	    this.y += y;
	    console.info("Shape moved.");
	};

	// Rectangle - subclass
	function Rectangle() {
	  Shape.call(this); // call super constructor.
	}

	// subclass extends superclass
	Rectangle.prototype = Object.create(Shape.prototype);
	Rectangle.prototype.constructor = Rectangle;

	var rect = new Rectangle();

	rect instanceof Rectangle // true.
	rect instanceof Shape // true.

	rect.move(1, 1); // Outputs, "Shape moved."

- Useful tricks and hints:

	- this
		- to avoid confusion over to what this refers use self in function constructors 

	function Person (lname, fname ) {
		var self = this;

		// code goes here:

		return self;	// makeke no sense, but supports older browsers
	}

	- _ 
		- there is no good way to make private methods, data 
		- use to communicate to others that thisis intended to be private 

	Person.prototype._someMethod = function () {}

	- Object.create():
		- not included in all browsers
		- included it in a separete file with:

	(function(){
		if (!Object.create()) {
			Object.create = function createObject (obj) {
				function f () {};
				f.prototype = obj;
				return new f();
			}
		};
	}());


// ===================================================
// Douglas Crockford: 

	// Function the Ultimate:

 - the key thing in JavaScript

 - function expression 
 	- produces instance of a function object
 	- function objects are first class
 	- inherit from Function.prototype
 		- functions can have methods

 - var statement
 	- a variable declared anywhere within a function is 
 	 visible everywhere within the function

 	- it gets split into two parts:
 		- The declaration part gets hoised to the top of
 		 the function, initializing with undefined
 		- The initialization part turns into an ordinary assaignment

		var myVar = 0, myOtherVar;

		// expands into:
		var myVar = undefined,
			myOtherVar = undefined;
			...
		myVar = 0;

- function statement
	- looks a lot like function expression
	- mandatory name, parameters, ...

	- it is just a short-hand for a var statement with a function value.

	function foo() {}

	// expands to:

	var foo = function foo() {};

	// expands to:

	var foo = undefined;
	foo = function foo() {};

	- the assaignment of the function is also

- expression v statement

	- if the first token in a statement is function,
	 then it is a function statement

- Scope

	- blocks do not have scope, only functions
	- variables defined in a function are not visible outside of the functionality

- Thus:
	
	- Declare all variables at the top of the function
	- Declare all functions before you call them

- Return statement

	return expression;

	or

	return;

	- If there is no expression, then the return value is undefined
	- Exept for constructors, whose default return value is this

	- you cannot set linereturn between the return and the expression
	 it will return undefined

- Two pseudo parameters

	- arguments
		- when a function is invoked, in addition to its parameters,
		 it also gets a special parameter called arguments
		- containing all of the arguments form the invocation
		- it is an array-like object
		- arguments.length is the number of arguments passed
		- weird interaction with parameters
			- do not mess with it, it is readonly
			- you may reassign the arguments


	- this (unfortunately)
		- contains a reference to the object of invocation
		- allows a method to know what object it is concerned with
		- allows a single function object to serve many functions
		- is key to prototypal inheritance

- Invocation 

	- The ( ) suffix operator surrounding zero or more comma separated arguments
	- The argument will be bound to parameters
	- too many arguments will be ignored
	- too few arguments, the missing will be undefined
	- There is no implicit type checking on the arguments

	- Four ways to call a function:

		- Function form:
			- this is set to the global object
			- but fixed in ES5/Strict to undefined
			- an inner function does not get access to the outer this
				- so use that or self:

					var that = this;

			functionObject(arguments)

		- Method form:
			- this is set to thisObject, the object containing the function
			- this allows methods to have a reference to the object of interest

			thisObject.methodName(arguments)
			thisObject["methodName"](arguments)

		- Constructor form:
			- a new object is created and assigned to this 
			- if there is not an expliced retirn value, then this will be returned 
			- used in the Pseudoclassical style

			new FunctionObject(arguments)

		- Apply form:
			- allows for calling the function, explicitly specifying thisObject 
			- can take an array or sequance of parameters	

			functionObject.apply(thisObject, [arguments])

- Side Effects

	- 


// ===============================================================
- Summary:
// ===============================================================

- Classical Inheritance:
	
	// super class Person  
	function Person(fname, lname) {
		this.fname = fname;
		this.fname = lname;
	}
	// attach method to Person
	Person.prototype.toString = funtion() {
		console.log(this.fname + ' ' + this.lname);
	}

	// subclass Student
	function Student(fname, lname, grades) {
		Person.apply(this, arguments);	// Inherit constructor(superclass properties), == Person.call(this, name, age);
		this.grades = grades;
	}

	// Inherit Person
	Student.prototype = new Person();
	Student.prototype.constructor = Student;

	// override toSring for Student
	Student.prototype.toString = function() {
		consoe.log(this.fname + ' ' + this.lname + ' ' + this.grades.join(', '));
	}