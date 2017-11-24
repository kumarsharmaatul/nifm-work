<?php
include_once 'includes/master.php';
$base_url='http://www.nifm.in';
define('MENU_SEPARATOR','/');
define('SUB_MENU_SEPRATOR','-');
function post_slug($str){
	$str	=	trim($str);
	$str	=	str_replace("'", '', $str);
	$str	=	str_replace('!', '', $str);
	$str	=	str_replace(':', '', $str);
	$str	=	str_replace('#', '', $str);
	$str	=	str_replace('.', '-', $str);
	$str	=	str_replace(' - ', '-' , $str);
	$str	=	str_replace(' & ', '-' , $str);
	$str	=	str_replace(' / ', '-' , $str);
	$str	=	str_replace('/', '-' , $str);
	$str	=	str_replace(', ', '-' , $str);
	$str	=	str_replace(',', '-' , $str);
	$str	=	str_replace(' (', '-', $str);
	$str	=	str_replace(') ', '-', $str);
	$str	=	str_replace('  ', '-' , $str);
	$str	=	str_replace(' ', '-' , $str);
	$str	=	str_replace('(', '-', $str);
	$str	=	str_replace(')', '', $str);
	$str	=	str_replace("’", '', $str);
	$str	=	str_replace("•", '', $str);
	$str	=	str_replace("?", '', $str);
	$str	=	str_replace('"', '', $str);
	return strtolower($str);
}
$HeadOfficeDropDown = new Master();
$HeadOfficeDropDown=$HeadOfficeDropDown->getAllData("tbl_contact", "title, email", "where status=1", "ORDER BY index_id");



$HeadOfficeDropDownPopup = new Master();
$HeadOfficeDropDownPopup=$HeadOfficeDropDownPopup->getAllData("tbl_contact", "title, description, Contact, email, website, map", "where status=1");



/* $title			=	"what is your name"; 
$title_id		=	"101";
$validUrl		=	changeToValidURL($title); // valid title in query string with dash
$urlPath		=	$validUrl."-".$title_id; */
/*****************************************************************/
$get_string				=	$urlPath;
$url_name_query_string	=	substr($get_string,0,strrpos($get_string,'-'));		// getting title through query string
$id_query_string		=	(int)substr($get_string,strrpos($get_string,'-')+1); // getting title id through query string
//$id=$row['id'];
//$url="detail".MENU_SEPARATOR.post_slug($row["menu"]).SUB_MENU_SEPRATOR.$id;

$Meta = new Master();
$Meta=$Meta->getAllData("tbl_all_page_meta", "id, title, meta_title, meta_keyword, meta_description", "where status='1' AND id = '2'", "limit 0,1");
$data = mysql_fetch_array($Meta);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title><?php echo trim($data['meta_title']); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<meta name="Description" content="<?php echo trim($data['meta_description']); ?>"/>
	<meta name="Keywords" content="<?php echo trim($data['meta_keyword']); ?>"/>

	<!--meta name="theme-color" content="#039" /-->
	<?php /*?><link href="<?php echo $base_url;?>/nifm.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo $base_url;?>/menu2.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="<?php echo $base_url;?>/css/layout.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo $base_url;?>/css/style.css" /><?php */?>
    
    <script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
	ga('create', 'UA-42793479-1', 'nifm.in');
	ga('send', 'pageview');
</script>
<script type="text/javascript">
	var _gaq = _gaq || [];
	_gaq.push(['_setAccount', 'UA-28012003-1']);
	_gaq.push(['_trackPageview']);
	(function() {
		var ga = document.createElement('script');
		ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	})();
</script>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-69473697-1', 'auto');
  ga('send', 'pageview');

</script>
    
<!-- Google Code for Remarketing Tag -->
<!--------------------------------------------------
Remarketing tags may not be associated with personally identifiable information or placed on pages related to sensitive categories. See more information and instructions on how to setup the tag on: http://google.com/ads/remarketingsetup
--------------------------------------------------->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 1006752061;
var google_custom_params = window.google_tag_params;
var google_remarketing_only = true;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/1006752061/?value=0&amp;guid=ON&amp;script=0"/>
</div>
</noscript>	
<script>(function(w,d,t,r,u){var f,n,i;w[u]=w[u]||[],f=function(){var o={ti:"5525736"};o.q=w[u],w[u]=new UET(o),w[u].push("pageLoad")},n=d.createElement(t),n.src=r,n.async=1,n.onload=n.onreadystatechange=function(){var s=this.readyState;s&&s!=="loaded"&&s!=="complete"||(f(),n.onload=n.onreadystatechange=null)},i=d.getElementsByTagName(t)[0],i.parentNode.insertBefore(n,i)})(window,document,"script","//bat.bing.com/bat.js","uetq");</script><noscript><img src="//bat.bing.com/action/0?ti=5525736&Ver=2" height="0" width="0" style="display:none; visibility: hidden;" /></noscript>
	
    <script src="<?php echo SITE_URL; ?>doubletaptogo.js"></script> 
	<script> 
		var C = $.noConflict();
		C( function(){
			C( '#nav li:has(ul)' ).doubleTapToGo();
		});
	</script>
	<script src="<?php echo SITE_URL; ?>jquery.min.js"></script>
    
    <style>
	#nav{
		background: #003399 none repeat scroll 0 0 !important;
		border: 1px solid #0033cc;
		box-shadow: 0 0 1px #edf9ff inset;
		font-family: Arial,Helvetica,sans-serif;
		line-height: 1;
		width: auto;
	}
	#nav ul ul h4 {
		background-color: #0051ba;
		border-bottom: 1px solid #666666;
		border-radius: 5px;
		color: #ffffff;
		font-size: 13px;
		font-weight: 400; margin:3px 7px;
		letter-spacing: 1px;
		margin: 10px 0;
		padding: 8px 10px;
	}
	#nav > a{display: none;}
	#nav li{position: relative;}
	#nav li a{color: #fff; padding:5px 10px;display: block;}
	#nav li a:active{background-color: #ccc !important;}
	/*#nav span:after{width: 0;height: 0;border-bottom: none;border-top-color: #efa585;content: '';vertical-align: middle;display: inline-block;position: relative;right: -0.313em;}*/
#nav > ul{height: 40px;margin:0px; padding:0px; list-style:none;}
#nav > ul > li{height: 100%;float: left;}
/* #nav > ul > li > a{font-size: 13px;height: 100%;line-height:33px; outline:none;padding:3px 19px;text-align: center;} */
#nav > ul > li > a{font-size: 13px;height: 100%;line-height:33px; outline:none;text-align: center;}
#nav > ul > li:not( :last-child ) > a{}
#nav > ul > li:hover > a,
#nav > ul:not( :hover ) > li.active > a
{
	background-color: #fff;-webkit-border-top-left-radius: 3px;
	-webkit-border-top-right-radius: 3px;
	-moz-border-radius-topleft: 3px;
	-moz-border-radius-topright: 3px;
	border-top-left-radius: 3px;
	border-top-right-radius: 3px; color:#000;
}
#nav li ul{
	background:#fff;
	display: none;
	position: absolute;-webkit-border-bottom-right-radius: 3px;
	-webkit-border-bottom-left-radius: 3px;
	-moz-border-radius-bottomright: 3px;
	-moz-border-radius-bottomleft: 3px;
	border-bottom-right-radius: 3px;
	border-bottom-left-radius: 3px;
	top: 100%; z-index:9999 !important; width:198px; margin:0px; padding:0px 10px; list-style:none;
}
/*#nav span::after {
	-moz-border-bottom-colors: none;
	-moz-border-left-colors: none;
	-moz-border-right-colors: none;
	-moz-border-top-colors: none;
	border-color: #fff transparent -moz-use-text-color;
	border-image: none;
	border-style: solid solid none;
	border-width: 0.313em 0.313em medium;
	content: "";
	display: inline-block;
	height: 0;
	position: relative;
	right: -0.313em;
	vertical-align: middle;
	width: 0;
}*/
#nav span:hover::after{ border-color: #000 transparent -moz-use-text-color;}
#nav li:hover ul{
	display: block;
	left: 0;
	right: 0;
}
#nav li:not( :first-child ):hover ul{left: -1px;}
#nav li ul a{
	background: #f4f4f4 none repeat scroll 0 0;
	border: 1px solid #bbbbbb;
	border-radius: 5px;
	color: #000;
	font-size: 12px;
	margin: 0 0 5px;
	padding: 5px 4px;
	text-decoration: none;
	transition: color 0.2s ease 0s;
	width: 186px;
}
#nav li ul li a:hover,
#nav li ul:not( :hover ) li.active a{
	background-color: #eaeaea;
}
@media only screen and ( max-width: 62.5em ) /* 1000 */
{
<style>
	#nav{
		width: 100%;
		position: static;
		margin: 0; 	background: #003399 none repeat scroll 0 0 !important;
		border: 1px solid #F4F4F4;
		box-shadow: 0 0 1px #edf9ff inset;
	}
}
@media only screen and ( max-width: 768px) /* 640 */
{
	#nav{position: relative;top: auto;left: auto;}
	
	#nav ul ul h4 {
		background-color: #0051ba;
		border-bottom: 1px solid #666666;
		border-radius: 5px;
		color: #ffffff;
		font-size: 13px;
		font-weight: 400; 
		letter-spacing: 1px;
		margin:0px 0 5px 0;
		padding: 8px 10px;
	}
	#nav li ul a{
	background: #f4f4f4 none repeat scroll 0 0;
	border: 1px solid #bbbbbb;
	border-radius: 5px;
	color: #000;
	font-size: 12px;
	margin: 0 0 5px;
	padding: 5px 4px;
	text-decoration: none;
	transition: color 0.2s ease 0s;
	width: 100%;
}
	
	#nav > a{width: 3.125em;height: 3.125em;text-align: left;text-indent: -9999px;position: relative;}
	#nav > a:before,#nav > a:after{position: absolute;background-image: url(img-nav.jpg);border: 2px solid #fff;top: 35%;left: 25%;right: 25%;content: '';}
	#nav > a:after{top: 60%;}
	#nav:not( :target ) > a:first-of-type,#nav:target > a:last-of-type{display: block;}
	#nav > ul{height: auto; background:#717171;display: none;left: 0; margin:0px; padding:0px; list-style:none;right: 0;}
	#nav:target > ul{display: block;}
	#nav > ul > li{width: 100%;float: none;}
	#nav > ul > li > a{height: auto;text-align: left; color:#FFF;padding: 0 0.833em;}
	#nav > ul > li:not( :last-child ) > a{border-right: none;border-bottom: 1px solid #FFF;}
	#nav li ul{
		position: static;
		padding: 1.25em;
		padding-top: 0; width:auto;
	}
}
</style>
    
    
    
	<link href="<?php echo SITE_URL; ?>css/NIFM_stylesheet.css" type="text/css" rel="stylesheet">
	<link href="<?php echo SITE_URL; ?>css/responsivestyle.css" type="text/css" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo SITE_URL; ?>css/styles_res.css">
	<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
	<script src="<?php echo SITE_URL; ?>css/script.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo SITE_URL; ?>js/mootools.svn.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo SITE_URL; ?>js/lofslidernews.mt11.js"></script>
	<style>
		.advt{  border: 1px solid #eaeaea;
		background: #fff;
		margin: 12px 0;
		overflow: hidden;
		box-shadow: 0 0 5px #e9e9e9;
		}
		.advt img{ width:100%;}
	</style>
</head>
<body>
<!--main container starts here -->
<div id="main-container">
	<!--header section starts here -->
	<header id="header">
		<div class="logo">
			<div class="logoleft"><a href="index.php"><img src="<?php echo SITE_URL; ?>images/NIFM.jpg"></a></div>
			<div class="logoright"><a href="index.php"><img src="<?php echo SITE_URL; ?>images/nifm-logo.jpg"></a></div>
		</div>

		
		<div class="contact-right"> <img src="<?php echo SITE_URL; ?>images/phone-icon.png">
			<div class="landline"> 011-45646322<br>+91-9910300590 </div>
		</div>
		<div class="clear"></div>
        
        <div class="branch">
       <span>Branch Location :</span>
		<select name="ddl_centers" class="field55 mobiled" id="ddl_centers" defaulttext="Enter locality" onchange="location = this.options[this.selectedIndex].value;">
			&nbsp;
			<option value="" selected="selected">----Branch Location----</option>
			<?php
			while($HeadOfficeDropDown1=mysql_fetch_array($HeadOfficeDropDown))
			{	
			?>
			<option value="#<?php echo $HeadOfficeDropDown1['title'];?>"><?php echo $HeadOfficeDropDown1['title'];?></option>
			<?php
			}
			?>
			&nbsp;
		</select>
        
        </div>
        
	</header>
	<!--header section ends here -->
	<div class="clear"></div>
	<!--nav area starts here -->
    
    
    <nav id="nav" role="navigation">
		<a href="#nav" title="Show navigation">Show navigation</a>
		<a href="#" title="Hide navigation">Hide navigation</a>
        
        <span class="menu-fullview" style="float: left; color: rgb(255, 255, 255); position: relative; margin-top: -25px; margin-left:50px;">
        <a href="#nav" style="color:#fff; text-decoration:none;">MENU</a></span>
        
        
		<ul class="clearfix">
			<li><a href="<?php echo SITE_URL; ?>">Home</a></li>
			<li><a aria-haspopup="true"><span>About Us</span></a>
				<ul>
					<h4>About NIFM</h4>
					<li><a href="<?php echo SITE_URL; ?>institute-stock-market-course.php">About Us</a></li>
					<li><a href="<?php echo SITE_URL; ?>chairman-message.php" >Chairman's Message</a></li>
					<li><a href="<?php echo SITE_URL; ?>vision-mission.php" >Vision &amp; Mission</a></li>
					<li><a href="<?php echo SITE_URL; ?>reason-to-choose-nifm.php" >Reasons To Choose NIFM</a></li>
					<li><a href="<?php echo SITE_URL; ?>testimonials.php" >Testimonials</a></li>
					<li><a href="<?php echo SITE_URL; ?>milestones.php" >Mile Stones</a></li>
					<li><a href="<?php echo SITE_URL; ?>social-responsibilities.php" >Social Responsibilities</a></li>
					<li><a href="<?php echo SITE_URL; ?>infrastructure.php" >Infrastructure</a></li>
					<li><a href="<?php echo SITE_URL; ?>advisory-board.php" >NIFM Advisory Board</a></li>
					<li><a href="<?php echo SITE_URL; ?>event-at-nifm.php" >Event@NIFM</a></li>
					<li><a href="<?php echo SITE_URL; ?>preferred-employer.php" >Student Placement Tie-ups</a></li>
					<li><a href="<?php echo SITE_URL; ?>nifm-placement-history.php" >NIFM Placement History</a></li>
					<li><a href="<?php echo SITE_URL; ?>present-openings.php" >JOB Opening for NIFM Students</a></li>
					<li><a href="<?php echo SITE_URL; ?>present-openings-in-nifm.php" >JOB Opening in NIFM</a></li>
				</ul>
			</li>
			<li><a href="<?php echo SITE_URL; ?>courses-certification.php">Class Room Courses</a></li>
			<li><a href="http://www.onlinenifm.com/" target="_blank">Online Courses</a></li>
			<li><a href="<?php echo SITE_URL; ?>mock-test.php">Mock Test</a></li>   
			<li><a aria-haspopup="true"><span>Products & Services</span></a>
				<ul>
					<h4>NIFM Products & Services</h4>
					<li><a href="<?php echo SITE_URL; ?>institutional-training.php">Corporate Training</a></li>
					<li><a href="<?php echo SITE_URL; ?>retail-training.php" >Retail Training</a></li>
					<li><a href="<?php echo SITE_URL; ?>e-test.php" >E-Test</a></li>
					<li><a href="<?php echo SITE_URL; ?>courses-certification.php">Class Room Training</a></li>
					<li><a href="http://www.onlinenifm.com/" target="_blank">Online Training</a></li>
					<li><a href="mock-test.php">Mock Test</a></li>
					<li><a target="_blank" href="http://www.nifmresearch.com/">Research House</a></li>
					<li><a target="_blank" href="<?php echo SITE_URL; ?>demat-account.php">Open Demat Account</a></li>
				</ul>
			</li>
			<li><a aria-haspopup><span>Franchisee</span></a>
				<ul>
					<h4>NIFM Franchisee</h4>
					<li><a href="<?php echo SITE_URL; ?>franchisee-process.php" >Franchisee Process</a></li>
					<li><a href="<?php echo SITE_URL; ?>franchisee-support.php" >Franchisee Support</a></li>
					<li><a href="<?php echo SITE_URL; ?>franchisee-network.php" >Franchise Network</a></li>
					<li><a href="<?php echo SITE_URL; ?>franchisee-benefits.php" >Career/Benefits As Franchisee</a></li>
					<li><a href="<?php echo SITE_URL; ?>franchisee-registration-form.php" >Franchisee Registration Form</a></li>
					<li><a href="<?php echo SITE_URL; ?>fees-submission-modes.php" >Fees Submission</a></li>
					<li><a href="<?php echo SITE_URL; ?>faq.php" >Franchisee FAQ's</a></li>
				</ul>
			</li>
			<li><a><span>Admission</span></a>
				<ul>
					<h4>NIFM Admission</h4>
					<li><a href="<?php echo SITE_URL; ?>career-stock-share-financial-market.php" >Career Opportunities in Banking & Financial Market Industry</a></li>
					<li><a href="<?php echo SITE_URL; ?>admission-procedure-nifm.php" >Admission Procedure</a></li>
					<li><a href="<?php echo SITE_URL; ?>eligibility.php" >Eligibility</a></li>
					<li><a href="<?php echo SITE_URL; ?>rules-regulation-nifm.php" >Rules &amp; Regulation</a></li>
					<li><a href="<?php echo SITE_URL; ?>nifm-certification.php" >Certification</a></li>
					<li><a href="<?php echo SITE_URL; ?>fees-submission-modes.php" >Fees Submission</a></li>
					<li><a href="<?php echo SITE_URL; ?>download.php" >Download Books & Form</a></li>
					<li><a href="<?php echo SITE_URL; ?>admission-form-nifm.php" >Admission Form</a></li>
					<li><a href="<?php echo SITE_URL; ?>student-faq.php" >Student FAQ's</a></li>
				</ul>
			</li>
			<li><a><span>Contact Us</span></a>
				<ul style="">
					<!--h4>Feedback/FAQ's</h4-->
					<h4>NIFM Contact Details</h4>
					<li><a href="<?php echo SITE_URL; ?>contact-stock-share-market-institute-delhi-nifm.php" >Contact Us</a></li>
					<li><a href="<?php echo SITE_URL; ?>feedback-form.php" >Feedback Form</a></li>
				</ul>
			</li>
			<li><div class="freetrail" id="freetrail"> <a class="freetraila " href="http://www.nifmresearch.com/" target="_blank" style="color: black;">Research Tips</a> </div></li>
		</ul>
	</nav>
    
    
    
    
    
	<?php /*?><nav>
		<div id='cssmenu'>
			<ul>
				<li><a href='index.php'>Home</a></li>
				<li class='active'><a href='#'>About Us</a>
					<ul>
						<h4>About NIFM</h4>
						<li><a href="<?php echo SITE_URL;?>chairman-message.php" >Chairman's Message</a></li>
						<li><a href="<?php echo SITE_URL;?>vision-mission.php" >Vision &amp; Mission</a></li>
						<li><a href="<?php echo SITE_URL;?>reason-to-choose-nifm.php" >Reasons To Choose NIFM</a></li>
						<li><a href="<?php echo SITE_URL;?>testimonials.php" >Testimonials</a></li>
						<li><a href="<?php echo SITE_URL;?>milestones.php" >Mile Stones</a></li>
						<li><a href="<?php echo SITE_URL;?>social-responsibilities.php" >Social Responsibilities</a></li>
						<li><a href="<?php echo SITE_URL;?>infrastructure.php" >Infrastructure</a></li>
						<li><a href="<?php echo SITE_URL;?>advisory-board.php" >NIFM Advisory Board</a></li>
						<li><a href="<?php echo SITE_URL;?>nifm-placement-history.php" >NIFM Placement History</a></li>
					</ul>
				</li>
				<li><a href="<?php echo SITE_URL;?>courses-certification.php">Courses &amp; Certification</a></li>
				<li><a href="http://www.onlinenifm.com/">E-Learning</a></li>
				<li><a href="<?php echo SITE_URL;?>mock-test.php">Mock Test</a></li>
				<li><a target="_blank" class="drop" href="#">Products & Services</a>
					<ul>
						<h4>NIFM Products & Services</h4>
						<li><a href="<?php echo SITE_URL;?>institutional-training.php" >Institutional Training</a></li>
						<li><a href="<?php echo SITE_URL;?>retail-training.php" >Retail Training</a></li>
						<li><a href="<?php echo SITE_URL;?>e-test.php" >E-Test</a></li>
						<li><a target="_blank" href="http://www.nifmresearch.com/">Research Tips</a></li>
					</ul>
				</li>
				<li><a href="#">Franchisee</a>
					<ul>
						<h4>NIFM Franchisee</h4>
						<li><a href="<?php echo SITE_URL;?>franchisee-process.php" >Franchisee Process</a></li>
						<li><a href="<?php echo SITE_URL;?>franchisee-support.php" >Franchisee Support</a></li>
						<li><a href="<?php echo SITE_URL;?>franchisee-network.php" >Franchise Network</a></li>
						<li><a href="<?php echo SITE_URL;?>franchisee-benefits.php" >Career/Benefits As Franchisee</a></li>
						<li><a href="<?php echo SITE_URL;?>franchisee-registration-form.php" >Franchisee Registration Form</a></li>
					</ul>
				</li>
				<li><a href="">Admission</a>
					<ul>
						<h4>NIFM Admission</h4>
						<li><a href="<?php echo SITE_URL;?>admission-procedure-nifm.php" >Admission Procedure</a></li>
						<li><a href="<?php echo SITE_URL;?>eligibility.php" >Eligibility</a></li>
						<li><a href="<?php echo SITE_URL;?>rules-regulation-nifm.php" >Rules &amp; Regulation</a></li>
						<li><a href="<?php echo SITE_URL;?>nifm-certification.php" >Certification</a></li>
						<li><a href="<?php echo SITE_URL;?>fees-submission-modes.php" >Fees Submission</a></li>
						<li><a href="<?php echo SITE_URL;?>download.php" >Download Books & Form</a></li>
						<li><a href="<?php echo SITE_URL;?>admission-form-nifm.php" >Admission Form</a></li>
					</ul>
				</li>
				<li><a href="#">Contact Us</a>
					<ul style=" display:block;">
						<h4>Feedback/FAQ's</h4>
						<li><a href="<?php echo SITE_URL;?>contact-stock-share-market-institute-delhi-nifm.php" >Contact Us</a></li>
						<li><a href="<?php echo SITE_URL;?>feedback-form.php" >Feedback Form</a></li>
						<li><a href="<?php echo SITE_URL;?>faq.php" >FAQ's</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</nav><?php */?>
	<!--nav area ends here -->
	<div class="clear"></div>
	<!--slider area starts here -->
	<div id="container" class="mobileSliderHide">
        <div id="lofslidecontent45" class="lof-slidecontent lof-descleft">
			<!-- MAIN CONTENT -->
			<div class="lof-main-wapper">
				<?php
				$sliderpd = new Master();
				$sliderpd=$sliderpd->getAllData("slider", "id,title,mini_desc,image,description,left_discription,url,cpage", "where status=1");
				while($sliderpddata = mysql_fetch_array($sliderpd)){
				echo $sliderpddata['$image'];
				?>
				<?php 
				//$slidurl=SITE_URL.$sliderpddata['id'].MENU_SEPARATOR.post_slug($sliderpddata["title"]).".php"; 
				if($sliderpddata['id']!=""){
				$slidurl=SITE_URL.$sliderpddata['id'].MENU_SEPARATOR.post_slug($sliderpddata["title"]).".php";
				}else{
				$slidurl=$base_url.MENU_SEPARATOR.post_slug($sliderpddata["title"]).".php";	
				}
			?>
				<div class="lof-main-item"> <img src="<?php echo SITE_URL;?>admin/includes/slider/<?php echo $sliderpddata['image'];?>" title="<?php echo $sliderpddata['title'];?>" alt="title="<?php echo $sliderpddata['title'];?>" height="300" width="900">
					
					<?php
					if($sliderpddata['left_discription']=='1'){
					?>
					<div class="lof-main-item-desc">
						<h3><a  title="<?php echo $sliderpddata['title'];?>" href="<?php if($sliderpddata['url']=='' && $sliderpddata['cpage']==0){echo "";}elseif($sliderpdmdata['url']){echo $sliderpdmdata['url'];}else{ echo $slidurl;}?>" style="font-size:14px;"><?php echo $sliderpddata['title'];?></a></h3>
						<p>
						<?php
							$slider_description = $sliderpddata['description'];
							echo $slider_description = substr(strip_tags(trim($slider_description)), 0, 500);
							//$description = $row['description'];
						?>
						</p>
						<div class="clear"></div>
						<a href="<?php if($sliderpddata['url']=='' && $sliderpddata['cpage']==0){echo "";}elseif($sliderpddata['url']){echo $sliderpddata['url'];}else{ echo $slidurl;}?>" class="added">READ MORE</a>  
					</div>
					<?php } ?>
				</div>
				<?php
				}
				?>
				<div class="lof-navigator-outer" style="height:280px !important">
					<ul class="lof-navigator">
						<?php
						$sliderpdm = new Master();
						$sliderpdm=$sliderpdm->getAllData("slider", "id,title,mini_desc,image,description,url,cpage", "where status=1");
						while($sliderpdmdata = mysql_fetch_array($sliderpdm)){
						?>
						<?php 
						//$slidurl=SITE_URL.$sliderpdmdata['id'].MENU_SEPARATOR.post_slug($sliderpdmdata["title"]).".php"; 
						if($sliderpdmdata['id']!=""){
							$slidurl=SITE_URL."post/".$sliderpdmdata['id'].MENU_SEPARATOR.post_slug($sliderpdmdata["title"]).".php";	
						}else{
							$slidurl=$base_url.MENU_SEPARATOR.post_slug($sliderpdmdata["title"]).".php";	
						}
						
						//$slidurl=$base_url.MENU_SEPARATOR.post_slug($sliderpdmdata["title"]).".php"; 
						?>
						<li>
							<div> 
								<a href="<?php if($sliderpdmdata['url']=='' && $sliderpdmdata['cpage']==0){echo "";}elseif($sliderpdmdata['url']){echo $sliderpdmdata['url'];}else{ echo $slidurl;}?>">
									<img src="<?php echo SITE_URL;?>admin/includes/slider/<?php echo $sliderpdmdata['image'];?>" />
									<h3><?php echo $sliderpdmdata['title'];?> </h3>
								</a>
								<p>
								<?php
								$sliderpdmdata = $sliderpdmdata['mini_desc'];
								echo $sliderpdmdata = substr(strip_tags(trim($sliderpdmdata)), 0, 150);
								?>
								</p>
									
								
							</div>
						</li>
						<?php
						}
						?>
						<!--<a class="added" href="<?php echo SITE_URL; ?>free-seminar-stock-market.php">READ MORE</a>-->
					</ul>
				</div>
			</div>
			<script type="text/javascript">
				var _lofmain =  $('lofslidecontent45');
				var _lofscmain = _lofmain.getElement('.lof-main-wapper');
				var _lofnavigator = _lofmain.getElement('.lof-navigator-outer .lof-navigator');
				var object = new LofFlashContent( _lofscmain, 
				_lofnavigator,
				_lofmain.getElement('.lof-navigator-outer'),
				{
					fxObject:{ transition:Fx.Transitions.Quad.easeInOut,  duration:800},
						interval:6000,
						direction:'opacity'
				} 
				).start( true, _lofmain.getElement('.preload') );
			</script> 
		</div>
	</div>
	<!--slider area ends here -->
	<link href="<?php echo SITE_URL; ?>popup/css/demo.css" rel="stylesheet">

	<!-- Modal Styles -->
	<link href="<?php echo SITE_URL; ?>popup/css/modal.css" rel="stylesheet">
	
	<!--div class="container">
		<h2>CSS3 Modal</h2>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		<p><a href="#modal" class="btn go">Activate Modal</a></p>
	</div-->
	<?php
			while($HeadOfficeDropDownPopup1=mysql_fetch_array($HeadOfficeDropDownPopup))
			{	
			?>
	<div id="<?php echo $HeadOfficeDropDownPopup1['title'];?>" class="modal">
		<div class="modal-content">
			<div class="header">
				<a href="" class="btn">Close</a>
				<h2><?php echo $HeadOfficeDropDownPopup1['title'];?></h2>
				
			</div>
			<div class="copy">
				<p> <strong>Address: </strong><?php echo strip_tags(trim($HeadOfficeDropDownPopup1['description']));?></p><br/>
				<p><strong>Contact Number: </strong><?php echo strip_tags(trim($HeadOfficeDropDownPopup1['Contact']));?></p><br/>
				<p><strong>E-mail: </strong><?php echo strip_tags(trim($HeadOfficeDropDownPopup1['email']));?></p><br/>
				<p><strong>Website: </strong><?php echo strip_tags(trim($HeadOfficeDropDownPopup1['website']));?></p>
			</div>
			
			<div class="copy">
				<?php echo $HeadOfficeDropDownPopup1['map'];?>
			</div>
			<div class="cf footer">
				<a href="" class="btn">Close</a>
			</div>
		</div>
		<div class="overlay"></div>
	</div>
			<?php } ?>
			
			
</body>
<style>
.freetrail:before {
    content: '';
    width: 100px;
    height: 100%;
    position: absolute;
    top: 16px;
    left: 4px;
    transform: skew(-45deg);
    background: #f1d432;
    transition: all .3s ease;
	
}

.freetrail a.freetraila {
    font-family: 'Roboto', sans-serif;
    font-weight: 700;
    /* font-size: 1.125em; */
	font-size:11px;
    color: #171b20;
    margin-left: 14px;
    text-transform: uppercase;
    display: block;
    padding: 0 30px 0 17px;
    line-height: 65px;
    position: relative;
    z-index: 10;
    transition: all .3s ease;
	padding: 1px 10px;
	margin-top: -17px;
	
}

.freetrail {
   /*  background: #F6BB19; */
    position: relative;
    margin-right: -22px;
    transition: all .3s ease;
}

#freetrail {
    display: none;
}

@media screen and (min-width: 768px) {
    #freetrail {
        clear: both;
        display: block;
        
    }
}


.mobileSliderHide {
    display: none;
}

@media screen and (min-width: 768px) {
    .mobileSliderHide {
        clear: both;
        display: block;
        
    }
}

</style>
</html>
