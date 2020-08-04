<?php
session_start();
set_include_path(dirname(__FILE__) . '/../');
define ('PUBLIC_ROOT', realpath(dirname(__FILE__))."/");

require_once 'router/Request.php';
require_once 'router/Router.php';
require_once 'database/connection.php';
require_once 'libraries/helpers.php';
require_once 'controllers/usercontroller.php';
require_once 'controllers/admincontroller.php';

$router = new Router(new Request);

$router->get('/', function($request) {
   if(isLoggedIn()){
      adminFrontController();
   } else {
      indexController();
   }
});

$router->post('/', function($request) {
  if(isLoggedIn()){
    adminFrontController();
  } else {
    upvoteController();
  }
});

$router->get('/add_post', function($request) {
  postController();
});

$router->post('/add_post', function($request) {
  postController();
});

$router->get('/admin', function($request) {
  adminController();
});

$router->post('/admin', function($request) {
  adminController();
});

$router->get('/logout', function($request) {
  logoutController();
});


?>