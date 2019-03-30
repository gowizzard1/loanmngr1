<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"> -->
<script src="<?php echo base_url(); ?>assets\custom\js\jquery.min.js">
</script>
<script src="<?php echo base_url(); ?>assets\custom\bootbox\bootbox.js">
</script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.js"></script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/js/bootstrap.min.js"></script> -->
<script src="<?php echo base_url(); ?>assets\custom\bootstrap\bootstrap.js">
</script>
<div class="home">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <h3 class="section-title">
                    Paid Loans
                </h3>
                    <table class="standing-loans">
                        <thead>
                            <tr>
                                <th>Customers</th>
                                <th>Identification#</th>
                                <th>Due Date</th>
                                <th>Agent</th>
                                <th>Field Officer</th>
                                <th>Paid</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if(isset($paid_loans)) {
                                    foreach ($paid_loans as $key => $sl) {
                                       $raw_date = $sl->date_due;
                                       // $date = date_format($raw_date,"M d, Y");
                                        $pricipal = number_format($sl->principal);
                                        echo "
                                            <tr>
                                                <td>".$sl->customer_name."</td>
                                                <td class='text-left'>".$sl->identification."</td>
                                                <td class='text-left'>".$raw_date."</td>
                                                <td class='text-left'>".$sl->agent."</td>
                                                <td class='text-left'>".$sl->officer."</td>
                                                <td class='text-left'>".$pricipal."</td>
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
