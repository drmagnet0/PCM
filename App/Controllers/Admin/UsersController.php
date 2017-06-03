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
    // return $this->view->render('admin/users/form', $data);
    return $this->form();
  }

  public function submit()
  {
    // $json['success'] = 'Done';
    $json = [];
    if ($this->isValid()) {
      $this->load->model('Users')->create();
      $json['success'] = 'User has been created successfully';
      $json['redirectTo'] = $this->url->link('/admin/users');
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
      //$view =  $this->view->render('admin/users/update-form', $data);
      return $this->form($user);
      // return $this->view->render('admin/users/form', $data);
      //return $this->adminLayout->render($view);
  }

  private function form($user = null)
  {
    if ($user) {
      $data['target'] = 'editUser-' . $user->id;
      $data['action'] = $this->url->link('/admin/users/save/' . $user->id);
      $data['heading'] = 'Edit user ( ' . $user->name . ' )';
    }else {
      $data['target'] = 'addUser';
      $data['action'] = $this->url->link('/admin/users/submit');
      $data['heading'] = 'Add New User';
    }
    // $data['name'] = $user ? $user->name : null;
    // $data['users_group_id'] = $user ? $user->users_group_id : null;
    // $data['users_groups'] = $user ? $user->users_groups : null;
    // $data['email'] = $user ? $user->email : null;
    // $data['gender'] = $user ? $user->gender : null;
    // $data['status'] = $user ? $user->status : null;
    // $data['status'] = $user ? $user->status : 'enabled';
    $user = (array) $user;
    $data['name'] = array_get($user, 'name');
    $data['users_group_id'] = array_get($user, 'users_group_id');
    $data['users_groups'] = $this->load->model('UsersGroups')->all();
    $data['email'] = array_get($user, 'email');
    $data['gender'] = array_get($user, 'gender', 'Male');
    $data['status'] = array_get($user, 'status', 'Enabled');
    //$data['image'] = array_get($user, 'image');
    $data['image'] = '';
    if (! empty($user['image'])) {
      $data['image'] = $this->url->link('public/images/' . $user['image']);
    }
    return $this->view->render('/admin/users/form', $data);
  }

  public function save($id)
  {
    $json = [];
    if ($this->isValid($id)) {
      $this->load->model('Users')->update($id);
      $json['success'] = 'User has been Updated successfully';
      $json['redirectTo'] = $this->url->link('/admin/users');
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
    // return $this->url->redirectTo('/admin/users');
    $json['success'] = 'User has been deleted successfully';
    return $this->json($json);
  }

  private function isValid($id = null)
  {
    $this->validator->required('username', 'full name is required');
    $this->validator->required('email')->email('email');
    if (is_null($id)) {
      $this->validator->required('Password')->minLen('Password', 8)->match('Password', 'UserpasswordConfirm', 'Confirm Password should be match Password');
      $this->validator->requiredFile('Image')->image('Image');
    }else {
      $this->validator->image('Image');
    }
    return $this->validator->passes();
  }

}


?>
