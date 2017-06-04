<?php

namespace App\Controllers\Admin;

use System\Controller;

/**
 *
 */
class ProjectsController extends Controller
{

  public function index()
  {
    //$this->getPermissionPages();
    $this->html->setTitle('Projects');
    $data['projects'] = $this->load->model('Projects')->all();
    $data['success'] = $this->session->has('success') ? $this->session->pull('success') : null;
    $view = $this->view->render('admin/Projects/list', $data);
    return $this->adminLayout->render($view);
  }

  public function add()
  {
    // return $this->view->render('admin/projects/form', $data);
    return $this->form();
  }

  public function submit()
  {
    // $json['success'] = 'Done';
    $json = [];
    if ($this->isValid()) {
      $this->load->model('Projects')->create();
      $json['success'] = 'Project has been created successfully';
      $json['redirectTo'] = $this->url->link('/admin/projects');
    }else {
      $json['errors'] = $this->validator->flattenMessages();
    }
    return $this->json($json);
  }

  public function edit($id)
  {
    $projectsModel = $this->load->model('Projects');
    if (! $projectsModel->exists($id)) {
      return $this->url->redirectTo('/404');
    }
    $project = $projectsModel->get($id);
      return $this->form($project);
  }

  private function form($project = null)
  {
    if ($project) {
      $data['target'] = 'editProject-' . $project->id;
      $data['action'] = $this->url->link('/admin/projects/save/' . $project->id);
      $data['heading'] = 'Edit project ( ' . $project->name . ' )';
    }else {
      $data['target'] = 'addProject';
      $data['action'] = $this->url->link('/admin/projects/submit');
      $data['heading'] = 'Add New Project';
    }
    $project = (array) $project;
    $data['id'] = array_get($project, 'id');
    $data['name'] = array_get($project, 'name');
    $data['country'] = array_get($project, 'country');
    $data['category_id'] = array_get($project, 'category_id');
    $data['bussinesaccount_id'] = array_get($project, 'bussinesaccount_id');
    //$data['project_resources'] = array_get($project, 'project_resources');
    $data['project_resources'] = [];
    if ($project['project_resources']) {
      $data['project_resources'] = explode(',', $project['project_resources']);
    }
    //$data['resources_id'] = array_get($project, 'resources_id');
    $data['status'] = array_get($project, 'status', 'Enabled');
    $data['slides'] = array_get($project, 'slides');
    $data['static'] = array_get($project, 'static');
    $data['basic'] = array_get($project, 'basic');
    $data['animation'] = array_get($project, 'animation');
    $data['app'] = array_get($project, 'app');
    $data['startdate'] = array_get($project, 'startdate');
    $data['enddate'] = array_get($project, 'enddate');
    $data['wavefor'] = array_get($project, 'wavefor');
    $data['image'] = '';
    if (! empty($project['image'])) {
      $data['image'] = $this->url->link('public/images/' . $project['image']);
    }
    $data['projects'] = $this->load->model('Projects')->all();
    $data['categories'] = $this->load->model('Categories')->all();
    $data['bussinesaccounts'] = $this->load->model('Users')->bs();
    $data['resources'] = $this->load->model('Users')->res();
    return $this->view->render('/admin/projects/form', $data);
  }

  public function save($id)
  {
    $json = [];
    if ($this->isValid($id)) {
      $this->load->model('Projects')->update($id);
      $json['success'] = 'Project has been Updated successfully';
      $json['redirectTo'] = $this->url->link('/admin/projects');
    }else {
      $json['errors'] = $this->validator->flattenMessages();
    }
    return $this->json($json);
  }

  public function delete($id)
  {
    $projectsModel = $this->load->model('Projects');
    if (! $projectsModel->exists($id) OR $id == 1) {
      return $this->url->redirectTo('/404');
    }
    $projectsModel->delete($id);
    $json['success'] = 'Project has been deleted successfully';
    return $this->json($json);
  }

  private function isValid($id = null)
  {
    $this->validator->required('name', 'project name is required');
    $this->validator->required('slides', 'slides num is required');
    $this->validator->required('static', 'static num is required');
    $this->validator->required('basic', 'basic num is required');
    $this->validator->required('animation', 'animation num is required');
    $this->validator->required('app', 'app num is required');
    $this->validator->required('startdate', 'start date is required');
    $this->validator->required('enddate', 'end date is required');
    if (is_null($id)) {
      $this->validator->requiredFile('image')->image('image');
    }else {
      $this->validator->image('image');
    }
    return $this->validator->passes();
  }

}


?>
