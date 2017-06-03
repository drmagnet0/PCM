

  <!-- Add New categorie -->
  <div class="modal fade" id="<?php echo $target; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel"><?php echo $heading; ?></h4>
        </div>
        <form class="form-modal form" action="<?php echo $action; ?>" method="post">
          <div class="modal-body">

            <div class="row">
              <div class="col-xs-12">
                <div class="col-xs-12" id="form-results"></div>
              </div>
            </div><!--row-->

            <?php
              if ($image) { ?>
                <div class="row">
                  <div class="form-group col-xs-12">
                    <img src="<?php echo $image; ?>" alt="" class="img-responsive" style="margin: auto;width: 30%;">
                  </div>
                </div><!--row-->
            <?php } ?>

            <div class="row">
              <div class="form-group col-lg-6">
                <label for="user-name">Full Name</label>
                <input type="text" id="user-name" name="username" class="col-lg-6 form-control" placeholder="Full Name" value="<?php echo $name; ?>">
              </div>

              <div class="form-group col-lg-6">
                <label for="users_group_id">User Group</label>
                <select id="users_group_id" name="users_group_id" class="form-control">
                  <?php foreach ($users_groups as $users_group) { ?>
                    <option value="<?php echo $users_group->id; ?>" <?php echo $users_group->id == $users_group_id ? 'selected' : false; ?>><?php echo $users_group->name; ?></option>
                  <?php } ?>
                </select>
              </div>
            </div><!--row-->

            <div class="row">
              <div class="form-group col-lg-6">
                <label for="user-email">Email</label>
                <input type="email" id="user-email" name="email" class="col-lg-6 form-control" placeholder="Email" value="<?php echo $email; ?>">
              </div>

              <div class="form-group col-lg-6">
                <label for="status">Status</label>
                <select class="form-control" id="status" name="status">
                  <option value="enabled">Enabled</option>
                  <option value="disabled" <?php echo $status == 'disabled' ? 'selected' : false; ?>>Disabled</option>
                </select>
              </div>
            </div><!--row-->

            <div class="row">
              <div class="form-group col-lg-6">
                <label for="user-password">Password</label>
                <input type="password" id="user-password" name="Password" class="col-lg-6 form-control" placeholder="Password">
              </div>
              <div class="form-group col-lg-6">
                <label for="user-password-conf">Password Confirm</label>
                <input type="password" id="user-password-conf" name="UserpasswordConfirm" class="col-lg-6 form-control" placeholder="Confirm Password">
              </div>
            </div><!--row-->

            <div class="row">
              <div class="form-group col-lg-6">

                <label for="user-gender">Gender</label>
                <select class="form-control" id="gender" name="gender">
                  <option value="male">Male</option>
                  <option value="female" <?php echo $gender == 'disabled' ? 'selected' : false; ?>>Female</option>
                </select>
              </div>
              <div class="form-group col-lg-6">
                <label for="user-image">Image</label>
                <input type="file" id="user-image" name="Image" class="col-lg-6 form-control" placeholder="User image">
              </div>
            </div><!--row-->

            <!-- <div class="form-group col-lg-6">
              <input type="text" id="user-join" name="userjoin" class="col-lg-6 form-control" placeholder="User join" value="<?php #echo $created; ?>">
            </div> -->

          </div><!--modal-body-->
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button class="btn btn-primary" id="submit-btn">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>
