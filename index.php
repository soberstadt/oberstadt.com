<head>

<!--
////////////////////////////////
//                            //
//  This code is property of  //
//  Oberstadt Landscapes      //
//  It was created            //
//  and maintained by         //
//  Spencer Oberstadt and     //
//  affiliates.               //
//                            //
//  Writen as part of the     //
//  current version 2.0       //
//                            //
////////////////////////////////
-->

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<?php
//sets $starttime to find runtime
$mtime = microtime();
$mtime = explode(' ', $mtime); 
$mtime = $mtime[1] + $mtime[0];
$starttime = $mtime;

if (isset($_GET['p']))
	$page = $_GET["p"];
else
	$page = "home";


// loads events xml
	$hoursAvail = false;
if(($page == "news" || $page == "home" || $page == "gardenCenter") && file_exists('events.xml'))
{
	if($eventsXML = @simplexml_load_file('events.xml'))
	$hoursAvail = true;
}

$pageArray = array(	
					"home" => array("Landscape Contractor In Appleton, WI", 'pages/home.inc'),
					"creatingYourLands" => array("Creating Your Perfect Landscape", 'pages/creatingYourLands.inc'),
					"contactUs" => array("Contact Us", 'pages/contactUs.inc'),
					"employment" => array("Employment", 'pages/employment.inc'),
					"e01" => array("Employment", 'pages/employment/e01.inc'),
					"e02" => array("Employment", 'pages/employment/e02.inc'),
					"e03" => array("Employment", 'pages/employment/e03.inc'),
					"workingFor" => array("Working for Oberstadt Landscapes", 'pages/workingFor.inc'),
					"services" => array("Services", 'pages/services.inc'),
					"landsDesign" => array("Landscape Design", 'pages/landsDesign.inc'),
					"lighting" => array("Outdoor Lighting", 'pages/lighting.inc'),
					"maint" => array("Landscape Maintenance", 'pages/maint.inc'),
					"programs" => array("Programs", 'pages/programs.inc'),
					"cleaning" => array("Spring/Fall Cleaning", 'pages/cleaning.inc'),
					"ourGardens" => array("Our Gallery and Gardens", 'pages/ourGardens.inc'),
					"gardenCenter" => array("Garden Center", 'pages/gardenCenter.inc'),
					"news" => array("News &amp; Events", 'pages/news.php'),
					"portfolio" => array("Portfolio", 'pages/portfolio.php'),
					"giftCards" => array("Gift Cards", 'pages/giftCards.inc'),
					"success" => array("Success", 'pages/success.inc'),
					"failure" => array("Failure", 'pages/failure.inc'),
					"404" => array("Page Not Found", 'pages/404.inc')
				   );

$redirectArray = array(
		"lands" => "landsDesign",
		"golc" => "gardenCenter"
		);

if(substr($page, -1) == "\\")
	$page = substr($page, 0, -1);
		
if(!isset($pageArray[$page]) || $pageArray[$page] == "")
{
	$refound;
	foreach ($pageArray as $key => $value) {
    	if (strcasecmp($key, $page) == 0)
    	{
    		$page = $key;
			$refound = true;
		}
	}
	if($refound != true)
	{
		if(isset($redirectArray[$page]))
			$page = $redirectArray[$page];
		else
		{
			mail("spencer@oberstadt.com, spencersshutter@hotmail.com", "Error: Redirected from ?p=$page", date('r'));
			//header("Location: ./?p=404");
			$page = "404";
		}
	}
}

echo "<title>Oberstadt Landscapes - ";
echo $pageArray[$page][0];
$scriptLoc = $pageArray[$page][1];

echo "</title>";
?>

<link href="pics/icon.ico" rel="shortcut icon" />
<link href="style/reset.css" rel="stylesheet" type="text/css" />
<link href="style/default.css" rel="stylesheet" type="text/css" />
<link href="style/dropdown.css" rel="stylesheet" type="text/css" />
	
<script src="js/swfobject.js" type="text/javascript" charset="utf-8"></script>

<script type="text/javascript">
	var flashvars = {};
	var params = {};
	params.menu = "false";
	params.scale = "noborder";
		var attributes = {id:"bea"};
	attributes.align = "left";
	swfobject.embedSWF("centerFlash.swf", "bodyPicture", "590", "520", "10.0.0", false, flashvars, params, attributes);
</script>

<?php

if($page == "none")
	echo "<meta name='description' content='From Readfield, Wisconsin comes Oberstadt Landscape. Our selection is unique. Our professional expertise is unparalleled. Our creativity is inspired.'>
<meta name='keywords' content='Appleton, Wisconsin, landscaping, Oberstadt, nursery, garden center, nightlighting, trees, shrubs,  patios, walkways, retaining walls, maintance, construction, holiday lighting '>
<meta name='robots' content='index,follow'>\n";

?>

<script type="text/javascript">

	// This is the google script
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-6831251-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
  
  
</script>

</head>

<body>

<div id="container">    
    <div id="header">
    
      <a href="./" id="logo"><img src="pics/oberstadt_logo.gif" alt="Oberstadt Landscapes Logo" border="0" /></a>
        
        <div id="nav">
            <?php include('includes/navUl.inc'); ?>
        </div>
    </div>

	<div id="content">
        
        <?php if($page != 'creatingYourLands' 
        			&& $page != 'portfolio' 
        			&& $page != 'e01'
        			&& $page != 'e02'
        			&& $page != 'e03')
		{
		?>
        <div id="bodyPicture"></div>
		<?php
		}
    	?>
        <div id="body" <?php if($page == 'creatingYourLands' 
        			|| $page == 'portfolio' 
        			|| $page == 'e01'
        			|| $page == 'e02'
        			|| $page == 'e03') echo "style='width: 100%; padding: 0 0 20px;'"; ?>>
        
        	<?php
			if(file_exists($scriptLoc))
			include($scriptLoc);
			?>
            
			
            <div id="footer">
                Oberstadt Landscapes<br />
                N352 County Road W<br />
                <a href="redirect.php?p=twitter" id="twitterIcon" class="socialMedia"><div></div></a>
                Fremont, WI 54940<br />
                (920) 667 - 4757
            </div>
        
        </div>
    </div>

</div>

<?php
	$mtime = microtime();
	$mtime = explode(" ", $mtime);
	$mtime = $mtime[1] + $mtime[0];
	$endtime = $mtime; 
	$totaltime = ($endtime - $starttime); 
	echo '<!--This page was created in ' .$totaltime. ' seconds.-->';
?>

</body>
</html>
