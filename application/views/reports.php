<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
 <script src="<?php echo base_url(); ?>assets\custom\js\jquery.min.js">
</script>
<script src="<?php echo base_url(); ?>assets\custom\bootbox\bootbox.js">
</script>
<script src="<?php echo base_url(); ?>assets\custom\bootstrap\bootstrap.js">
</script>
<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/js/bootstrap.min.js"></script> -->

<script type="text/javascript">
      function edit()
      {
      $.ajax({
            url: '<?php echo site_url(); ?>/Customer/getEmployees',
           
            type: 'post',
            dataType: 'html',   
            success: function(html) {
             $('#edit-customer-content').html(html);
            }
          });
      }
      //  $(function() {
      //   $( "#date_from" ).datepicker();
      //   $( "#date_to" ).datepicker();
      // });
</script>

<div class="home">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <h3 class="section-title">
                    Reports
                </h3>
               
               <div class="col">
            <form class="form-inline" role="search" method="POST" action="">
              <div class='col-sm-3'>
                <div class="form-group">
                  <div class='input-group date datetimepicker'>
                    <span class="input-group-addon">Between:
                    </span>
                    <input type='date' class="form-control" id="date_from" name="date_from" placeholder="Start Date" />
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    </span>
                  </div>
                </div>
              </div>
             
              <div class='col-sm-3'>
                <div class="form-group">
                  <div class='input-group date datetimepicker'>
                    <span class="input-group-addon">And:
                    </span>
                    <input type='date' class="form-control" id="date_to" name="date_to" placeholder="End Date"/>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    </span>
                  </div>
                </div>
              </div>
              <div class="col-md-6 input-group custom-search-form">
                <div class="input-group" style="margin:0;width:100%">
                  <!--<input type="text" class="form-control" placeholder="Search by Phone No, Payment Type or Reference No" name="search_value">-->
                  <div class="input-group-btn">
                      <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i> Search</button>
                  </div>
                  <div>
                    <a href="<?php echo site_url(); ?>/Customer/excel_export" class="btn btn-success btn-lg"> Export File as CSV</a>
                  </div>
                </div>
              </div>

            </form>
          </div>
  
                    <table class="standing-loans">
                      
                        <thead>
                            <tr>
                              <th>Customer Name</th>
                                <th>Identification</th>
                                <th>Amount </th>
                                <th>Partial Interest </th>
                                <th>Date Created</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if(isset($report)) {
                                    foreach ($report as $key => $sl) {
                                       //$raw_date = $sl->date_due;
                                       // $date = date_format($raw_date,"M d, Y");
                                       // $pricipal = number_format($sl->principal);
                                        echo "
                                            <tr>
                                            <td>".$sl->name."</td>
                                                <td>".$sl->identification."</td>
                                                <td class='text-left'>".$sl->amount."</td>
                                                <td class='text-left'>".$sl->interest."</td>
                                                 <td class='text-left'>".$sl->date_created."</td>
                                                
                                                
                                            </tr>
                                        ";
                                    }
                                }
                            ?>
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
</div>
<style type="text/css">
.col {
    width: 200%;
  }
</style>