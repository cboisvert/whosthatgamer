<div class="container-fluid">
	<div class="resume col-xs-12 col-md-2 col-md-offset-1 divBackground">
		<div class="imgProfile"><img src="<?php echo $profile->avatar->full;?>"/></div>
		<div class="gamerTag"><?php echo $profile->gamertag;?></div>
		<div class="description"><?php echo $profile->biography;?></div>
		<div class="ficheInfo">
			<?php
				if($profile->name != ""){
				?>
					<div>Name: <?php echo $profile->name;?></div>
				<?php
				}
				if($profile->gamerscore != ""){
				?>
					<div>Gamer score: <?php echo $profile->gamerscore;?></div>
				<?php
				}
				if($profile->reputation !=""){
				?>
					<div>Reputation: <?php echo $profile->reputation;?></div>
				<?php
				}
				if($profile->location != ""){
				?>
					<div>Location: <?php echo $profile->location;?></div>
				<?php
				}
			?>
		</div>
	</div>
	<div class="resume col-xs-12 col-md-6 divBackground">
        <div>
            <?php
            if($profile->online){
                ?>
                <div class="online"><span class="glyphicon glyphicon-record"></span><span> Online</span><span>- <?php echo $profile->presence;?></span></div>
            <?php
            }
            else{
                ?>
                <div class="offline"><span class="glyphicon glyphicon-record"></span><span> Offline</span><span>- <?php echo $profile->presence;?></span></div>
            <?php
            }
            ?>
            <div>
                <h2>Games own by <?php echo $profile->gamertag;?></h2>
                <div class="allGames row-fluid">
                    <?php
                    foreach($games as $game){
                        if(!$game->isapp){
                            ?>
                            <div class="gameRow  col-sm-3">
                                    <img src="<?php echo $game->artwork->small; ?>"/>
                                <div>
                                    <?php echo $game->title; ?>
                                </div>
                            </div>
                        <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
	</div>
	<div class="resume col-xs-12 col-md-2 divBackground">
		4
	</div>	
</div>