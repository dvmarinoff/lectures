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
// node.js as client
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