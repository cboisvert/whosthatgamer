<div class="signIn">
    <?php $form = $this->beginWidget("CActiveForm",array('htmlOptions'=>array("class"=>"navbar-form navbar-left","role"=>"search")));?>
    <?php echo $form->textField($model,"username",array("class"=>"form-control connexion","placeholder"=>"Username")) ?>
    <?php echo $form->textField($model,"password",array("class"=>"form-control connexion","placeholder"=>"Password")) ?>
    <?php echo CHtml::submitButton("Login",array("class"=>"btn btn-default"));?>
    <?php $form = $this->endWidget();?>
</div>