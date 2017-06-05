<?php

namespace App\Controllers\Admin;

use System\Controller;

/**
 *
 */
class SettingsController extends Controller
{

  public function index()
  {
    //$this->getPermissionPages();
    $this->html->setTitle('Settings');
    $data['settings'] = $this->load->model('Settings')->all();
    $data['success'] = $this->session->has('success') ? $this->session->pull('success') : null;
    $view = $this->view->render('admin/Settings/form', $data);
    return $this->adminLayout->render($view);
  }

  public function submit()
  {
    $json = [];
    if ($this->isValid()) {
      $this->load->model('Settings')->create();
      $json['success'] = 'Setting has been created successfully';
      $json['redirectTo'] = $this->url->link('/admin/settings');
    }else {
      $json['errors'] = $this->validator->flattenMessages();
    }
    return $this->json($json);
  }

  private function form($setting = null)
  {
    $setting = (array) $setting;
    $data['action'] = $this->url->link('/admin/settings/submit');
    $data['name'] = array_get($setting, 'name');
    $data['email'] = array_get($setting, 'email');
    $data['status'] = array_get($setting, 'status');
    $data['resources_users_group_id'] = array_get($setting, 'resources_users_group_id');
    $data['accounts_users_group_id'] = array_get($setting, 'accounts_users_group_id');

    $data['settings'] = $this->load->model('Settings')->all();
    $data['bussinesaccounts'] = $this->load->model('Users')->bs();
    $data['resources'] = $this->load->model('Users')->res();
    return $this->view->render('/admin/settings/form', $data);
  }

  private function isValid($id = null)
  {
    return $this->validator->passes();
  }

}


?>
