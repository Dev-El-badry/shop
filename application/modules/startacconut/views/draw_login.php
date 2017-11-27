<?php
    $first_bit = $this->uri->segment(1);
    $form_action = base_url() . "$first_bit/submit_login";
?>
<div class="row" style="margin: 50px;">
    <div class="col-md-4 col-md-offset-4">
        <?php if(isset($_SESSION['item'])) { ?>
        <p style="color: red" class="alert alert-danger" role="alert"><?php echo $this->session->flashdata('item'); ?></p>
        <?php } ?>
        
        <form class="form-signin" action="<?= $form_action ?>" method="post" >
            <h2 class="form-signin-heading">Sign In</h2><br />
            <label for="inputEmail" class="sr-only">Email address / Username</label>
            <input type="text" id="inputEmail" class="form-control input-lg" placeholder="Email address OR Username" name="username"  autofocus><br />
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword" name="pword" class="form-control input-lg" placeholder="Password" ><br />
            <?php if($first_bit == 'startacconut') { ?>
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="remember" value="remember-me"> Remember me
                </label>
            </div>
            <?php } ?>
            <div class="col-md-6">
                <button class="btn btn-lg btn-primary btn-block" name="submit" value="submit" type="submit">Sign in</button>
            </div>
            <div class="col-md-6">
                <button class="btn btn-lg btn-danger btn-block" name="submit" value="cancel" type="submit">Cancel</button>
            </div>

        </form>
    </div>
</div>
