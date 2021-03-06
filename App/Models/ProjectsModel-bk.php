<?php

namespace APP\Models;

use System\Model;

/**
 *
 */
class ProjectsModel extends Model
{

  protected $table = 'Projects';

  public function all()
  {
    return $this->select('p.*', 'c.name AS `players`', 'u.name')
                ->from('Projects p')
                ->join('LEFT JOIN players c ON p.id=c.id')
                ->join('LEFT JOIN users u ON p.bussinesaccount_id=u.id')
                ->fetchAll();
  }

  public function create()
  {
    $image = $this->uploadImage();
    if ($image) {
      $this->data('image', $image);
    }
    $this->data('name', $this->request->post('name'))
         ->data('category_id', $this->request->post('category_id'))
         ->data('bussinesaccount_id', $this->request->post('bussinesaccount_id'))
         ->data('status', $this->request->post('status'))
         ->data('slides', $this->request->post('slides'))
         ->data('static', $this->request->post('static'))
         ->data('basic', $this->request->post('basic'))
         ->data('animation', $this->request->post('animation'))
         ->data('app', $this->request->post('app'))
         ->data('startdate', $this->request->post('startdate'))
         ->data('enddate', $this->request->post('enddate'))
         ->data('created', $now = time())
         ->insert('Projects');
  }

  private function uploadImage()
  {
    $image = $this->request->file('projectimage');
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
    $this->data('name', $this->request->post('name'))
         ->data('category_id', $this->request->post('category_id'))
         ->data('bussinesaccount_id', $this->request->post('bussinesaccount_id'))
         ->data('status', $this->request->post('status'))
         ->data('slides', $this->request->post('slides'))
         ->data('static', $this->request->post('static'))
         ->data('basic', $this->request->post('basic'))
         ->data('animation', $this->request->post('animation'))
         ->data('app', $this->request->post('app'))
         ->data('startdate', $this->request->post('startdate'))
         ->data('enddate', $this->request->post('enddate'))
         ->where('id=?', $id)
         ->update('Projects');
  }

}


 ?>
