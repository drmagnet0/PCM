<?php

namespace App\Controllers\Admin;

use System\Controller;

/**
 *
 */
class AccessController extends Controller
{

  public function index()
  {
    $loginModel = $this->load->model('Login');
    $ignorePages = ['/admin/login', '/admin/login/submit'];
    $currentPage = $this->request->url();
    return;
    if (! $loginModel->isLogged() AND ! in_array($currentPage, $ignorePages)) {
      return $this->url->redirectTo('/admin/login');
    }
    $user = $loginModel->user();
    $usersGroupModel = $this->load->model('UsersGroups');
    $usersGroup = $usersGroupModel->get($user->users_group_id);
    if (! in_array($currentPage, $usersGroup->pages)) {
      return $this->url->redirectTo('/404');
    }
  }

}


?>
