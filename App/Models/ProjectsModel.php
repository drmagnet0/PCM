<?php

namespace APP\Models;

use System\Model;

/**
 *
 */
class ProjectsModel extends Model
{

  protected $table = 'Projects';

  // public function all()
  // {
  //   // return $this->select('p.*', 'c.name AS `players`', 'u.id')
  //   //             ->from('Projects p')
  //   //             ->join('LEFT JOIN players c ON p.id=c.id')
  //   //             ->join('LEFT JOIN users u ON p.id=u.id')
  //   //             ->fetchAll();
  //   return $this->from('Projects p')
  //               ->join('LEFT JOIN players c ON p.id=c.id')
  //               ->join('LEFT JOIN users u ON p.id=u.id')
  //               ->fetchAll();
  // }

  // public function all() {
  //   $test = $this->select('u.*', 'ug.name AS category_id')
  //                ->from('projects u')
  //                ->join('LEFT JOIN players ug ON u.name=ug.id')
  //                ->fetchAll();
  //                pred($test);
  // }

  public function all()
  {
    return $this->select('p.*', 'c.name AS `category`', 'u.name AS `bussinesaccount`')
                ->from('projects p')
                ->join('LEFT JOIN players c ON p.category_id=c.id')
                // ->join('LEFT JOIN users u ON p.bussinesaccount_id=u.id')->where('users_group_id=?', 4)
                ->join('LEFT JOIN users u ON p.bussinesaccount_id=u.id')
                ->fetchAll();
  }

  // public function all()
  // {
  //   return $this->select('p.*', 'c.name AS `category`')
  //               ->from('projects p')
  //               ->join('LEFT JOIN players c ON p.category_id=c.id')
  //               ->fetchAll();
  // }

  public function create()
  {
    $image = $this->uploadImage();
    if ($image) {
      $this->data('image', $image);
    }
    $this->data('name', $this->request->post('name'))
         ->data('country', $this->request->post('country'))
         ->data('category_id', $this->request->post('category_id'))
         ->data('bussinesaccount_id', $this->request->post('bussinesaccount_id'))
         ->data('project_resources', implode(',', array_filter((array) $this->request->post('project_resources'), 'is_numeric')))
         //->data('resources_id', $this->request->post('resources_id'))
         ->data('status', $this->request->post('status'))
         ->data('slides', $this->request->post('slides'))
         ->data('static', $this->request->post('static'))
         ->data('basic', $this->request->post('basic'))
         ->data('animation', $this->request->post('animation'))
         ->data('app', $this->request->post('app'))
         ->data('startdate', $this->request->post('startdate'))
         ->data('enddate', $this->request->post('enddate'))
         ->data('created', $now = time())
         ->data('wavefor', $this->request->post('wavefor'))
         ->insert('Projects');
  }

  private function uploadImage()
  {
    $image = $this->request->file('image');
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
         ->data('country', $this->request->post('country'))
         ->data('category_id', $this->request->post('category_id'))
         ->data('bussinesaccount_id', $this->request->post('bussinesaccount_id'))
         ->data('project_resources', implode(',', array_filter((array) $this->request->post('project_resources'), 'is_numeric')))
         //->data('resources_id', $this->request->post('resources_id'))
         ->data('status', $this->request->post('status'))
         ->data('slides', $this->request->post('slides'))
         ->data('static', $this->request->post('static'))
         ->data('basic', $this->request->post('basic'))
         ->data('animation', $this->request->post('animation'))
         ->data('app', $this->request->post('app'))
         ->data('startdate', $this->request->post('startdate'))
         ->data('enddate', $this->request->post('enddate'))
         ->data('wavefor', $this->request->post('wavefor'))
         ->where('id=?', $id)
         ->update('Projects');
  }

}


 ?>
