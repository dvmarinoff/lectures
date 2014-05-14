/* JavaScript UI manual */
/ * The DOM:
- The DOM is an API for HTML and XML documents
	- provides a structural representation of the document
	- enable developers to modify the content and visual presentation of a web page
	- the DOM consists of many objcts to manipulate a web page
		- all properties, methods and events are organized into objects
		- those objects are accessible through programming languages and scripts

	- each of the HTML elements have corresponding DOM object types:
		- HTMLLIElement represents <li>
		- all of those have properties - a - href
		- the document object is a special object - it represents the entry point
		- also properties corresponding to their content:
			- innerHTML - returns as a string the content of the element, without of the elemrnt
			- only innerHTML is supported in all browsers. outerHTML and the others are not

- selecting:

	- by Id:
	var header = document.getElementById("header");
	- by Class:
	var posts = document.getElementByClasName("post-item");
	- By Tag Name:
	var aside = document.getElementsByTagName("aside");
	- By Name: the name="" attribute
	var genderGroup = document.getElementsByName("genders[]");
	- By Class Name:

	- query element:
	var nainNav = document.querySelector("#mainNav");
	var navItems = mainNav.querySelectorAll("ul > li > a");

- Traversing the DOM:
	- DOM elements have properties about their position in the DOM tree:
		- their parent 
			- element.ParentNode - returns the direct parent
		- their children
			- element.childNodes - returns nodeList of all the child 
								 noodes(including the text node(whitespaces))
		- their siblings - elements before and after the element
	- these properties can be used to traverse through the DOM

- DOM manipulation:
	- DOM element is a JavaScript object that represents an element from the HTML
		- selected using any of the DOM selectors
		- created dynamically from code

<script>
/// adds li to the ul with id="list"
list = document.getElementById("list");
list.innerHTML +='<li class="list-item">' + time + '</li>';
</script>

- createElement: 
	- When HTML elements are created dynamicaly they are just JavaScript objects
		- They are still not in the DOM(the web page)
		- new HTML elements must be appended
	
	- parent.insertBefore(newNode, specificElement);	// supported everywhere
	- parent.insertAfter(newNode, specificElement);		// not supported everywhere

<script>
/// creates new li element and appends it
var studentList = document.createElement("ul");
var liElement = document.createElemant("li");
studentList.appendChild(studentLi);
document.body.appendChild(studentList);
</script>

- DocumentFragment:
	-


- Removing elements:
	- element.removeChild(elementToRemove)

- Altering elements:


- NodeList:
	- the collection returned by the DOM selectors
	- it's an object similar to an array, has length and indexer 

-------------------------------------------------------------------------------------
/ * Events:
/// will change the bgcolor of an element passed by id
<script>
var changebgcolor = function(id){
    var element = document.getElementById(id);
    el.style.background="#297"; 
}
changecolor("wrapper");
</script>

//Event listeners:

/// This method shouldbe used with modern web pages. Won't work in IE 6-8
// Assuming myButton is a button element
myButton.addEventListener('click', function(){alert('Hello world');}, false);


/// addEventListener():
<html>
	<table id="outside">
    	<tr><td id="t1">one</td></tr>
    	<tr><td id="t2">two</td></tr>
	</table>
</html>
// Function to change the content of t2
function modifyText(new_text) {
  var t2 = document.getElementById("t2");
  t2.firstChild.nodeValue = new_text;    
}
 
// Function to add event listener to table
var el = document.getElementById("outside");
el.addEventListener("click", function(){modifyText("four")}, false);

- JavaScript Events
	- Event registration:
		- using dot notation:


	document.getElementById('pink').onclick = function() {
		console.log();
	}

	
	    - addEventListener:

document.getElementById('pink').addEventListener('click', function() {
	console.log();
}, false);
			
			- event propagation - it allows to check for multiple events within a single call
			- events may be triggered by non-dom elements
			- supported IE9+
	- event support
		-  < IE8 
			- attachEvent
document.getElementById('pink').attachEvent('onclick', function() {
	console.log();
}, false);

if(window.addEventListener) {
	document.getElementById('pink').addEventListener('click', function() {
		console.log();
	}, false);	
} else if(window.attachEvent) {
	document.getElementById('pink').attachEvent('onclick', function() {
		console.log();
	}, false);
}
		- jQuery has the best support for older browsers:

$('#pink').on('click', function(event) {
	console.log();
});

	- Event Properties
		- capturing an event returns an object
		- may be different in browsers
		- lots of browser and environment info

console.log(e);

		- Event Info - event type
					 - timestamp
					 - defaultPrevented
		- Targeting Info - target - the element the event originated  frfom
						 - toElement - deal with mousein and mouseout events
						 - srcElement - the actual element that fired the event
						 - fromElement - deal with mousein and mouseout events
						 - currentTarget - the element the event was asinged to
		- Coordinate Info - screen X,Y - gives the position relative to the users screen
						  - client X,Y - relative to the window
						  - offset X,Y - the positions relative to the event that fired the event
						  - page X,Y - relativ to the html document
						  - layer X,Y - relative to anotherpositined event

			- not much reliable
		- Key/ Mouse Info - shiftKey
						  - altKey
						  - ctrlKey
						  - charCode/ keyCode
						  - button
	- Event propagation:
		- an element can capture all the events of it's child elements
		- Capturing vs Bubbling - browser desagree on support for which one. Chrome supports both
			- capturing goes down the dom
			- bubbling goes up the dom

	- Stopping eventpropagation:
		- stopPropagation()
		- IE 8 < cancelbubble = true

e.stopPropagation();

	- Canceling default behavior:
		- priventDefault()

- Common events:
	- Removing DOM elements:

document.querySelector('.grid').addEventListener('click', function(e) {
	console.log(e);
});

document.querySelector('.grid').addEventListener('click', function(e) {
	var removeTarget = e.target.parentNode;
	removeTarget.parentNode.removeChild(removeTarget);
} false);

	- Cleaning up event issues:

document.querySelector('.grid').addEventListener('click', function(e) {
	if(e.target.tagName === 'IMG') {
		var howmany == this.querySelectorAll('li').length;

		if(howmany > 1) {
			var removeTarget = e.target.parentNode;
			removeTarget.parentNode.removeChild(removeTarget);
		} else{
			var photoTitle = e.target.alt;
			document.querySelector('#art p').innerHTML = "<p>Ypu've picked: " + photoTitle + "</p>";
		}	// howmany
	}	// check to see that I clicked on IMG only
} false);	// click event

	- Creating DOM elements:

document.querySelector('.grid').addEventListener('mouseover', function(e) {
	if(e.target.tagName === 'IMG') {
		
		var myElement = document.createElement('div');
		myElement.className= 'preview';
		e.target.parentNode.appendChild(myElement);

		var myImg = document.createElement('img');
		var imgLoc = e.target.src;
		myImg.src = imgLoc.substr(0, imgLoc.length - 7) + '.jpg';
		myElement.appendChild(myImg);
		
		// remove eventListener
		e.target.addEventLitener('mouseout', function handler(d) {
			var myNode = d.target.parentNode.querySelector('div.preview');
			myNode.parentNode.removeChild(myNode);
			e.target.removeEventListener('mouseout', handler, false)
		}, false);

	} // check to see that I clicked on IMG only
}, false); // click event

	- Removing an event:

	- Preventing default events:

e.preventDefault();

e.target.addEventListener('mousemove', function(f) {
	myElement.style.left = f.offsetX + 15 + 'px';
	myElement.style.top = f.offsetY + 15 + 'px';
});

- Time-based events
	- 

<script>
	document.querySelector('img.preview').addEventListener('click', function() {
		var lowRes = e.target.src;
		var myOverlay = document.querySelector('.overlay');
		var highRes = document.createElemant('img');
		var mySpinner = document.createElement('img');

		myOverlay.style.display = 'block';
		highRes.className = 'bgImg';
		highRes.src = lowRes.substr(0, lowRes.length - 7) + '.jpg';
		myOverlay.appendChild(highRes);

		mySpinner.className = 'spinner';
		mySpinner.src = 'images/spinner.gif';
		myOverlay.appendChild(spinner);

		highRes.addEventListener('load', function() {
			mySpinner.parentNode.removeChild(mySpinner);
		});

	}, false);
</script>
------------------------------------------------------------------------------------------
/ * moustache.js
-
<script>
// object
var phone = {
	vendor: "Samsung",
	model: "Galaxy S4",
	os:{
		name: "Android",
		version: "Jelly Bean"
	}
}

// mustache 
var templete = "My phone is{{vendor}} {{model}} and it" +
				" is running {{os.name}} {{os.version}}"; 
var output = Mustache.render(templete, phone);

// DOM
document.getElementById("content").innerHTML = output; 
</script>

- sections:
	- is a place where list data is evaluated
	- like if-else statement
	- evaluate the value property,and if it is evaluated to "true", shows it
	- starts with {{#prop_name}} and ends with {{/prop_name}}

<script>
var student = {
	name: "Pesho Georgiev",
	marks: [...]
}
var templete = "{{name}} has " + "{{#marks}} {{marks.length}}" +
				"{{/marks}} marks";
</script>

-----------------------------------------------------------------------------------------------------------
/ * jQuery:
- $ - is the variable jQuery
	- do not override it
- $() - the jQuery function

- $(document).ready()

-
	- is() - cheches for condition
	- css() - access css property
	- find() - search for descendant element by condition
	- attr() - access html atributes
	- html() - changes html
	- append() - adds new html
	- on() - may register one or many events as key value in an object

-----------------------------------------------------------------------------------------------------------	
/ * Canvas

- Basic Usage:



<html>
 <head>
  <script type="application/javascript">
    function draw() {
      var canvas = document.getElementById("canvas");
      if (canvas.getContext) {
        var ctx = canvas.getContext("2d");

        ctx.fillStyle = "rgb(200,0,0)";
        ctx.fillRect (10, 10, 55, 50);

        ctx.fillStyle = "rgba(0, 0, 200, 0.5)";
        ctx.fillRect (30, 30, 55, 50);
      }
    }
  </script>
 </head>
 <body onload="draw();">
   <canvas id="canvas" width="150" height="150"></canvas>
 </body>
</html>

- Drawing Shapes:

- Rectangle: 
	
	- fillRect(x, y, width, height)
	    Draws a filled rectangle.

	- strokeRect(x, y, width, height)
	    Draws a rectangular outline.

	- clearRect(x, y, width, height)
	    Clears the specified rectangular area, making it fully transparent. 

- Drawing Paths:

	
	- beginPath()
	    Creates a new path. Once created, future drawing commands are directed into the path and used to build the path up.
	- closePath()
	    Closes the path so that future drawing commands are once again directed to the context.
	- stroke()
	    Draws the shape by stroking its outline.
	- fill()
	    Draws a solid shape by filling the path's content area. 

- Drawing a triangle:

	-  

	function draw() {
	  var canvas = document.getElementById('canvas');
	  if (canvas.getContext){
	    var ctx = canvas.getContext('2d');

	    ctx.beginPath();
	    ctx.moveTo(75,50);
	    ctx.lineTo(100,75);
	    ctx.lineTo(100,25);
	    ctx.fill();
	  }
	}

	- moving the pen:

		- moveTo(x, y)
    		Moves the pen to the coordinates specified by x and y

	- smily face
	
	function draw() {
	  var canvas = document.getElementById('canvas');
	  if (canvas.getContext){
	    var ctx = canvas.getContext('2d');

	    ctx.beginPath();
	    ctx.arc(75,75,50,0,Math.PI*2,true); // Outer circle
	    ctx.moveTo(110,75);
	    ctx.arc(75,75,35,0,Math.PI,false);   // Mouth (clockwise)
	    ctx.moveTo(65,65);
	    ctx.arc(60,65,5,0,Math.PI*2,true);  // Left eye
	    ctx.moveTo(95,65);
	    ctx.arc(90,65,5,0,Math.PI*2,true);  // Right eye
	    ctx.stroke();
	  }
	}

- Lines:

	
	- lineTo(x, y)
    	Draws a line from the current drawing position to the position specified by x and y.



    	 
-----------------------------------------------------------------------------------------------------------	
/ * JavaScript Applications
// Web Storages
- places to store data 
	- save user settings, so next time he opens the application, 
	they can be loaded
- Three common types of Web Storage:
	
	- Cookies
		- accesible from a concrete application
		- stored in the user;s browser
			- i.e. different cookies for different browsers
		- cookies can store only plain text
		- Cookies are used to save some state of the user preferences and settings
			- cookies are attached to the headers of every HTTP request to the server
		- can be read and set by JavaScript

		- Three parts:
			- a name-value pair that holds the cookie information
				- to read a cookie, you must search for the name
			- an expire date, after which this cookie is not available
			- a domain and path to the server, that the cookie belongs to

		- Access with:

			document.cookie property

			- Not strings, but they are used as strings:

			//set a cookie
			document.cookie = 
				'c1=cookie1; expire=Thu, 30 Apr 20014 21:44:00 UTC; path=/'

			// read all cookies
			document.log(document.cookie);

			- read cookie:
			<script>
			function readCookie(name) {
				var allCookies = document.cookie.split(';');

				for(var i = 0; i < allCookies.length; i++) {
					
					var cookie = allCookie[i];
					var trailingZone = 0;

					for(var j; j < cookie.length; j++) {
						
						if(cookie[j] != " ") {
							break;
						}

					} // end inner for loop

					cookie = cookie.substring(j);

					if(cookie.startsWith(name + '=')) {
						return cookie;
					}
				} // end outer for loop

			}
			</script>


	- Local Storage
		- is per document storage
		- accessible through document.localStorage
		- similar to cookies, but stores much larger amount of data
		- supprot down to IE8
		- save data as string
		- local storage properties:
			- setItem(key, value)
			- getItem(key)
			- removeItem(key)
			- length

			<script>
			function saveState(text) {
				localStorage["text"] = text;
			}
			function restoreStorage() {
				return localStorage["text"];
			}

			// same as

			function saveStorage(text) {
				localStorage.setValue("text", text);
			}
			function restoreStorage() {
				return localStorage.getValue("text");
			}
			</script>

	- Session Storage
		- last as long as the browser is open
		- opening page in new window or tab starts a new session
		- great for sensitive data(e.g. banking sessions)
		- can store only strings

		<script>
		function incrementLoads() {
			if(!sessionStorage.counter) {
				sessionStorage.setItem(" counter ", 0);
			}

			var counter = parseInt(sessionStorage.getItem("counter"));
			currentCount++;

			sessionStorage.setItem("counter", currentCount);

			document.getElementById("countDiv").innerHTML = currentCount;
		}
		</script>


// Promises and asynchronious programming



// HTTP and AJAX



// Consuming remote data with JavaScript



// Google API



-----------------------------------------------------------------------------------------------------------
/ * Angular.js

/ * Modules, Routes and Factories
// modularity
- 1. module can have 2. config function it can be defined to use 3. routes, 
 which are associated with 4. views and the  5 .controller going with the view

- modules are conteiners

// creating a module
var demoApp = angular.module('demoApp',['helperModule']);
	- access the module through the angular object 
	- in the array the dependancy injection goes. The module may relay on other modules to get data
	- a very flexible way to access other module at runtime

// creating a controller in a module
ex1: 
	// with anonymous function
demoApp.controller('SimpleController', function($scope) {
	$scope.customers = [
		{ name: 'Dave Jones', city: 'Phoenix' },
		{ name: 'James Riley', city: 'Atlanta' },
		{ name: 'Heedy Wahlin', city: 'Chandler' },
		{ name: 'Thomas', city: 'Seattle' }
	];
});

ex2:
	// prototype way
var demoApp = angular.module('demoApp', []);

var controllers = {};	// empty object literal

controllers.SimpleController = function($scope) {
	$scope.customers = [
		{ name: 'Dave Jones', city: 'Phoenix' },
		{ name: 'James Riley', city: 'Atlanta' },
		{ name: 'Heedy Wahlin', city: 'Chandler' },
		{ name: 'Thomas', city: 'Seattle' }
	];	
};

controllers.anotherController = function() {};

demoApp.controller(controllers);

	// making the app konw aboutthe module
html data-ng-app="demoApp"

// the role of routers
- help us to load different views on our shell page
- defining routes

var demoApp = angular.module('demoApp', []);

demoApp.config(function($routeProvider) {
	$routeProvider
		.when('/', 
			{
				controller: 'SimpleController',
				templeteUrl: 'View1.html'
			})
		.when('/partial2',
			{
				controller: 'SimpleController',
				templateUrl: 'View2.html'
			})
		.otherwise({ redirectTo: '/' });
});

// using factories and services
-




----------------------------------------------------------------------------------

/ * Node.js

- Building blocks
	- libuv - high-p erformance event I/O library
	- V8 - Google Chrome's JavaScript engine
	- JavaScript -> C++

- Install - Ubuntu - apt-get install nodejs
		  - test - console.log('hello nodejs')

- IDE - Cloud9 - works in the browser

- The Event Loop -
	
	- node.js uses the javascript event loop

	- standart server behavior
		- like bartender in a coffee house

	- event loop
		- like the casheers in mcdonalds
		- node is not asynhronius, only the libraries

ex1:

	// non-blocking operation - first article than section will be executed
	// else only section in blocking
	setInterval(function() {
		console.log('section');
	}, 2000);
		
	console.log('article');

- Modules -

	- modules are used with 'require'

	var first = require('first');
	var second = require('second');
	var justPart = require('largeModule').justPart;

	var propertyResult = 2 + first.property;	// export variable
	var functionResult = first.function() * 3;	// export function

	var second = new Second();	// export object

	console.log(justPart());	// export part of object

	- build-in modules
		- fs, http, crypto, os

ex2:

	// standart
	/*
	var fs = require('fs');

	var fileText = fs.readFileSync('./buildInModules.js', 'utf8');

	console.log(fileText);
	console.log('finish');
	*/
	// asynhronius
	var fs = require('fs');
	var http = require('http');

	fs.readFile('./buildInModules.js', 'utf8', 
		function(error, fileText) {
			
			if(error) {
				console.log('File cannot be read ' + error);
				return;
			}

			console.log(fileText);
		});

	//console.log('finish');	// will be logged first

	http.createServer(function(request, response) {
		response.writeHead(200);
		response.write('Hello!');
		response.end();
	}).listen(1234);	// port

	console.log('Server running on port 1234...'); 

		- Your Modules
			- each .js file is a different module
				- are 'require'-ed with file system semantics
				- '.js' is not needed in the string

	var data = require('./data');	// in same dir
	var a = require('./other/a');	// in child dir
	var b = require('../lib/b');	// in parent dir's child
	var justPart = require('./data').part;	// just part of module

	- Third-party Modules
		- npm package manager
		
	npm install mdl_name

		- include with 'require'

- npm 

	- npm init - creates a project with package.json object
		       - depenadances are declared there
		       - npm install will build them if broken from that file

- Advanced Node.js
	- file system

ex3:
	
	- streams
		- readable
			- process.stdin
			- events
				- readable, data, end, close, error
			- methods
				- read, pause, resume, pipe, unpipe, unshift
			- implementation interface
				- _read(size)
				- push(chunck,[encoding])

		- writable
			- process.stdout
			- events
				- drain, finish, pipe, unpipe, error
			- methods
				- write, end
			- implementation interface
				- _write(chunk, encoding, callback)

		- duplex - both
			- tcp sockets

		- transform - duplex streams where the output is computer from the input
			- zlib, crypto

	- buffers
		- js is unicode friendly, but not the best when it comes to binary data
		- handles octet streams
		- can be easily transformed into js objects by setting
		an encoding in the buffer;s toString() method

	- events
		- the event loop is a while(true) loop
		- event emitters

	- debugging
		- Node inspector


- Server with Node.js
	- request

	- response

	- route requests
		- 

ex4:

	var http = require('http');
	var url = require('url');
	var querystring = require('querystring');

	http.createServer(function(req, res) {
		res.writeHead(200, {
			'Content-Type': 'text/plain'
		});	// return success header

		var parsedUrl = url.parse(req.url);

		//console.log(parsedUrl);

		console.log(parsedUrl.path);
		console.log(parsedUrl.pathname);
		console.log(parsedUrl.query);

		var parsedQuery = querystring.parse(parsedUrl.query);
		console.log(parsedQuery);

		resl.write(parsedQuery.search.toString());

		res.end();	// finish processing current request
	}).listen(1234);

		- node.js as client
			- http.request and http.get
				- both have (options, callback) signiture

	var req = http(option, function(res) {
		console.log('STATUS: ' + res.statusCode);
		console.log('HEADERS: ' + JSON.strigify(res.headers));
		res.setEncoding('utf8');
		res.on('data', function(chunk) {
			console.log('BODY: ' + chunk);
		});
	});

	http.get("http://www.google.com/index.html",function(res) {
		console.log("Got response: " + res.statusCode);
	})


- ExpressJS
	- Connect for NodeJS
		- a middleware framework for node build on top of node's http Server
		- npm install connect
		- request processing pipeline

Request -> || || || || || -> Response

Middleware(logging, authentication, etc.)

	// standart
	var http = require('http');

	http.createServer(function(req, res) {
		res.writeHead(200, {
		
		})
		res.write('My server is runnng')
		res.end();
	})

	// connect - allows to add code before the server create
	var connect = require('connect');

	var app = connect()
		.use(connect.loger('dev'))
		.use(connect.static('public'))
		.use(function(req, res) {
			res.end('hello world\n');
		});

	http.createServer(app).listen(3000);

	// npm install util
	var connect = require('connect');
		util = require('util');

	var interceptorFunction = function(request, response) {
		console.log(util.format('Request for %s with method %s',
			request.url, request.method));
		next();
	};

	var app = connect()
		// .use('/log',interceptionFunction)
		.use(interceptionFunction)
		.use(function onRequest(request, response) {
			response.end('Hello from Connect!');
		}).listen(3001);

	- node monitor
		- watches for changes and restarts server
		- npm install nodemon -g

nodemon app.js

	- Express.js
		- built on top of connect middleware
		- adds functionality to Connect
			- request/ response enhancements
			- routing - determins which function to handle the request
			- view support
			- html helpers
				- view engine
					- jade for begginers
			- content negotiation
	
		- Basic Architecture:

Request -> Routing -> Function -> View file, XML, JSON, etc.

	// npm install express
	var express = require('express');

	var app = express();

	app.get('/'. function(request, response) {
		response.send('Welcome to Express!');
	});

	app.get('/customer/:id', function(req, res) {
		res.send('Customer request is ' + req.params[])
	});

	app.listen(3000);

		- Views:

	// demo views - npm install jade
	var express = require('express');
		path = require('path');

	var app = express();
	app.configure(function() {
		app.set('views', __dirname + '/views');
		app.set('view engine', 'jade');
		app.use(express.static(path.join(__dirname, 'public')));
	});

	app.get('/', function(req, res) {
		res.render('empty');
	});

	app.listen(3000);


	// view
	doctype
	html(lang="en")
		head
			title Welcome to this empty page
		body

	// layout demo
	// like include('header'.php);, inclide('footer.php');
	// layout will be included with extends
// layout.jade
doctype	
	html(lang="en")
	head
		title Crm Portal
	body
		header
			nav
				ul
					li
						a
		
		footer
			.copyright Copyright &copy 2014

// index.jade
extends layout

block content
	p
		Welcome to the CRM Portal




