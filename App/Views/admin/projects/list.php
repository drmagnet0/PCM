
    <div id="wrapper">

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                      Projects
                      <a class="btn btn-primary pull-right open-popup" data-toggle="modal" data-modal-target="#addProject" data-target="<?php echo url('/admin/projects/add') ?>">Add New Project</a>
                    </h1>
                    <div class="col-xs-12" id="results"></div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            All Projects
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <!-- <th>ID</th> -->
                                        <th class="text-center vertical-middle">Cover</th>
                                        <th class="text-center vertical-middle">Name</th>
                                        <th class="text-center vertical-middle">Country</th>
                                        <th class="text-center vertical-middle">Player</th>
                                        <th class="text-center vertical-middle">Slides</th>
                                        <th class="text-center vertical-middle">Start Date</th>
                                        <th class="text-center vertical-middle">End Date</th>
                                        <th class="text-center vertical-middle">A. Manager</th>
                                        <!-- <th>Created</th> -->
                                        <th class="text-center vertical-middle">Status</th>
                                        <th class="text-center vertical-middle">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php
                                    foreach ($projects as $project) { ?>
                                      <tr class="odd gradeX">
                                        <!-- <td class="text-center vertical-middle"><?php# echo $project->id; ?></td> -->
                                        <td class="text-center vertical-middle"><img src="<?php echo assets('images/' . $project->image); ?>" style="width:50px;height:50px;border-radius:50%;" alt=""></td>
                                        <td class="text-center vertical-middle"><?php echo $project->name; ?></td>
                                        <th class="text-center vertical-middle"><?php echo $project->country; ?></th>
                                        <td class="text-center vertical-middle"><?php echo $project->category; ?></td>
                                        <td class="text-center vertical-middle">
                                          <?php echo $project->slides; ?>
                                          <table width="100%" style="margin-top: 5px;" class="table table-striped table-bordered table-hover">
                                            <thead>
                                              <tr>
                                                <th class="text-center vertical-middle">Static</th>
                                                <th class="text-center vertical-middle">Basic</th>
                                                <th class="text-center vertical-middle">Animation</th>
                                                <th class="text-center vertical-middle">App</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                              <tr>
                                                <td class="text-center vertical-middle"><?php echo $project->static; ?></td>
                                                <td class="text-center vertical-middle"><?php echo $project->basic; ?></td>
                                                <td class="text-center vertical-middle"><?php echo $project->animation; ?></td>
                                                <td class="text-center vertical-middle"><?php echo $project->app; ?></td>
                                              </tr>
                                            </tbody>
                                          </table>
                                        </td>
                                        <td class="text-center vertical-middle"><?php echo date('d/m/Y', $project->startdate); ?></td>
                                        <td class="text-center vertical-middle"><?php echo date('d/m/Y', $project->enddate); ?></td>
                                        <td class="text-center vertical-middle"><?php echo $project->bussinesaccount; ?></td>
                                        <!-- <td class="text-center vertical-middle"><?php #echo date('d/m/Y', $project->created); ?></td> -->
                                        <td class="text-center vertical-middle"><?php echo ucfirst($project->status); ?></td>
                                        <td class="text-center vertical-middle">
                                          <button type="button" data-target="<?php echo url('admin/projects/edit/' . $project->id) ?>" data-modal-target="#editProject-<?php echo $project->id; ?>" class="btn btn-primary open-popup">
                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                          </button>
                                          <button type="button" data-target="<?php echo url('admin/projects/delete/' . $project->id) ?>" class="btn btn-danger delete">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                          </button>
                                        </td>
                                      </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
