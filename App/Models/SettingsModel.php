<?php

namespace APP\Models;

use System\Model;

/**
 *
 */
class SettingsModel extends Model
{

  protected $table = 'Settings';

  // public function all()
  // {
  //   return $this->select('p.*', 'c.name AS `category`', 'u.name AS `bussinesaccount`')
  //               ->from('settings p')
  //               ->join('LEFT JOIN players c ON p.category_id=c.id')
  //               // ->join('LEFT JOIN users u ON p.bussinesaccount_id=u.id')->where('users_group_id=?', 4)
  //               ->join('LEFT JOIN users u ON p.bussinesaccount_id=u.id')
  //               ->fetchAll();
  // }

  public function create()
  {
    $this->data('name', $this->request->post('name'))
         ->data('email', $this->request->post('email'))
         ->data('status', $this->request->post('status'))
         ->data('resources_users_group_id', $this->request->post('resources_users_group_id'))
         ->data('accounts_users_group_id', $this->request->post('accounts_users_group_id'))
         ->insert('Settings');
  }

  public function update()
  {
    $this->data('name', $this->request->post('name'))
         ->data('email', $this->request->post('email'))
         ->data('status', $this->request->post('status'))
         ->data('resources_users_group_id', $this->request->post('resources_users_group_id'))
         ->data('accounts_users_group_id', $this->request->post('accounts_users_group_id'))
         ->update('Settings');
  }

}


 ?>
