<?php

$router->map('GET', '/', function() {_control('HomeController.View');}, 'homeView');
$router->map('POST', '/', function() {_control('HomeController.Register');}, 'homeRegister');
$router->map('PUT', '/', function() {_control('HomeController.Login');}, 'homeLogin');
$router->map('GET', '/', function() {_control('HomeController.Login');}, 'taskView');