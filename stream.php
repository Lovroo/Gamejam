<?php
include('glava.php');
include('povezava.php');
?>
		<section id="features" class="features">
			<div class="container">
<div id="twitch-embed"></div>

    <!-- Load the Twitch embed JavaScript file -->
    <script src="https://embed.twitch.tv/embed/v1.js"></script>

    <!-- Create a Twitch.Embed object that will render within the "twitch-embed" element -->
    <script type="text/javascript">
      new Twitch.Embed("twitch-embed", {
        width: 854,
        height: 480,
        channel: "gamejam2022",
      });
    </script>
	</div>
	</section>
<?php
require('noga.php');
?>