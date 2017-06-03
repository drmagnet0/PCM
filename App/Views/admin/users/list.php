
    <div id="wrapper">

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                      Users
                      <a class="btn btn-primary pull-right open-popup" data-toggle="modal" data-modal-target="#addUser" data-target="<?php echo url('/admin/users/add') ?>">Add New User</a>
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
                            All Users
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>User Name</th>
                                        <th>User Group</th>
                                        <th>Email</th>
                                        <th>Gender</th>
                                        <!-- <th>image</th> -->
                                        <th>Join</th>
                                        <th>Status</th>
                                        <!-- <th>IP</th> -->
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php
                                    foreach ($users as $user) { ?>
                                      <tr class="odd gradeX">
                                          <td class="text-center vertical-middle"><?php echo $user->id; ?></td>
                                          <td class="text-left vertical-middle">
                                            <img src="<?php echo assets('images/' . $user->image); ?>" style="width:50px;height:50px;border-radius:50%;" alt="">
                                            <?php echo $user->name; ?>
                                          </td>
                                          <td class="text-center vertical-middle"><?php echo $user->group; ?></td>
                                          <td class="text-center vertical-middle"><?php echo $user->email; ?></td>
                                          <td class="text-center vertical-middle"><?php echo $user->gender; ?></td>
                                          <!-- <td class="text-center"><?php #echo $user->image; ?></td> -->
                                          <td class="text-center vertical-middle"><?php echo date('d/m/Y', $user->created); ?></td>
                                          <td class="text-center vertical-middle"><?php echo ucfirst($user->status); ?></td>
                                          <!-- <td class="text-center"><?php# echo $user->ip; ?></td> -->
                                          <td class="text-center vertical-middle">
                                            <button type="button" data-target="<?php echo url('admin/users/edit/' . $user->id) ?>" data-modal-target="#editUser-<?php echo $user->id; ?>" class="btn btn-primary open-popup">

                                              <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                            </button>
                                            <button type="button" data-target="<?php echo url('admin/users/delete/' . $user->id) ?>" class="btn btn-danger delete">

                                              <i class="fa fa-trash" aria-hidden="true"></i>
                                            </button>
                                          </td>
                                      </tr>
                                    <?php }
                                  ?>
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
