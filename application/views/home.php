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
<div class="container">
  <!-- <h2>Modal Example</h2> -->
  <!-- Trigger the modal with a button -->

    <button type="button" onclick="edit()" class="btn btn-info btn-lg" data-toggle="modal" data-target="#addLoan">Loan Application </button>
  
  <!-- Modal -->
  <div class="modal fade" id="addLoan" role="dialog">
    <div class="modal-dialog">
    <form id="addLoanForm" method="post" class="form-horizontal" enctype="multipart/form-data">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" >&times;</button>
          <h4 class="modal-title"><center>Add Loan </center></h4>
            
         
        </div>
        <div class="modal-body">
         <!--  <p>Some text in the modal.</p> -->
           <div class="form-group">
              <label class="col-lg-3 control-label">Customer Name <sup>*</sup></label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="c_name" id="c_name" placeholder="Please Enter the Customer Name" />
              </div>
            </div>
              <div class="form-group">
              <label class="col-lg-3 control-label">ID Number <sup>*</sup></label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="identification" id="identification" placeholder="Please Enter the ID Number" />
              </div>
            </div>
                 <div class="form-group">
              <label class="col-lg-3 control-label">Amount <sup>*</sup></label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="amount" id="amount" placeholder="Please Enter the Loan Amount" />
              </div>
            </div>
              <div class="form-group">
              <label class="col-lg-3 control-label">Interest <sup>*</sup></label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="interest" id="interest" placeholder="Please Enter the Loan Interest" />
              </div>
            </div>
                   <div class="form-group">
              <label class="col-lg-3 control-label">Agent <sup>*</sup></label>
              <div class="col-lg-9">
                <select class="form-control mb15 selectpicker" name="agent" id="agent" data-live-search="true" data-style="btn-white">
                  <?php foreach ($designation as $des){?>
                    <option value="<?php echo $des->name; ?>"><?php echo $des->name; ?></option>
                  <?php } ?> 
              
                </select>
              </div>
            </div> 
                <div class="form-group">
              <label class="col-lg-3 control-label">Field Officer <sup>*</sup></label>
              <div class="col-lg-9">
                <select class="form-control mb15 selectpicker" name="officer" id="officer" data-live-search="true" data-style="btn-white">
                  <?php foreach ($officer as $desig){?>
                    <option value="<?php echo $desig->name; ?>"><?php echo $desig->name; ?></option>
                  <?php } ?> 
              
                </select>
              </div>
            </div> 
        </div>
        <div class="modal-footer" >
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" id="addLoan_button" class="btn btn-primary">Submit</button>
        </div>
      </div>
      </form>
    </div>
  </div>

    
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Register User </button>


  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    <form id="addUserForm" method="post" class="form-horizontal" enctype="multipart/form-data">
    
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><center>Register New User</center></h4>
        </div>
        <div class="modal-body">
    
           <div class="form-group">
              <label class="col-lg-3 control-label">Username <sup>*</sup></label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="username" placeholder="Please Enter the Customer Name" />
              </div>
            </div>
              <div class="form-group">
              <label class="col-lg-3 control-label">Email <sup>*</sup></label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="email" placeholder="Please Enter the Customer Name" />
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-3 control-label">Password <sup>*</sup></label>
              <div class="col-lg-9">
                <input type="password" class="form-control" name="password" placeholder="Please Enter the Customer Name" />
              </div>
            </div>
             <div class="form-group">
              <label class="col-lg-3 control-label">Confirm Password <sup>*</sup></label>
              <div class="col-lg-9">
                <input type="password" class="form-control" name="password1" placeholder="Please Enter the Customer Name" />
              </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </div>
      </form>
    </div>
  </div>
   <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#payLoan">Loan Repayment </button>

  <!-- Modal -->
  <div class="modal fade" id="payLoan" role="dialog">
    <div class="modal-dialog">
    <form id="payForm" method="post" class="form-horizontal" enctype="multipart/form-data">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Loan Repayment</h4>
        </div>
        <div class="modal-body">
         <!--  <p>Some text in the modal.</p> -->
           <div class="form-group">
              <label class="col-lg-3 control-label">ID Number <sup>*</sup></label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="identification" placeholder="Please Enter the ID Number" />
              </div>
            </div>
               <div class="form-group">
              <label class="col-lg-3 control-label">Name <sup>*</sup></label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="name" placeholder="Please Enter the Amount" />
              </div>
            </div>
                  <div class="form-group">
              <label class="col-lg-3 control-label">Agent <sup>*</sup></label>
              <div class="col-lg-9">
                <select class="form-control mb15 selectpicker" name="agent" id="agent" data-live-search="true" data-style="btn-white">
                  <?php foreach ($designation as $des){?>
                    <option value="<?php echo $des->name; ?>"><?php echo $des->name; ?></option>
                  <?php } ?> 
              
                </select>
              </div>
            </div> 
              <div class="form-group">
              <label class="col-lg-3 control-label">Amount <sup>*</sup></label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="amount" placeholder="Please Enter the Amount" />
              </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </div>
      </form>
    </div>
  </div>

  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#addEmpl">Register Employee </button>

  <!-- Modal -->
  <div class="modal fade" id="addEmpl" role="dialog">
    <div class="modal-dialog">
    <form id="addEmplForm" method="post" class="form-horizontal" enctype="multipart/form-data">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><center>Register Employee</center></h4>
        </div>
        <div class="modal-body">
         <!--  <p>Some text in the modal.</p> -->
           <div class="form-group">
              <label class="col-lg-3 control-label">Name <sup>*</sup></label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="employee" id="employee" placeholder="Please Enter the ID Number" />
              </div>
            </div>
              <div class="form-group">
              <label class="col-lg-3 control-label">ID Number <sup>*</sup></label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="identification1" id="identification1" placeholder="Please Enter the Amount" />
              </div>
            </div>
                <div class="form-group">
              <label class="col-lg-3 control-label">Designation <sup>*</sup></label>
              <div class="col-lg-9">
                <select class="form-control mb15 selectpicker" name="designation" id="designation" data-live-search="true" data-style="btn-white">
                 <option value='CEO'>CEO</option>
                <option value='Manager'>Manager</option>
                <option value='officer'>Field Officer</option>
                <option value='agent'>Agent</option>
                <!-- <option value="js">JavaScript</option> -->
                </select>
              </div>
            </div> 
                <div class="form-group">
              <label class="col-lg-3 control-label">Salary <sup>*</sup></label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="salary" id="salary" placeholder="Please Enter the Amount" />
              </div>
            </div>
                 <div class="form-group">
              <label class="col-lg-3 control-label">Commission <sup>*</sup></label>
              <div class="col-lg-9">
                <input type="text" class="form-control" id="commission1" placeholder="Please Enter the Amount" />
              </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" id="addEmp_button" class="btn btn-primary">Submit</button>
        </div>
      </div>
      </form>
    </div>
  </div>
</div>

<div class="home">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <h3 class="section-title">
                    Standing Loans
                </h3>
                    <table class="standing-loans">
                        <thead>
                            <tr>
                                <th>Customers</th>
                                <th>Identification#</th>
                                <th>Due Date</th>
                                <th>Agent</th>
                                <th>Field Officer</th>
                                <th>Balance</th>
                                <th> Interest</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if(isset($standing_loans)) {
                                    foreach ($standing_loans as $key => $sl) {
                                       $raw_date = $sl->date_due;
                                       // $date = date_format($raw_date,"M d, Y");
                                        $amount = number_format($sl->total_loan);
                                        echo "
                                            <tr>
                                                <td>".$sl->customer_name."</td>
                                                <td class='text-left'>".$sl->identification."</td>
                                                <td class='text-left'>".$raw_date."</td>
                                                <td class='text-left'>".$sl->agent."</td>
                                                <td class='text-left'>".$sl->officer."</td>
                                                <td class='text-left'>".$amount."</td>
                                                <td class='text-left'>".$sl->interest."</td>
                                                <td><a href='".site_url()."/clients/profile/".$sl->identification."'>Details</a></td>
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
<script type="text/javascript">
 /*$("#addLoan_button").click(function(){
       
     
         var mydata = JSON.stringify({ 
            "officer":$("#officer").val(), 
            "agent":$("#agent").val(), 
            "amount":$("#amount").val(),
            "c_name":$("#c_name").val(),
            "identification":$("#identification").val(),
           "interest":$("#interest").val() 
           })
            alert(mydata)
          // var mydata = JSON.parse(mydata)
             $.ajax({

          url: 'http://localhost/loanmngr/index.php/Customer/createloan',
          dataType: 'json',
          type: 'POST',
          headers: { 
          'Content-Type': 'application/json',
        Accept: 'application/json'
    },
          data: mydata,
          success: function(data, textStatus, jQxhr){
             $('#addLoan').modal('hide'); 
           
          alert('Good')
         location.reload();
          },
          error: function(jqXhr, textStatus, errorThrown){
         // alert('Failed'+jqXhr+textStatus+errorThrown)
          alert(errorThrown)
          console.warn(jqXhr.responseText)
          }
         })
             
  
      
     });*/
     $("#payForm").submit(function(e) {

    e.preventDefault(); // avoid to execute the actual submit of the form.

    var form = $(this);
    var url = 'http://localhost/loanmngr/index.php/Customer/payLoan';

    $.ajax({
           type: "POST",
           url: url,
           data: form.serialize(), // serializes the form's elements.
           success: function(data)
           {
                alert('Loan Paid successfully'); // show response from the php script.
           }
         });
        window.location.reload();

});
     $("#addLoanForm").submit(function(e) {

    e.preventDefault(); // avoid to execute the actual submit of the form.

    var form = $(this);
    var url = 'http://localhost/loanmngr/index.php/Customer/createloan';
  //alert(form)
    $.ajax({
           type: "POST",
           url: url,
           data: form.serialize(), // serializes the form's elements.
           success: function(data)
           {
               alert('Loan Created was successfully'); // show response from the php script.
           }
         });
       window.location.reload();

});
   $("#addEmplForm").submit(function(e) {

    e.preventDefault(); // avoid to execute the actual submit of the form.

    var form = $(this);
    var url = 'http://localhost/loanmngr/index.php/Customer/createEmployee';
    //alert(form)
    $.ajax({
           type: "POST",
           url: url,
           data: form.serialize(), // serializes the form's elements.
           success: function(data)
           {
               alert('Employee Created successfully'); // show response from the php script.
           }
         });
       window.location.reload();

});

    $("#addUserForm").submit(function(e) {

    e.preventDefault(); // avoid to execute the actual submit of the form.

    var form = $(this);
    var url = 'http://localhost/loanmngr/index.php/Customer/createUser';
    //alert(form)
    $.ajax({
           type: "POST",
           url: url,
           data: form.serialize(), // serializes the form's elements.
           success: function(data)
           {
               alert('User Created successfully'); // show response from the php script.
           }
         });
       window.location.reload();

});

   // $("#addEmp_button").click(function(){
       
     
   //       var mydata = JSON.stringify({ 
   //          "name":$("#employee").val(), 
   //          "salary":$("#salary").val(), 
   //          "designation":$("#designation").val(),
   //          "commission":$("#commission1").val(),
   //          "identification":$("#identification1").val()
           
   //         })
   //          // alert(mydata)
   //          // var mydata=JSON.parse(mydata);
   //        // var mydata = JSON.parse(mydata)
   //           $.ajax({

   //        url: 'http://localhost/loanmngr/index.php/Customer/createEmployee',
   //        dataType: 'json',
   //        type: 'POST',
   //        headers: { 
   //        'Content-Type': 'application/json',
   //      Accept: 'application/json'
   //  },
   //        data: mydata,
   //        success: function(data, textStatus, jQxhr){
   //           $('#addEmpl').modal('hide'); 
           
   //        alert('Good')
   //       location.reload();
   //        },
   //        error: function(jqXhr, textStatus, errorThrown){
   //       // alert('Failed'+jqXhr+textStatus+errorThrown)
   //        alert(textStatus)
   //        console.warn(jqXhr.responseText)
   //         $('#addLoan').modal('hide'); 
   //        }
   //       })
             
  
      
   //   });
</script>
<style type="text/css">
  .modal-header {
  padding: 2px 16px;
  background-color: #3f939e;
  color: white;
}
</style>