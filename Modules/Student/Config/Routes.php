<?php 
$routes->group("student", ["namespace" => "\Modules\Student\Controllers"], function($routes){
	// // welcome page
	// $routes->get("/", "StudentController::index"); // student

	// // call1
	// $routes->get("call1", "StudentController::call1"); // student/call1
	// // call2
	// $routes->get("call2", "StudentController::call2"); // student/call2
	// // call3
	// $routes->get("call3", "StudentController::call3"); // student/call3

	// list student data
	$routes->get("/", "StudentController::listStudent");

	// add student data
	$routes->match(["get", "post"], "add-student", "StudentController::addStudent"); 

	// edit student data
	$routes->match(["get", "put"], "edit-student/(:num)", "StudentController::editStudent/$1"); 

	// delete student data
	$routes->delete("delete-student/(:num)", "StudentController::deleteStudent/$1"); 
});

$routes->group("api", ["namespace" => "\Modules\Student\Controllers"], function($routes){
	$routes->resource("student", ["controller" => "ApiController"]);
});
 ?>