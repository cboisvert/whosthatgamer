<?php
    $model = new LoginForm();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Who's that gamer?</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="<?php echo $this->assetsUrl.'/css/bootstrap/css/bootstrap.css';?>" rel="stylesheet">
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo $this->assetsUrl.'/css/bootstrap/js/bootstrap.js';?>"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <link href="<?php echo $this->assetsUrl.'/css/home.css';?>" rel="stylesheet">
</head>
<body>
<header>
    <nav class="navbar navbar-default" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header col-md-offset-1">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Who's that gamer?</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse col-md-offset-8" id="bs-example-navbar-collapse-1">
            <?php $form = $this->beginWidget("CActiveForm",array('action'=>"/public/login",'htmlOptions'=>array("class"=>"navbar-form navbar-left","role"=>"search")));?>
            <?php echo $form->textField($model,"username",array("class"=>"form-control connexion","placeholder"=>"Username")) ?>
            <?php echo $form->textField($model,"password",array("class"=>"form-control connexion","placeholder"=>"Password")) ?>
            <?php echo CHtml::submitButton("Login",array("class"=>"btn btn-default"));?>
            <?php $form = $this->endWidget();?>

        </div><!-- /.navbar-collapse -->
    </nav>
</header>
<div class="">
    <?php echo $content; ?>
</div>



</body>
</html>