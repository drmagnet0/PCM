<?php

use System\Application;

$app = Application::getInstance();
//
// //pre($app);
//
// $app->route->add('/', 'Home', 'POST');


if(strpos($app->request->url(), '/admin') === 0 ){
  // $app->load->controller('Admin/Access');
  $app->load->action('Admin/Access', 'index');
}


$app->route->add('/', 'Home');
//
// $app->route->add('/Projects/:text/:id', 'Projects/Project');



$app->route->add('/admin/login', 'Admin/Login');
$app->route->add('/admin/login/submit', 'Admin/Login@submit', 'POST');


$app->share('adminLayout', function($app){
  return $app->load->Controller('Admin/Common/Layout');
});


$app->route->add('/admin', 'Admin/Dashboard');
$app->route->add('/admin/dashboard', 'Admin/Dashboard');
$app->route->add('/admin/submit', 'Admin/Dashboard@submit', 'POST');


$app->route->add('/admin/users', 'Admin/Users');
$app->route->add('/admin/users/add', 'Admin/Users@add', 'POST');
$app->route->add('/admin/users/submit', 'Admin/Users@submit', 'POST');
$app->route->add('/admin/users/edit/:id', 'Admin/Users@edit', 'POST');
$app->route->add('/admin/users/save/:id', 'Admin/Users@save', 'POST');
$app->route->add('/admin/users/delete/:id', 'Admin/Users@delete', 'POST');


$app->route->add('/admin/users-groups', 'Admin/UsersGroups');
$app->route->add('/admin/users-groups/add', 'Admin/UsersGroups@add', 'POST');
$app->route->add('/admin/users-groups/submit', 'Admin/UsersGroups@submit', 'POST');
$app->route->add('/admin/users-groups/edit/:id', 'Admin/UsersGroups@edit', 'POST');
$app->route->add('/admin/users-groups/save/:id', 'Admin/UsersGroups@save', 'POST');
$app->route->add('/admin/users-groups/delete/:id', 'Admin/UsersGroups@delete', 'POST');


$app->route->add('/admin/projects', 'Admin/Projects');
$app->route->add('/admin/projects/add', 'Admin/Projects@add', 'POST');
$app->route->add('/admin/projects/submit', 'Admin/Projects@submit', 'POST');
$app->route->add('/admin/projects/edit/:id', 'Admin/Projects@edit', 'POST');
$app->route->add('/admin/projects/save/:id', 'Admin/Projects@save', 'POST');
$app->route->add('/admin/projects/delete/:id', 'Admin/Projects@delete', 'POST');


$app->route->add('/admin/categories', 'Admin/Categories');
$app->route->add('/admin/categories/add', 'Admin/Categories@add', 'POST');
$app->route->add('/admin/categories/submit', 'Admin/Categories@submit', 'POST');
$app->route->add('/admin/categories/edit/:id', 'Admin/Categories@edit', 'POST');
$app->route->add('/admin/categories/save/:id', 'Admin/Categories@save', 'POST');
$app->route->add('/admin/categories/delete/:id', 'Admin/Categories@delete', 'POST');


$app->route->add('/admin/settings', 'Admin/Settings');
$app->route->add('/admin/settings/add', 'Admin/Settings@add', 'POST');
$app->route->add('/admin/settings/submit', 'Admin/Settings@submit', 'POST');
$app->route->add('/admin/settings/edit/:id', 'Admin/Settings@edit', 'POST');
$app->route->add('/admin/settings/save/:id', 'Admin/Settings@save', 'POST');
$app->route->add('/admin/settings/delete/:id', 'Admin/Settings@delete', 'POST');


$app->route->add('/admin/logout', 'Admin/Logout');
// $app->route->add('/logout', 'Admin/Logout');


$app->route->add('/404', 'NotFound');
$app->route->notFound('/404');

?>
