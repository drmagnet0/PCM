
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
                                        <th>ID</th>
                                        <th>Cover</th>
                                        <th>Name</th>
                                        <th>Player</th>
                                        <th>Slides</th>
                                        <th>static</th>
                                        <th>Basic</th>
                                        <th>Animation</th>
                                        <th>App</th>
                                        <th>Start</th>
                                        <th>End</th>
                                        <th>B.A</th>
                                        <!-- <th>Created</th> -->
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php
                                    foreach ($projects as $project) { ?>
                                      <tr class="odd gradeX">
                                        <td class="text-center vertical-middle"><?php echo $project->id; ?></td>
                                        <td class="text-center vertical-middle"><img src="<?php echo assets('images/' . $project->image); ?>" style="width:50px;height:50px;border-radius:50%;" alt=""></td>
                                        <td class="text-center vertical-middle"><?php echo $project->name; ?></td>
                                        <td class="text-center vertical-middle"><?php echo $project->category; ?></td>
                                        <td class="text-center vertical-middle"><?php echo $project->slides; ?></td>
                                        <td class="text-center vertical-middle"><?php echo $project->static; ?></td>
                                        <td class="text-center vertical-middle"><?php echo $project->basic; ?></td>
                                        <td class="text-center vertical-middle"><?php echo $project->animation; ?></td>
                                        <td class="text-center vertical-middle"><?php echo $project->app; ?></td>
                                        <td class="text-center vertical-middle"><?php echo date('d/m/Y', $project->startdate); ?></td>
                                        <td class="text-center vertical-middle"><?php echo date('d/m/Y', $project->enddate); ?></td>
                                        <td class="text-center vertical-middle"><?php echo $project->bussinesaccount; ?></td>
                                        <!-- <td class="text-center vertical-middle"><?php echo date('d/m/Y', $project->created); ?></td> -->
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
