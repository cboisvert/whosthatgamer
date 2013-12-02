<div class="row">
    <div class="signIn col-md-3 col-md-offset-1">
        <h3>No Account? Sign up now!</h3>
        <?php $form = $this->beginWidget("CActiveForm",array("action"=>"/public/signup",'htmlOptions'=>array("class"=>"navbar-form navbar-left col-md-6","role"=>"search")));?>
        <?php echo $form->textField($signUp,"email",array("class"=>"form-control signupfield","placeholder"=>"Email")) ?>
        <?php echo $form->textField($signUp,"password",array("class"=>"form-control signupfield","placeholder"=>"Password")) ?>
        <?php echo $form->textField($signUp,"repassword",array("class"=>"form-control signupfield","placeholder"=>"Re-type password")) ?>
        <?php echo CHtml::submitButton("Login",array("class"=>"btn btn-default"));?>
        <?php $form = $this->endWidget();?>
    </div>
    <div class="signIn col-md-5 col-md-offset-2">
        <h3>What is it?</h3>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi blandit massa et felis ornare, sed volutpat lorem ornare. Praesent pretium venenatis mi, sit amet facilisis ante ullamcorper sed. Nunc adipiscing dui eu facilisis suscipit. Nulla sit amet suscipit risus. Vestibulum auctor purus purus, et convallis mauris faucibus id. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse vulputate odio felis, in blandit mauris porttitor non. Donec vitae lorem volutpat, volutpat urna vitae, rutrum eros. Sed varius, risus nec eleifend rhoncus, nibh diam lobortis tortor, quis tristique urna erat quis sapien. Ut quis bibendum eros. Vestibulum eu eros vel nisl interdum aliquam. Fusce vulputate pulvinar adipiscing. Praesent vel accumsan leo. Proin sollicitudin justo ac nunc aliquet rhoncus. Etiam scelerisque vel massa quis rutrum.

            Ut placerat tortor eu dui cursus bibendum. Etiam porttitor, nisi vitae posuere condimentum, ipsum urna lacinia sem, a tristique arcu augue et purus. Sed odio erat, pretium eget nunc eu, lobortis adipiscing nisi. Ut aliquet nisl lacus, in pharetra nibh iaculis eget. Nunc sodales turpis nunc, in cursus mauris condimentum eu. Vivamus odio nunc, congue sed eros sed, iaculis volutpat justo. Quisque condimentum nisl non leo adipiscing, a eleifend neque porttitor. Phasellus egestas, sapien vel malesuada luctus, enim dui interdum urna, vitae fermentum enim sem sit amet neque. In hac habitasse platea dictumst. Vestibulum elementum sem at sapien pellentesque accumsan. Nulla facilisi. Aliquam commodo odio in tristique ullamcorper.
        </p>
    </div>
</div>
