

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
              <div class="form-group col-lg-4">
                <label for="project-name">Name</label>
                <input type="text" id="project-name" name="name" class="form-control" placeholder="Name" value="<?php echo $name; ?>">
              </div>
              <div class="form-group col-lg-4">
                <label for="project-country">Country</label>
                <input type="text" id="project-country" name="country" class="form-control" placeholder="Country" value="<?php echo $country; ?>">
              </div>
              <div class="form-group col-lg-4">
                <label for="category_id">Player</label>
                <select id="category_id" name="category_id" class="form-control">
                  <?php foreach ($categories as $category) { ?>
                    <option value="<?php echo $category->id; ?>" <?php echo $category->id == $category_id ? 'selected' : false; ?>><?php echo $category->name; ?></option>
                  <?php } ?>
                </select>
              </div>
            </div><!--row-->

            <div class="row">
              <div class="form-group col-lg-4">
                <label for="project-slides">slides</label>
                <input type="number" id="project-slides" name="slides" class="form-control" placeholder="slides" value="<?php echo $slides; ?>">
              </div>
              <div class="form-group col-lg-2">
                <label for="project-static">Static</label>
                <input type="number" id="project-static" name="static" class="form-control" placeholder="static" value="<?php echo $static; ?>">
              </div>
              <div class="form-group col-lg-2">
                <label for="project-basic">Basic</label>
                <input type="number" id="project-basic" name="basic" class="form-control" placeholder="basic" value="<?php echo $basic; ?>">
              </div>
              <div class="form-group col-lg-2">
                <label for="project-animation">Animation</label>
                <input type="number" id="project-animation" name="animation" class="form-control" placeholder="animation" value="<?php echo $animation; ?>">
              </div>
              <div class="form-group col-lg-2">
                <label for="project-app">App</label>
                <input type="number" id="project-app" name="app" class="form-control" placeholder="app" value="<?php echo $app; ?>">
              </div>
            </div><!--row-->

            <div class="row">
              <div class="form-group col-lg-6">
                <label for="project-startdate">Start Date</label>
                <input type="text" id="project-startdate" name="startdate" class="form-control" placeholder="start date" value="<?php echo $startdate; ?>">
              </div>
              <div class="form-group col-lg-6">
                <label for="project-enddate">End Date</label>
                <input type="text" id="project-enddate" name="enddate" class="form-control" placeholder="end date" value="<?php echo $enddate; ?>">
              </div>
            </div><!--row-->

            <div class="row">
              <div class="form-group col-lg-6">
                <label for="ba_id">Account Manager</label>
                <select id="ba_id" name="bussinesaccount_id" class="form-control">
                  <?php foreach ($bussinesaccounts as $bussinesaccount) { ?>
                    <option value="<?php echo $bussinesaccount->id; ?>" <?php echo $bussinesaccount->id == $bussinesaccount_id ? 'selected' : false; ?>><?php echo $bussinesaccount->name; ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group col-lg-6">
                <label for="project_resources">Resurces</label>
                <select id="project_resources" name="project_resources[]" class="form-control" multiple="multiple">
                  <?php foreach ($resources as $resource) { ?>
                    <option value="<?php echo $resource->id; ?>" <?php echo in_array($resource->id, $project_resources) ? 'selected' : false; ?>><?php echo $resource->name; ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group col-lg-6">
                <label for="wavefor">Wave For</label>
                <select id="wavefor" name="wavefor" class="form-control">
                  <?php foreach ($projects as $project) { if ($project->id == $id) continue; ?>
                    <option value="0">New</option>
                    <option value="<?php echo $project->id; ?>" <?php echo $project->id == $wavefor ? 'selected' : false; ?>><?php echo $project->name; ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group col-lg-6">
                <label for="status">Status</label>
                <select class="form-control" id="status" name="status">
                  <option value="enabled">Enabled</option>
                  <option value="disabled" <?php echo $status == 'disabled' ? 'selected' : false; ?>>Disabled</option>
                </select>
              </div>
              <div class="form-group col-lg-12">
                <label for="project-image">Cover</label>
                <input type="file" id="project-image" name="image" class="form-control">
              </div>
            </div><!--row-->

            <!-- <div class="form-group col-lg-6">
              <input type="text" id="project-join" name="projectjoin" class="form-control" placeholder="Project join" value="<?php #echo $created; ?>">
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
  <script type="text/javascript">
    $('#project-startdate, #project-enddate').datetimepicker({
      viewMode: 'years'
    });
  </script>
