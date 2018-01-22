
<h2><i class="fa fa-user fa-fw"></i><?= $head_line ?></h2>

 <div class="row">
        <div class="col-sm-8">
        
          <div class="box">
            <div class="box-header">
              <h3 class="box-title" style="color: #f00">User Information</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              
              <?php
                $this->load->module('store_accounts');
                $this->load->module('timedate');
                $date = $this->timedate->get_nice_date($date_created, 'cool');

                if($picture == '') {
                	$picture = 'avatar.jpg';
                }
              ?>

             <table class="table table-hover table-strpied">
              <tbody><tr>
                <th style="width:50%">Username:</th>
                <td><?= $username ?></td>
              </tr>
              <tr>
                <th>First Name: </th>
                <td><?= $firstname ?></td>
              </tr>
              <tr>
                <th>Last Name:</th>
                <td><?= $lastname ?></td>
              </tr>
              <tr>
                <th>Telephone:</th>
                <td><?= $tel ?></td>
              </tr>
              <tr>
                <th>First Address:</th>
                <td><?= $address1 ?></td>
              </tr>
              <tr>
                <th>Second Address:</th>
                <td><?= $address2 ?></td>
              </tr>
              <tr>
                <th>Country:</th>
                <td><?= $country ?></td>
              </tr>
              <tr>
                <th>Town:</th>
                <td><?= $town ?></td>
              </tr>
              <tr>
                <th>Date Created:</th>
                <td><?= $date ?></td>
              </tr>

            </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <div class="col-sm-4">
        	<div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="<?= base_url() ?>users_pics/<?= $picture ?>" alt="User profile picture">

              <h3 class="profile-username text-center"><?= $firstname ?>&nbsp;<?= $lastname ?></h3>

              <p class="text-muted text-center"><?= $function ?></p>

            

              <a href="<?= base_url() ?>store_users/create/<?= $update_id ?>" class="btn btn-primary btn-block"><b>Edit Profile</b></a>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
      </div>