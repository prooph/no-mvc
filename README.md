# NoMVC for PHP
No View, No Controller, Just a Model and a Bus

## Experimental Package

The name of the package describes its goal in two simple words. It's obvious that we derived it from NoSql. And like NoSql
we don't really want to say NO MVC but instead NOT ONLY MVC.

## What is the problem with MVC?

There is no problem with MVC. It works great for server-side applications which need to validate forms, process user input and
generate dynamic html pages. But what if our backend only consists of a model and a web API be it REST or RPC?
Of course we already have lightweight alternatives for full stack web frameworks, but in this repository we want to try another approach.

## HTTP-Server + Message Bus + Model

Zend has released a new PSR-7 HTTP Message implementation called [zend-diactoros](https://github.com/zendframework/zend-diactoros).
The lib also ships with a Node.js like HTTP Server. That will be our front controller. The idea is now to translate
incoming HTTP messages into command, event or query messages and dispatch them via [prooph/service-bus](https://github.com/prooph/service-bus).
It is a proof of concept to find out how well both tools work together and if it is possible to put them in a [reactphp event loop](https://github.com/reactphp/event-loop).
The second concept we want to try out is to define a web API with this new [HTTPApiDoc definition](https://github.com/Philiagus/httpapidoc).
The result should be a swagger like documentation of the API and additionally a request object generator on client-side and a message object
generator on server-side. We hope that thus two tools will simplify the communication set up on both ends so that you can focus on user experience
client-side and consistent business logic server-side.

If you want to join the experiment, just drop us an email or watch the project! We appreciate any help and input.