<?php

namespace APP\Models;

use System\Model;

/**
 *
 */
class UsersModel extends Model
{

  protected $table = 'users';

  public function all()
  {
    return $this->select('u.*', 'ug.name AS `group`')->from('users u')
                ->join('LEFT JOIN users_groups ug ON u.users_group_id=ug.id')
                ->fetchAll();
                  //pred($users);
  }

  public function bs()
  {
    return $this->select('u.*', 'ug.name AS `group`')->from('users u')
                ->join('LEFT JOIN users_groups ug ON u.users_group_id=ug.id')->where('users_group_id=?', 4)
                ->fetchAll();
                  //pred($users);
  }

  public function res()
  {
    return $this->select('u.*', 'ug.name AS `group`')->from('users u')
                ->join('LEFT JOIN users_groups ug ON u.users_group_id=ug.id')->where('users_group_id=?', 5)
                ->fetchAll();
                  //pred($users);
  }

  public function create()
  {
    $image = $this->uploadImage();
    if ($image) {
      $this->data('image', $image);
    }
    $this->data('name', $this->request->post('username'))
         ->data('users_group_id', $this->request->post('users_group_id'))
         ->data('email', $this->request->post('email'))
         ->data('password', password_hash($this->request->post('Password'), PASSWORD_DEFAULT))
         ->data('status', $this->request->post('status'))
         ->data('gender', $this->request->post('gender'))
         ->data('ip', $this->request->server('REMOTE_ADDR'))
         ->data('created', $now = time())
         ->data('code', sha1($now . mt_rand()))
         ->insert('users');
  }

  private function uploadImage()
  {
    $image = $this->request->file('Image');
    if (! $image->exists()) {
      return '';
    }
    return $image->moveTo($this->app->file->toPublic('images'));
  }

  public function update($id)
  {
    $image = $this->uploadImage();
    if ($image) {
      $this->data('image', $image);
    }
    $password = $this->request->post('Password');
    if ($password) {
      $this->data('password', password_hash($password, PASSWORD_DEFAULT));
    }
    $this->data('name', $this->request->post('username'))
         ->data('users_group_id', $this->request->post('users_group_id'))
         ->data('email', $this->request->post('email'))
         ->data('status', $this->request->post('status'))
         ->data('gender', $this->request->post('gender'))
         ->where('id=?', $id)
         ->update('users');
  }

}


 ?>
