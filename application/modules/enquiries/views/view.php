
<h1>Enquiries ID: <?= $id ?></h1>

 <div class="row">
        <div class="col-xs-12">
        <?php
          $url_reply = base_url() . 'enquiries/create/'.$id;
        ?>
        
          <div class="box">
            <div class="box-header">
              <h3 class="box-title" style="color: #f00">Enqury Details</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <a href="<?= $url_reply ?>" class="btn btn-primary btn-sm">Reply This Message</a>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover table-strpied">
              <?php
                $this->load->module('store_accounts');
                $this->load->module('timedate');

                $customer_name = $this->store_accounts->_get_customer_name($sent_by);
                $date = $this->timedate->get_nice_date($date_created, 'cool');
              ?>
              <tr>
                <td style="font-weight: bold; font-size: 16px">Date Sent </td> 
                <td>: <?= $date ?></td>
              </tr>
              <tr>
                <td style="font-weight: bold; font-size: 16px">Sent By</td> 
                <td>: <?= $customer_name ?></td>
              </tr>
              <tr>
                <td style="font-weight: bold; font-size: 16px">Subject</td> 
                <td>: <?= $subject ?></td>
              </tr>
              <tr>
                <td style="font-weight: bold; font-size: 16px">Message</td> 
                <td> <p style="    font-size: 16px;
    background: #ddd;
    width: 411px;
    height: 222px;
    padding: 9px 7px;
    border: 1px solid #ccc;
    overflow: hidden;"><?= nl2br($message) ?></p></td>
              </tr>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>