
<!DOCTYPE html>
<?php
session_start();
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">

    <title>Dota 2 Wiki</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <link href="../css/carousel.css" rel="stylesheet">
  </head>
	<?php
  if($_SESSION['user'] == "")//if not logged in, shoot them to index page
        header('Location: index.php');
		?>
<!-- NAVBAR
================================================== -->
  <body>
 

        <nav class="navbar navbar-inverse" role="navigation">
    
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="http://babbage.cs.missouri.edu/~kkwp4b/cs2830/webpages/">Dota 2 Wiki</a>
            </div>
            <div class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li><a href="http://babbage.cs.missouri.edu/~kkwp4b/cs2830/webpages/hero">Hero</a></li>
                <li><a href="http://babbage.cs.missouri.edu/~kkwp4b/cs2830/webpages/item">Item</a></li>
				<li><a href="http://babbage.cs.missouri.edu/~kkwp4b/cs2830/webpages/creeps">Creeps</a></li>
              </ul>
			  <ul class="nav navbar-nav navbar-right">
				<li><a href="logout.php">Logout</a></li>
			  </ul>
            </div>
         
        </nav>
      
    


    <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <div class="carousel-inner">
        <div class="item active">
       
            <div class="carousel-caption">
              <h1>Welcome to Dota 2 Wiki</h1>
            </div>
        
        </div>
      </div>
    </div><!-- /.carousel -->



    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">

      <!-- Three columns of text below the carousel -->
      <div class="row">
        <div class="col-lg-4">
          <img class="img-circle" src="../css/Main_Page_icon_Heroes.png">
          <h2><a href="http://babbage.cs.missouri.edu/~kkwp4b/cs2830/webpages/hero">Heroes</a></h2>
          <p>Heroes are the essential element of Dota 2, as the course of the game is dependent on their intervention. Players are split into two teams of 5, and can select a Hero from a selection panel. Heroes all have different play styles that stem from unique Skills and combinations of Attributes. Over the course of the game, Heroes will accumulate Experience. Once a Hero has enough experience, they will level up, making them more powerful than before and allowing them to train new Skills. Most Heroes have a distinct Role that defines how they can affect the battlefield, though many Heroes can perform two or more of these Roles. Currently, 107 of the 112 heroes are playable in the main Dota 2 client.</p>
          <p><a class="btn btn-default" href="http://babbage.cs.missouri.edu/~kkwp4b/cs2830/webpages/hero" role="button">View details </a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img class="img-circle" src="../css/Item.png">
          <h2><a href="http://babbage.cs.missouri.edu/~kkwp4b/cs2830/webpages/item">Items</a></h2>
          <p>Items are objects sold by shops or dropped from certain creeps that provide an ability, bonus, or other function not tied to a particular hero (exception: the hero's Ultimate upgrade provided by Aghanim's Scepter). They come in a multitude of forms and types.Most items take up space in a Hero's Inventory, meaning only a finite number can be carried at one time. Recipe items will automatically remove their components from a Hero's Inventory and Stash when they are assembled. Because of this, strategy and thought is required in the order and selection of items to purchase.</p>
          <p><a class="btn btn-default" href="http://babbage.cs.missouri.edu/~kkwp4b/cs2830/webpages/item" role="button">View details </a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img class="img-circle" src="../css/Creeps.png" width ="140" height="140">
          <h2><a href="http://babbage.cs.missouri.edu/~kkwp4b/cs2830/webpages/creeps">Creeps</a></h2>
          <p>Creeps are AI controlled units that spawn in lanes and in the jungle around the map. Neutral and Lane Creeps when killed, grant the player gold and experience. Creeps have a variety of unique combat attributes, rewards, and spawning patterns. Certain heroes, such as Chen, and items, such as Helm of the Dominator, can take control of creeps for a specified amount of time.</p>
          <p><a class="btn btn-default" href="http://babbage.cs.missouri.edu/~kkwp4b/cs2830/webpages/creeps" role="button">View details </a></p>
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->
    <p>There are various matchmaking modes currently available in the Dota 2:
	</p><p><b>All Pick</b>- All <a href="hero" title="Heroes">Heroes</a> are available to all players. Every player picks their heroes at the same time. A player can also choose to "random" a hero, which will (you guessed it) choose a random Hero for the player, as well as give the player a bonus 250 starting gold. This is the mode used in the current matchmaking system.
	</p><p><b>Captain's Mode</b>- Two players, one from each team (blue for radiant, pink for dire), take turns banning and picking Heroes for their team. Banning a hero removes it from the pool, making it unavailable to pick for either team. This is the usual mode for organized and competitive games.
	</p><p><b>Single Draft</b>- Each player selects a Hero from a set of three heroes randomly chosen for them (1 of each Strength, Agility, Intelligence).
	</p><p><b>Random Draft</b> - Players take turns selecting a Hero from a shared pool of 20 random heroes.
	</p><p><b>All Random</b> - Players are automatically assigned a random hero. A player can repick once to get a new random hero.
	</p><p><b>Mid Only</b> - Players can pick any hero, even the same as other players. Creeps only spawn in the middle lane. This mode is great for 1v1 matchups and game modes such as Pudge Wars.
	</p><p><b>Least Played</b> - Players choose from a list of their least played heroes. This mode is great for learning new heroes since everyone will be on equal footing. The pool limits each player's heroes, by blocking their 40 most player heroes. <a href="http://blog.dota2.com/" class="external autonumber" rel="nofollow">[1]</a>
	</p><p><a href="http://blog.dota2.com/" class="external autonumber" rel="nofollow">[2]</a><b>Random Ability Draft:</b><span style="font-family: &#39;Helvetica Neue&#39;, Helvetica, Arial, sans-serif;">When Account Levels reach 11, players can play games where everyone takes turns drafting random abilities. Initial hero models are randomly assigned.</span>
	<br />
	<br />
	<iframe width="580" height="335" src="//www.youtube.com/embed/-cSFPIwMEq4" frameborder="0" allowfullscreen></iframe>
	<iframe width="580" height="335" src="//www.youtube.com/embed/R-RKqGaNq-Y" frameborder="0" allowfullscreen></iframe>
	</p><p><b>Diretide</b>- All heroes are picked in the same manner as All Pick. However, the game objective is to collect more taffy in your bucket than the enemy team. Greevil Taffy is dropped by smaller models of <a href="creeps" title="Roshan">Roshan</a>, and decrease Hero HP by 7% while held. They can be stolen from the enemy bucket and drop upon Hero death. Throughout the later stages of the game, Roshan roams the map, demanding candy or he will attack. During the Sugar Rush final stage, Roshan becomes a defeatable boss with unique abilities and a massive amount of health. This mode was added in for Halloween 2012 and again for Winter Holidays 2013 and is no longer playable. Most recipes can be acquired through this mode.
	</p>
	<p class="wiki-videoEmbed"><iframe width="480" height="270" src="//www.youtube.com/embed/zEPMEv6Ghjo" frameborder="0" allowfullscreen></iframe></p>
	<p><b>Greeviling</b> - All heroes are picked in the same manner as All Pick. However, before each game, each player can also choose a Greevil courier to transform into. Greevils have unique abilities and stats, along with a separate health bar which regenerates when the Greevil form is benched. Naked Greevils with random abilities are assigned if a player does not have a Greevil. During the game, Mega-Greevils spawn in camps around the map. Players must defeat these greedy Greevils for presents containing items. The first to reach 11 Greevil camps kills wins the game. This mode was added in for Winter Holidays 2012 and is no longer playable.
	</p><p><iframe width="480" height="270" src="//www.youtube.com/embed/NKCS2No2xPs" frameborder="0" allowfullscreen></iframe>
	</p><p><b>Wraith Night</b> - Certain heroes are picked at the start of the match. 5 Players defend the Wraith King's throne from themed waves of monsters. During the game gold is collected by protecting towers and killing enemies. The final three waves consist of defeating the Wraith King, a powerful boss. This mode was added in for Winter Holidays 2013 and is no longer playable.
	</p>
      <!-- FOOTER -->
      <footer>
        <p class="pull-right"><a href="#">Back to top</a></p>
        <p>&copy; 2014</p>
      </footer>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <script src="../../assets/js/docs.min.js"></script>
  </body>
</html>
