<?php

namespace App\Controllers\Admin;

use System\Controller;

/**
 *
 */
class UsersController extends Controller
{

  public function index()
  {
    //$this->getPermissionPages();
    $this->html->setTitle('Users');
    $data['users'] = $this->load->model('Users')->all();
    $data['success'] = $this->session->has('success') ? $this->session->pull('success') : null;
    $view = $this->view->render('admin/Users/list', $data);
    return $this->adminLayout->render($view);
  }

  public function add()
  {
    // return $this->view->render('admin/categories/form', $data);
    return $this->form();
  }

  public function submit()
  {
    // $json['success'] = 'Done';
    $json = [];
    if ($this->isValid()) {
      $this->load->model('Users')->create();
      $json['success'] = 'User has been created successfully';
      $json['redirectTo'] = $this->url->link('/admin/Users');
    }else {
      // $json['errors'] = $this->validator->getMessages();
      // $json['errors'] = implode('<br>', $this->validator->getMessages());
      $json['errors'] = $this->validator->flattenMessages();
    }
    return $this->json($json);
  }

  public function edit($id)
  {
    $usersModel = $this->load->model('Users');
    if (! $usersModel->exists($id)) {
      return $this->url->redirectTo('/404');
    }
    $user = $usersModel->get($id);
    //$data['errors'] = $this->session->has('errors') ? $this->session->pull('errors') : null;
    //pred($data['errors']);
    //$this->html->setTitle('Edit (' . $data['category']->name . ') Player');
      //echo $id;
      //pre($id);
      //$view =  $this->view->render('admin/categories/update-form', $data);
      return $this->form($user);
      // return $this->view->render('admin/categories/form', $data);
      //return $this->adminLayout->render($view);
  }

  private function form($user = null)
  {
    if ($user) {
      $data['target'] = 'editUser-' . $user->id;
      $data['action'] = $this->url->link('/admin/Users/save/' . $user->id);
      $data['heading'] = 'Edit ' . $user->name . 'player';
    }else {
      $data['target'] = 'addUser';
      $data['action'] = $this->url->link('/admin/Users/submit');
      $data['heading'] = 'Add New User';
    }
    $user = (array) $user;
    $data['name'] = array_get($user, 'name');
    $data['users_group_id'] = array_get($user, 'users_group_id');
    $data['users_groups'] = $this->load->model('UsersGroups')->all();
    $data['email'] = array_get($user, 'email');
    $data['gender'] = array_get($user, 'gender', 'Male');
    $data['status'] = array_get($user, 'status', 'Enabled');
    $data['image'] = array_get($user, 'image');
    //$data['status'] = $user ? $user->status : 'enabled';
    return $this->view->render('/admin/Users/form', $data);
  }

  public function save($id)
  {
    $json = [];
    if ($this->isValid($id)) {
      $this->load->model('Users')->update($id);
      $json['success'] = 'User has been Updated successfully';
      $json['redirectTo'] = $this->url->link('/admin/Users');
    }else {
      // $json['errors'] = $this->validator->getMessages();
      // $json['errors'] = implode('<br>', $this->validator->getMessages());
      $json['errors'] = $this->validator->flattenMessages();
    }
    return $this->json($json);
  }

  public function delete($id)
  {
    $usersModel = $this->load->model('Users');
    if (! $usersModel->exists($id) OR $id == 1) {
      return $this->url->redirectTo('/404');
    }
    $usersModel->delete($id);
    // $this->session->set('success', 'player has been Done');
    // return $this->url->redirectTo('/admin/categories');
    $json['success'] = 'User has been deleted successfully';
    return $this->json($json);
  }

  private function isValid($id = null)
  {
    $this->validator->required('username', 'full name is required');
    $this->validator->required('useremail')->email('useremail');
    if (is_null($id)) {
      $this->validator->required('userpassword')->minLen('userpassword', 8)->match('userpassword', 'UserpasswordConfirm');
      $this->validator->requiredFile('Image')->image('Image');
    }
    return $this->validator->passes();
  }

}


?>
