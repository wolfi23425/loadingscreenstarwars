<?php 
	include(dirname(__FILE__).'/config.php');
	include(dirname(__FILE__).'/includes/errorcheck.php'); //To see whether or not you have the right extension in your URL
	
	$steamid64 = $_GET["steamid"];
	
	//This basically gets us the information needed to output information about the user.
	$url = "http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=" . $APIKey . "&steamids=" . $steamid64;
	$json = file_get_contents($url);
	$table2 = json_decode($json, true);
	$table = $table2["response"]["players"][0];
	
	//This selects the music in the music folder and plays it out in random order, just put your OGG files in the music folder and it'll pop up here!	
	$dir = "music/";
	$scan = scandir($dir);
	$random = rand(2, sizeof($scan)-1);
	// Getting the song name without any extensions
	if(!empty($scan[$random])){
	$scan_random = explode(".",$scan[$random]);
	}
	
	//Gets the timestamp to show when the user joined
	$timestamp = time();
	$timestamp_whole = (date("Y-m-d h:i:s:a",$timestamp));
	
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN">
<head>
	<title><?php echo $load_name ?></title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css" rel="stylesheet">
	<script type="text/javascript" src="includes/jquery.js"></script>
	<script type="text/javascript" src="includes/jquery.timeago.js"></script>
	<script>
		$(document).ready(setTimeout(function() {
		music = document.getElementById("music");
		music.volume = 1.00;
		music.play();
		}, 8000));
		
	</script>	
	<script type="text/javascript">
		jQuery(document).ready(function() {
		  jQuery("abbr.timeago").timeago();
		});
	</script>
</head>
<body >
<?php if($intro == TRUE){ ?>	<div class="intro-page">
		<div class="content">
			<p class="intro-text"><?php echo $tagline ?>
			<p>
			<div class="text-middle2">
				<img class="starwars_glow_img2" src="images/starwars_glow.png" alt="glow">
				<table class="top-text-table2">
					<td>
						<img class="starwars_glow_img_left2" src="images/starwars_pin.png" alt="pin">
					</td>
					<td>
						<p class="top-text2">
							<?php echo $sub_title_1 ?>,  <?php echo $table["personaname"] ?>
						</p>
					</td>
					<td>
						<img class="starwars_glow_img_right2" src="images/starwars_pin.png" alt="pin">
					</td>
				</table>
				<p class="server-intro-name">
					<?php echo $community_name ?>
				</p>
				<table class="bottom-text-table2">
					<td>
						<img class="starwars_glow_img_left2" src="images/starwars_pin.png" alt="pin">
					</td>
					<td>
						<p class="bottom-text2">
							<?php echo $sub_title_2 ?>
						</p>
					</td>
					<td>
						<img class="starwars_glow_img_right2" src="images/starwars_pin.png" alt="pin">
					</td>
				</table>
			</div>
		</div>
	</div> <?php } ?>
	<div class="rest-page">
		<audio id="music">
			<source src="music/<?php echo $scan[$random]; ?>" type="audio/ogg">
		</audio>
		<div id="background">
			<div id="bg1"> </div>
		</div>
		<div class="content">
			<div class="text-middle">
				<img class="starwars_glow_img" src="images/starwars_glow.png" alt="glow">
				<table class="top-text-table">
					<td>
						<img class="starwars_glow_img_left" src="images/starwars_pin.png" alt="pin">
					</td>
					<td>
						<p class="top-text">
							<?php echo $sub_title_1 ?>,  <?php echo $table["personaname"] ?>
						</p>
					</td>
					<td>
						<img class="starwars_glow_img_right" src="images/starwars_pin.png" alt="pin">
					</td>
				</table>
				<p class="server-name">
					<?php echo $community_name ?>
				</p>
				<table class="bottom-text-table">
					<td>
						<img class="starwars_glow_img_left" src="images/starwars_pin.png" alt="pin">
					</td>
					<td>
						<p class="bottom-text">
							<?php echo $sub_title_2 ?>
						</p>
					</td>
					<td>
						<img class="starwars_glow_img_right" src="images/starwars_pin.png" alt="pin">
					</td>
				</table>
			</div>
			<div class="bottom-box">
				<div id="load-box">
					<div id="load-box-width" style="width: 0%;"></div>
				</div>
				<table class="bottom-box-table">
					<td style="width: 25%;" valign="top" >
						<p class="bottom-text-title" >
							<?php echo $left_bottom_title ?>
						</p>
						<table class="bottom-sub-box-table">
							<td>
								<img class="starwars_pin_img_left" src="images/starwars_wpin.png" alt="pin">
							</td>
							<td>
								<p class="bottom-text-subtitle"><?php echo $left_bottom_sub_title ?></p>
							</td>
							<td>
								<img class="starwars_pin_img_right" src="images/starwars_wpin.png" alt="pin">
							</td>
						</table>
						<div class="left-side-text-box">
							<?php echo $left_bottom_text ?>
						</div>
					</td>
					<td  style="width: 50%;">
						<div class="chooseside">
							<img class="choosesideimg" src="images/starwars_side.png">
							<svg width="86px" height="86px" viewBox="0 0 88 88" ng-if="app.user.avatar" class="avatar-image" style="">
								<defs>
									<pattern id="image" height="100%" width="100%" patternContentUnits="objectBoundingBox" viewBox="0 0 1 1" preserveAspectRatio="xMidYMid slice">
										<image x="0" y="0" height="1" width="1" preserveAspectRatio="xMidYMid slice" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $table["avatarfull"] ?>" ng-href="<?php echo $table["avatarfull"] ?>"></image>
									</pattern>
								</defs>
								<path fill="url(#image)" d="M44 88L12.89 75.112 0 44l12.888-31.112L44 0l31.113 12.888L88 44 75.113 75.113"></path>
							</svg>
							<p class="choose-side-bottom">
								Which side will you choose?
							</p>
						</div>
					</td>
					<td  style="width: 25%;" valign="top">
						<p class="bottom-text-title">
							<?php echo $right_bottom_title ?>
						</p>
						<table class="bottom-sub-box-table">
							<td>
								<img class="starwars_pin_img_left" src="images/starwars_wpin.png" alt="pin">
							</td>
							<td>
								<p class="bottom-text-subtitle"><?php echo $right_bottom_sub_title ?></p>
							</td>
							<td>
								<img class="starwars_pin_img_right" src="images/starwars_wpin.png" alt="pin">
							</td>
						</table>
						<div class="right_bottom_text_column" style="margin-top: 3%;">We are currently playing on <span id="map">Map Name</span></div>
						<div class="right_bottom_image_divider"><img class="starwars_pin_divider_left" src="images/starwars_wpin.png" alt="pin"><img class="starwars_pin_divider_right" src="images/starwars_wpin.png" alt="pin"></div>
						<div class="right_bottom_text_column">We are currently running <span id="gamemode">Gamemode Name</span></div>
						<div class="right_bottom_image_divider"><img class="starwars_pin_divider_left" src="images/starwars_wpin.png" alt="pin"><img class="starwars_pin_divider_right" src="images/starwars_wpin.png" alt="pin"></div>
						<div class="right_bottom_text_column">You started to join <span id="timeago"><abbr class="timeago" title="<?php echo $timestamp_whole  ?>"></abbr></span></div>
					</td>
				</table>
			</div>
		</div>
	</div>
	<!--We put scripts at the bottom to load the HTML faster -->
	<script type="text/javascript" src="includes/main.js"></script>
</body>