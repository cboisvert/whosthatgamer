<div class="row">
    <div class="signIn col-md-4 col-md-offset-1">
        <h3>We just need some more information!</h3>
        <?php CHtml::$errorContainerTag = 'span';?>
        <?php $form = $this->beginWidget("CActiveForm",array("action"=>"/public/signup",'htmlOptions'=>array("class"=>"navbar-form navbar-left col-md-6","role"=>"search")));?>
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
        <?php echo CHtml::submitButton("Sign up",array("class"=>"btn btn-default"));?>
        <?php $form = $this->endWidget();?>
    </div>
    <div class="signIn col-md-5 col-md-offset-1">
        <h3>What is that for?</h3>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi blandit massa et felis ornare, sed volutpat lorem ornare. Praesent pretium venenatis mi, sit amet facilisis ante ullamcorper sed. Nunc adipiscing dui eu facilisis suscipit. Nulla sit amet suscipit risus. Vestibulum auctor purus purus, et convallis mauris faucibus id. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse vulputate odio felis, in blandit mauris porttitor non. Donec vitae lorem volutpat, volutpat urna vitae, rutrum eros. Sed varius, risus nec eleifend rhoncus, nibh diam lobortis tortor, quis tristique urna erat quis sapien. Ut quis bibendum eros. Vestibulum eu eros vel nisl interdum aliquam. Fusce vulputate pulvinar adipiscing. Praesent vel accumsan leo. Proin sollicitudin justo ac nunc aliquet rhoncus. Etiam scelerisque vel massa quis rutrum.

            Ut placerat tortor eu dui cursus bibendum. Etiam porttitor, nisi vitae posuere condimentum, ipsum urna lacinia sem, a tristique arcu augue et purus. Sed odio erat, pretium eget nunc eu, lobortis adipiscing nisi. Ut aliquet nisl lacus, in pharetra nibh iaculis eget. Nunc sodales turpis nunc, in cursus mauris condimentum eu. Vivamus odio nunc, congue sed eros sed, iaculis volutpat justo. Quisque condimentum nisl non leo adipiscing, a eleifend neque porttitor. Phasellus egestas, sapien vel malesuada luctus, enim dui interdum urna, vitae fermentum enim sem sit amet neque. In hac habitasse platea dictumst. Vestibulum elementum sem at sapien pellentesque accumsan. Nulla facilisi. Aliquam commodo odio in tristique ullamcorper.
        </p>
    </div>
</div>
