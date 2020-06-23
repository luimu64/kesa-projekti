<?php
session_start();
set_include_path(dirname(__FILE__) . '/../');

require_once 'router/Request.php';
require_once 'router/Router.php';
require_once 'database/connection.php';
require_once 'libraries/helpers.php';
require_once 'controllers/usercontroller.php';
require_once 'controllers/admincontroller.php';

$router = new Router(new Request);

$router->get('/', function($request) {
  indexController();
});
$router->post('/', function($request) {
  upvoteController();
});
$router->get('/add_post', function($request) {
  postController();
});
$router->post('/add_post', function($request) {
  postController();
});

// $router->get('/reserve', function($request) {
//   if(isLoggedIn()){
//     reservingController();
//   } else {
//     loginController();
//   }
// });
// $router->post('/reserve', function($request) {
//     reservingController();
// });
// $router->get('/add_product', function($request) {
//   if(isLoggedIn()){
//     addproductController();
//   } else {
//     loginController();
//   }
// });
// $router->post('/add_product', function($request) {
//   if(isLoggedIn()){
//     addproductController();
//   } else {
//     loginController();
//   }
// });

// $router->get('/gdpr', function($request) {
//   gdprController();
//});
?>