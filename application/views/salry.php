<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"> -->
<script src="<?php echo base_url(); ?>assets\custom\js\jquery.min.js">
</script>
<script src="<?php echo base_url(); ?>assets\custom\bootbox\bootbox.js">
</script>
<script src="<?php echo base_url(); ?>assets\custom\bootstrap\bootstrap.js">
</script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/js/bootstrap.min.js"></script> -->
<script type="text/javascript">
   // $.ajax({
   //    url: '<?php echo site_url(); ?>/Customer/createloan',
   //    type: 'post',
   //    data: $('#addLoan :input'),
   //    dataType: 'html',   
   //    success: function(html) {
   //          $('#addLoan').modal('hide');
   //          // bootbox.alert(html, function()
   //          //   {
   //          //  window.location.reload();
   //          //   });
   //          }
   //  });
   
   // function ediit()
   //    {
   //    $.ajax({
   //          url: '<?php echo site_url(); ?>/Customer/getDesignationOffice',
   //          type: 'post',
   //          dataType: 'html',   
   //          success: function(html) {
   //           $('#edit-customer-content').html(html);
   //          }
   //        });
   //    }
     function edit()
      {
      $.ajax({
            url: '<?php echo site_url(); ?>/Customer/getDesignation',
           
            type: 'post',
            dataType: 'html',   
            success: function(html) {
             $('#edit-customer-content').html(html);
            }
          });
      }
</script>


<div class="home">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <h3 class="section-title">
                    Salaries
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
                    <a href="<?php echo site_url(); ?>/Customer/createXLS" class="btn btn-success btn-lg"> Export File as CSV</a>
                  </div>
                </div>
              </div>

            </form>
          </div>
                    <table class="standing-loans">
                        <thead>
                            <tr>
                                <th>Officer Name</th>
                                <th>Identification#</th>
                                <th>Basic Salary</th>
                                <th>Deduction</th>
                                <!-- <th>Loan</th> -->
                                <th>Net</th>
                                <th> Date</th>
                                <!-- <th>Action</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if(isset($salo)) {
                                    foreach ($salo as $key => $sl) {
                                      $raw_date = $sl->date_created;
                                     //  $date = date_format($raw_date,"M d, Y");
                                        $amount = number_format($sl->salary);
                                        echo "
                                            <tr>
                                                <td>".$sl->name."</td>
                                                <td class='text-left'>".$sl->identification."</td>
                                               
                                                
                                                <td class='text-left'>".$amount."</td>
                                                <td class='text-left'>".$sl->identification."</td>
                                               
                                                <td class='text-left'>".$amount."</td>
                                                <td class='text-left'>".$raw_date."</td>
                                            </tr>
                                        ";
                                    }
                                }
                            ?>
                        </tbody>
                    </table>
            </div>

        </div>
        <br><br>
         <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <h3 class="section-title">
                    Commissions
                </h3>
                    <table class="standing-loans">
                        <thead>
                            <tr>
                                <th>Agent Name</th>
                                <th>Identification#</th>
                                <th>Sales#</th>
                                <th>Commissions</th>
                                <th>Deduction</th>
                              <!--   <th>Loan</th> -->
                                <th>Net</th>
                                <!-- <th> Interest</th>
                                <th>Action</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if(isset($comm)) {
                                    foreach ($comm as $key => $sl) {
                                      // $raw_date = $sl->date_due;
                                       // $date = date_format($raw_date,"M d, Y");
                                        $amount = number_format($sl->value_sum);
                                        $commision=($sl->value_sum*5/100);
                                        $deductions=0;
                                        $net=$commision-$deductions;
                                        echo "
                                            <tr>
                                                <td>".$sl->agent."</td>
                                                <td class='text-left'>".$sl->identification."</td>
                                               
                                                
                                                <td class='text-left'>".$amount."</td>
                                                <td class='text-left'>".$commision."</td>
                                                <td class='text-left'>".$deductions."</td>
                                               
                                                <td class='text-left'>".$net."</td>
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

<style type="text/css">
  .modal-header {
  padding: 2px 16px;
  background-color: #3f939e;
  color: white;
}
.col {
    width: 200%;
  }
</style>
