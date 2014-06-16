//ex:1
var http = require('http');

http.createServer(function (req, res) {
	res.writeHead(200, {
		'Content-Type': 'text/plain'
	}); // return success header as json

	res.write('My Server is running! =)'); // response
	res.end(); //finish processing current request
}).listen(1234);



//ex:2
// request object - properties
var http = require('http'),
	port = 1234,
	products = {
		'bread': 1.5,
		'butter': 3.49
	};

http.createServer(function (req, res) {

	console.log(req.url);
	console.log(req.method);
	console.log(req.headers);

	res.writeHead(200, {
		'Content-Type': 'application/json'
	}); // return success header as json

	res.write(JSON.stringify(products)); // response
	res.end(); //finish processing current request
}).listen(port);

console.log('Server is running on port ' + port);


//ex:3
// response wrapper - response codes
// order is - writeHead(code, {headers}), write(), end()

res.writeHead(200, {
	'Content-Type': 'text/plain',
	'Set-Cookie': ['type=ninja', 'language=javasvript']
});

//ex:4
// parse url and querystring

var http = require('http'),
	url = require('url'),
	querystring = require('querystring'),

	http.createServer(function (req, res) {

		res.writeHead(200, {
			'Content-Type': 'text/plain'
		});

		var parsedUrl = url.parse(req.url);

		console.log('1: ' + req.url);
		console.log('2: ' + parsedUrl.path);
		console.log('3: ' + parsedUrl.pathname);
		console.log('4: ' + parsedUrl.query);

	}).listen(1234);


//ex:5
// node.js as a client
var http = require('http');

http.get('http://www.telerikacademy.com/', function (academyRes) {

	console.log(academyRes.statusCode);

	var body = '';

	academyRes.on('data', function (data) {
		body += data;
	}); // accumulate the incoming from the GET request data in the body variable

	academyRes.on('end', function (body) {
		res.write(body);
		res.end(); // privent from earlier execution of the  end()
	}); // wait for the get request to finish and do this

}); // make a get request to another server - returns response

//ex:6
// Express.js introduction
var express = require('express');

var app = express();

app.get('/', function (request, response) {
	response.send('Welcome to Express! =)');
});

app.get('customers/:id', function (req, res) {
	res.send('Customers request is ' + req.params['id']);
});

app.listen(3000);

//ex:7
// exporting functionality
// customers.js

exports.view = function (req, res) {
	res.send('Customers request is ' + req.params['id']);
}; // view is the name of the function

// app.js
var customer = require('./routes/customers');

app.get('/customer/:id', customer.view);


//ex:8
// custom middleware in express.js application
var express = require('express'),
	path = require('path'); // librarry for

var app = express();

// attach middleware 
app.configure(function () {
	app.use(express.logger('dev'));
	app.use(express.favicon());
	app.use(app.route);
	app.use(express.static(path.join(__dirname, 'public'))); // all resources in the public directory will be send directly to the user
});

app.listen(3000);

//ex:9
// views, based on templetes
var express = require('express'),
	path = require('path'), // librarry for
	stylus = require('stylus');

var app = express();

app.config(function () {
	app.set('views', __dirname + '/views'); // look for the views first here
	app.set('view engine', jade); // use jade as templete engine
	app.set(stylus.middleware(__dirname, 'public')); // register as middlewere and declare directory for stylus
	app.use(express.static(path.join(__dirname, 'public')));
});

app.get('/', function (req, res) {
	res.render('empty');
});

app.get('/:viewname', function (req, res) {
	res.render(req.params.viewname);
});

app.listen(3000);

// empty.jade
/*

doctype
html(lang="en")
	head
		title Welcome to empty page 
	body

*/
// layout - block content - insert here, extends layout - declare that it extends the main layout 

//ex:10
// working with data
// repository pattern
// db.js - simulates database
var customerDb = {};
var id_inc = 0;

exports.listCustomers = function () {
	return customerDb;
};

exports.addCustomer = function (customer) {
	id_inc = id_inc + 1;
	customer.id = id_inc;
	customerDb[customer.id] = customer;
};

exports.deleteCustomer = function (id) {
	customerDb[id].remove();
};

exports.updateCustomer = function (customer) {
	customerDb[customer.id] = customer;
};

//ex:11



//ex:12


/* Express */
//ex:1
var express = require('express'),
	http = require('http');

var app = express();

app.configure(function () {
	app.set('port', process.env.PORT);
	app.use(express.bodyParser());
});

app.get('/', function (req, res) {
	res.send('Hello, Express!');
});

app.get('/hi', function (req, res) {
	var message = [
		'<h1> Hello, Express</h1>',
		'<p> Welcome to Express App Tutorial</p>'
		'<ul><li>fast</li>',
		'<li>fun</li>',
		'<li>flexible</li></ul>'
	].join('\n');

	res.send(message);
});

app.get('/users/:userId', function (req, res) {
	res.send('<h1>Hello, User # ' + req.params.userId + '!');
});

app.post('/users', function (req, res) {
	res.send('Creating a new user with the name ' + req.body.username + '.');
});

app.get(/\/users\/(d*)\/?(edit)?/, function (req, res) {
	// matches:
	// /users/10
	// /users/10/
	// /users/10/edit

	var message = 'user # ' + req.params[0] + 's profile';

	if (req.params[1] === 'edit') {
		message = 'Editing ' + message;
	} else {
		message = 'Viewing' + message;
	}

	res.send(message);
});

http.createServer(app).listen(app.get('port'), function () {
	console.log('Express server listening on port ' + app.get('port'));
});

//ex:2
var express = require('express'),
	http = require('http');

var app = express();

app.configure(function () {
	app.set('port', process.env.PORT || 3000);
	app.use(express.bodyParser);
});

app.get('/', function (req, res) {
	res.render('home.jade', {
		title: 'building web apps in node with express'
	});
});

http.createServer(app).listen(app.get('port'), function () {
	console.log('Express server listening on port ' + app.get('port'));
})

// home.jade
extends layout

block content
h1 Hello, Express!
	h2 = title

// layout.jade
html
head
body
h1 My First Express App
block content
p
default content


// package.json
{
	"name": "someApp",
	"version": "0.0.1",
	"private": "true", // leave it true if not publishing as a npm package
	"scripts": {
		"start": "node app" // use npm start to run node app
		"build": "/bin/build.js" // same
	},
	"dependancies": {

	},
	"devDependancies": {
		"nodemon": "*"
	}
}

//ex:3
// a config block for development environment
app.configure('dev'function () {});
// a confug block for production environment
app.configure('production', function () {});


// or just one block with the variable
app.confugure(function () {
	app.set('port', process.env.PORT || 3000);
	app.set('views', __dirname + '/views');
	app.set('view engine', 'jade');
	//app.set('view cache', true);	// development only
	//app.enable('view cache');

	// middleware from connect
	app.use(express.bodyParser());
	app.use(express.methodOverride());
	app.use(app.router);
	app.use(express.static(__dirname + '/public'));
});


// jade basics:
h1 Hello
h2 = title

-
var name = 'Andrew'; // js block declaaring a variable

ul # nav
li.current One
li # {
	name
} // variable used here
a(href = "/view1") // attributes
p
pre | I want | to put | a lot of text here

p.
I want
to put
a lot of text here

// native if... else:
-
var followerCount = 2;

p
if followerCount === 0 | You have no followers.
else if followerCount === 1 | You have one follower.
else | You have #(followerCount) followers.

// for each:
-
var users = [];

ul
each user in users
li # {
	user.name
} & lt;
# {
	user.email
} >

// mixins:
mixin userLi(user)
li # {
	user.name
} & lt;
# {
	user.email
} >

// calling the mixin
ul
each user in users
mixin userLi(user)

// include:

//ex:4
req.get();
req.accepted() // what types are accepted
req.accepts(['html', 'text', 'json']) // does it accept html, text, json
req.acceptedLanguages // what languges the request accepts
req.acceptedLanguages('fr') // does the request acceptes french

req.params.name