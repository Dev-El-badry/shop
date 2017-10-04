<div class="row" style="margin: 50px auto;">
    <div class="col-md-12">
        <legend>Register</legend>
        <?php
            $action_url = base_url() . 'startacconut/submit';
        ?>
<?= validation_errors('<p style="color: red">', '</p>') ?>
        <form class="form-horizontal" method="post" action="<?= $action_url ?>" style="margin-top: 60px">
            <fieldset>

                <!-- Form Name -->


                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="textinput">Username</label>
                    <div class="col-md-4">
                        <input id="textinput" name="username" type="text" value="<?= $username ?>" placeholder="John" class="form-control input-md"  autocomplete="off">

                    </div>
                </div>


                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="email">E-mail</label>
                    <div class="col-md-4">
                        <input id="email" name="email" value="<?= $email ?>"  type="text" placeholder="john.smith@mail.com" class="form-control input-md"autocomplete="off">

                    </div>
                </div>

                <!-- Password input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="passwordinput">Password</label>
                    <div class="col-md-4">
                        <input id="passwordinput" name="pword" value="<?= $pword ?>" type="password" placeholder="Enter your password" class="form-control input-md" autocomplete="off" >

                    </div>
                </div>

                <!-- Password input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="passwordinput">Repeat password </label>
                    <div class="col-md-4">
                        <input id="passwordinput" name="re_pword" value="<?= $re_pword ?>" type="password" placeholder="Repeat your password" class="form-control input-md" autocomplete="off">

                    </div>
                </div>

                <!-- Button -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="singlebutton">Create Accound?</label>
                    <div class="col-md-4">
                         <button id="singlebutton" name="submit" value="submit" class="btn btn-primary">Yes</button>
                         <button id="singlebutton" name="submit" value="cancel" class="btn btn-danger">Cancel</button>
                    </div>
                </div>

            </fieldset>
        </form>
    </div>
</div>