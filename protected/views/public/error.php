<div class="row">
    <div class="signIn col-md-3 col-md-offset-1 errorCustom">
        <h2>
            <?php
            if($code == 404)
                echo "Where do you think you're going?";
            else if($code == 1)
                echo "Do I know you?";
            else
                echo $message;
            ?>
        </h2>
        <p>
            <?php echo CHtml::encode($message);?>
        </p>
    </div>

</div>