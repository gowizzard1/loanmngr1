<div class="login-page">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- <h1 class="pre-head"><span></span></h1>
                <p class="pre-head2">Web Developer</p> -->
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4">
                <?php 
                    echo $form;
                    echo "<p class='err'>".validation_errors()."</p>"; 
                    if (isset($check_user)) {
                        echo "<p class='err'>".$check_user."</p>";
                    }
                ?>
            </div>
        </div>
    </div>
</div>