<div class="row">
    <div class="signIn col-md-4 col-md-offset-4">
        <h3 class="yellow">We just need some more information!</h3>
        <?php CHtml::$errorContainerTag = 'span';?>
        <div class="col-md-6">
            <?php $form = $this->beginWidget("CActiveForm",array("action"=>"",'htmlOptions'=>array("class"=>"navbar-form navbar-left col-md-6","role"=>"search")));?>
            <?php echo $form->errorSummary($model);?>
            <?php echo $form->label($model,"firstname");?>
            <?php echo $form->textField($model,"firstname",array("class"=>"form-control signupfield","placeholder"=>"Email")) ?>
            <?php //echo $form->error($signUp,'password');?>
            <?php echo $form->label($model,"lastname");?>
            <?php echo $form->textField($model,"lastname",array("class"=>"form-control signupfield","placeholder"=>"Password")) ?>
            <?php //echo $form->error($signUp,'repassword');?>
            <?php echo $form->label($model,"email");?>
            <?php echo $form->emailField($model,"email",array("class"=>"form-control signupfield","placeholder"=>"Re-type password")) ?>
            <?php echo $form->label($model,"password");?>
            <?php echo $form->passwordField($model,"password",array("class"=>"form-control signupfield","placeholder"=>"Re-type password")) ?>
            <?php echo $form->label($model,"repassword");?>
            <?php echo $form->passwordField($model,"repassword",array("class"=>"form-control signupfield","placeholder"=>"Re-type password")) ?>
            <?php echo $form->label($model,"age");?>
            <?php echo $form->textField($model,"age",array("class"=>"form-control signupfield","placeholder"=>"Password")) ?>
        </div>
        <div class="col-md-6">
            <?php echo $form->label($model,"id_image");?>
            <?php echo $form->textField($model,"id_image",array("class"=>"form-control signupfield","placeholder"=>"Password")) ?>
            <?php echo $form->label($model,"city");?>
            <?php echo $form->textField($model,"city",array("class"=>"form-control signupfield","placeholder"=>"Password")) ?>
            <?php echo $form->label($model,"country");?>
            <?php echo $form->textField($model,"country",array("class"=>"form-control signupfield","placeholder"=>"Password")) ?>
            <?php echo $form->label($model,"psnAccount");?>
            <?php echo $form->textField($model,"psnAccount",array("class"=>"form-control signupfield","placeholder"=>"Password")) ?>
            <?php echo $form->label($model,"liveAccount");?>
            <?php echo $form->textField($model,"liveAccount",array("class"=>"form-control signupfield","placeholder"=>"Password")) ?>
            <?php echo $form->label($model,"nintendoAccount");?>
            <?php echo $form->textField($model,"nintendoAccount",array("class"=>"form-control signupfield","placeholder"=>"Password")) ?>
            <?php echo $form->label($model,"steamAccount");?>
            <?php echo $form->textField($model,"steamAccount",array("class"=>"form-control signupfield","placeholder"=>"Password")) ?>
        </div>
        <div class="col-md-6 col-md-offset-3 infoButtonMargin">
            <?php echo CHtml::submitButton("Sign up",array("class"=>"btn btn-primary btn-block blue button"));?>
        </div>

        <?php $form = $this->endWidget();?>
    </div>
</div>
