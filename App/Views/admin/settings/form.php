
    <div id="wrapper">

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                      Settings
                    </h1>
                    <div class="col-xs-12" id="results"></div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">


                    <div class="panel panel-default">
                      <form class="" action="<?php echo $action; ?>" method="post">
                        <div class="panel-heading">
                            System Info
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                          <div class="row">
                            <div class="col-xs-12">
                              <div class="col-xs-12" id="form-results"></div>
                            </div>
                          </div><!--row-->
                          <div class="row">
                              <div class="form-group col-lg-6">
                                <label for="system-name">System Name</label>
                                <input type="text" id="system-name" name="name" class="form-control" placeholder="System Name" value="">
                              </div>
                              <div class="form-group col-lg-6">
                                <label for="system-email">System Email</label>
                                <input type="text" id="system-email" name="email" class="form-control" placeholder="System Email" value="">
                              </div>
                              <div class="form-group col-lg-12">
                                <label for="system-status">System Status</label>
                                <select id="system-status" name="status" class="form-control">
                                  <option value="1">Enabled</option>
                                  <option value="2">Disabled</option>
                                </select>
                              </div>
                              <div class="form-group col-lg-6">
                                <label for="resource-group">Resources Users Group</label>
                                <select id="resource-group" name="resources" class="form-control">
                                  <option value="1">Enabled</option>
                                  <option value="2">Disabled</option>
                                </select>
                              </div>
                              <div class="form-group col-lg-6">
                                <label for="account-group">Account Managers Users Group</label>
                                <select id="account-group" name="accounts" class="form-control">
                                  <option value="1">Enabled</option>
                                  <option value="2">Disabled</option>
                                </select>
                              </div>
                          </div><!-- row -->
                        </div>
                        <!-- /.panel-body -->
                        <div class="panel-footer">
                          <div class="row">
                            <div class="col-xs-12 text-center">
                              <button class="btn btn-primary" id="submit-btn">Save changes</button>
                            </div>
                          </div>
                        </div>
                      </form>
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
