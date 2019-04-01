<nav class="navbar navbar-default menu-bar">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand visible-xs" href="#">Menu</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar">
             <ul class="nav navbar-nav navbar-centre menu-group">
                 <li class="menu-list"><a href="<?php echo site_url('/home'); ?>">Standing loans</a></li>
            </ul>
             <ul class="nav navbar-nav navbar-centre menu-group">
                 <li class="menu-list"><a href="<?php echo site_url('home2'); ?>">Paid loans</a></li>
            </ul>
             <ul class="nav navbar-nav navbar-centre menu-group">
                 <li class="menu-list"><a href="<?php echo site_url('users'); ?>">Users</a></li>
            </ul>
           <?php 
               // echo $navbar_left;
                // echo "string";
            ?> 
             
            <ul class="nav navbar-nav navbar-centre menu-group">
                 <li class="menu-list"><a href="<?php echo site_url('/reports'); ?>">Reports</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-centre menu-group">
                 <li class="menu-list"><a href="<?php echo site_url('/salary'); ?>">Payroll</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right menu-group">
                <li class="menu-list"><a href="<?php echo site_url('users/logout'); ?>">Logout</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <div class="row">
        <div class='col-sm-12'>
                <?php 
                    if(isset($breadcrumbs)) {
                        echo $breadcrumbs; 
                    }
                ?>
        </div>
    </div>
    <div class="row">
        <div class='col-sm-6 col-md-4'>
            <h3 class="section-title">
                <?php 
                    if(isset($form_header)) {
                        echo $form_header; 
                    }
                ?>
            </h3>
            <?php
                if(isset($form1)) {
                    echo $form1;
                    echo validation_errors();
                    if(isset($form1_alert)) {
                        echo $form1_alert;
                    }else if(null !== $this->input->get('form1_alert')) {
                        echo $this->input->get('form1_alert');
                    }
                }
                if(isset($form2)) {
                    echo $form2;
                    echo validation_errors();
                    if(isset($form2_alert)) {
                        echo $form2_alert;
                    }else if(null !== $this->input->get('form2_alert')) {
                        echo $this->input->get('form2_alert');
                    }
                }
                if(isset($form3)) {
                    echo $form3;
                    echo validation_errors();
                    if(isset($form3_alert)) {
                        echo $form3_alert;
                    }else if(null !== $this->input->get('form3_alert')) {
                        echo $this->input->get('form3_alert');
                    }
                }
            ?>
        </div>
        <div class="col-sm-6 col-md-8">
            <h3 class="section-title">
                <?php 
                    if(isset($table_header)) {
                        echo $table_header; 
                    }
                ?>
            </h3>
                <?php
                    if(isset($table)) {
                        echo $table;
                    }
                ?>
        </div>
    </div>
</div>
<style type="text/css">
    .col-md-8 {
    width: 100%;
}
</style>

