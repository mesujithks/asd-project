<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php 
	require("../connection.php");
	require("../auth.php");
	$query="SELECT * FROM `notification` WHERE user_to='1' AND status='active'";
	$result = mysqli_query($con,$query) or die(mysqli_error());
	$notifc=mysqli_num_rows($result);
    while($row=$result->fetch_assoc()){
		$notif_list.='
		<li><a href="index.php?page='.$row['page'].'">
				<div class="user_img"><img src="../images/avatar.png" alt=""></div>
				<div class="notification_desc">
					<p>'.$row['heading'].'</p>
					<p><span>'.$row['time'].'</span></p>
				</div>
				<div class="clearfix"></div>	
			</a>
		</li>';

	}

	function getName(){
		$fid=$_SESSION['user_id'];
		require('../connection.php');
		$query="SELECT * FROM `users` WHERE id=$fid";
        $result = mysqli_query($con,$query) or die(mysqli_error());
        $row=$result->fetch_assoc();
        return $row["name"];
	}
	
	function getAvatar(){
		$aid=$_SESSION['user_id'];
		require('../connection.php');
		$query="SELECT * FROM `users` WHERE id=$aid";
        $result = mysqli_query($con,$query) or die(mysqli_error());
        $row=$result->fetch_assoc();
        return $row["image"];
	}

	function getUserAvatar($id){
		require('../connection.php');
		$query="SELECT * FROM `users` WHERE id=$id";
        $result = mysqli_query($con,$query) or die(mysqli_error());
        $row=$result->fetch_assoc();
        return $row["image"];
	}

	function getCover($id){
		require('../connection.php');
		$query="SELECT * FROM `courses` WHERE courseId=$id";
		$result = mysqli_query($con,$query) or die(mysqli_error());
		if($result){
			$row=$result->fetch_assoc();
			return $row["courseImage"];
		}
        return "../images/default-c.jpg";
	}
	
	
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Admin Panel - Course Portal | Home</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="../css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<link href="../css/w3.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="../css/style.css" rel='stylesheet' type='text/css' />
<link href="../css/chat.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="../css/morris.css" type="text/css"/>
<!-- Graph CSS -->
<link href="../css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<script src="../js/jquery-2.1.4.min.js"></script>
<!-- //jQuery -->
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<!-- lined-icons -->
<link rel="stylesheet" href="../css/icon-font.min.css" type='text/css' />
<!-- //lined-icons -->
<style>
	.four i.glyphicon {
    color: #fff;
    font-size: 32px;
}
.four h3 {
    font-size: 20px;
    color: #fff;
    margin: 14px 0;
}
.four h4 {
    font-size: 30px;
    color: #fff;
    margin: 0;
}
.blak{color:#333333!important;background-color:#333333!important}
.prfil-pic {
    border-radius: 50%;
    border: 3px solid #fff;
    width: 100px;
    height: 100px;
}
</style>
</head> 
<body>
   <div class="page-container">
   <!--/content-inner-->
<div class="left-content">
	   <div class="mother-grid-inner">
             <!--header start here-->
				<div class="header-main">
					<div class="logo-w3-agile w3-pink w3-text-white w3-card-2">
								<img src="../images/logo.png" width="50px" height="50px"><b>  Course Portal</b>
							</div>
					<div class="w3layouts-left w3-card-2">
							
							<!--search-box-->
								<div class="w3-search-box w3-card-2">
								<form action="index.php?page=search" method="post">
								<input type="text" placeholder="Search..." name="name" required="">	
								<input type="submit" name="submit" value="">					
							</form>
								</div><!--//end-search-box-->
							<div class="clearfix"> </div>
						 </div>
						 <div class="w3layouts-right w3-card-2">
							<div class="profile_details_left "><!--notifications of menu start -->
								<ul class="nofitications-dropdown">
									<li class="dropdown head-dpdn">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-envelope"></i><span class="badge">0</span></a>
										<ul class="dropdown-menu">
											<li>
												<div class="notification_header">
													<h3>You have 0 new messages</h3>
												</div>
											</li>
											
										</ul>
									</li>
									<li class="dropdown head-dpdn">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-bell"></i><span class="badge blue"><?php echo $notifc; ?></span></a>
										<ul class="dropdown-menu">
											<li>
												<div class="notification_header">
													<h3>You have <?php echo $notifc; ?> new notification</h3>
												</div>
											</li>
											<?php echo $notif_list; ?>
											 <li>
												<div class="notification_bottom">
													<a href="index.php?page=notifications">See all notifications</a>
												</div> 
											</li>
										</ul>
									</li>	
									<li class="dropdown head-dpdn">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-tasks"></i><span class="badge blue1">0</span></a>
										<ul class="dropdown-menu">
											<li>
												<div class="notification_header">
													<h3>You have 0 pending task</h3>
												</div>
											</li>
											
										</ul>
									</li>	
									<div class="clearfix"> </div>
								</ul>
								<div class="clearfix"> </div>
							</div>
							<!--notification menu end -->
							
							<div class="clearfix"> </div>				
						</div>
						<div class="profile_details w3l w3-card-2">		
								<ul>
									<li class="dropdown profile_details_drop">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
											<div class="profile_img">	
												<span class="prfil-img"><img src="<?php echo getAvatar(); ?>" alt=""> </span> 
												<div class="user-name">
													<p><?php echo getName(); ?></p>
													<span>Admin</span>
												</div>
												<i class="fa fa-angle-down"></i>
												<i class="fa fa-angle-up"></i>
												<div class="clearfix"></div>	
											</div>	
										</a>
										<ul class="dropdown-menu drp-mnu">
											<li> <a href="index.php?page=profile-edit"><i class="fa fa-cog"></i> Settings</a> </li> 
										
											<li> <a href="../logout.php"><i class="fa fa-sign-out"></i> Logout</a> </li>
										</ul>
									</li>
								</ul>
							</div>
							
				     <div class="clearfix"> </div>	
				</div>
<!--heder end here-->
 <!-- container-->
 <?php 
		@$page=  $_GET['page'];
		  if($page!="")
		  {
			switch($page){
				case "course": include('course.php'); break;
				case "course-add":	include("course-add.php"); break;
				case "course-view":	include("course-view.php"); break;
				case "faculty":	include("faculty.php"); break;
				case "discussion":	include("discussion-forum.php"); break;
				case "forum":	include("forum.php"); break;
				case "profile-edit":	include("profile-edit.php"); break;
				case "faculty-request":	include("faculty-request.php"); break;
				case "faculty-course":	include("faculty-course.php"); break;
				case "student":	include("student.php"); break;
				case "view-student":	include("view-student.php"); break;
				case "view-faculty":	include("view-faculty.php"); break;
				case "search":	include("search.php"); break;
				case "message":	include("message.php"); break;
				case "chat":	include("chat.php"); break;	
				case "notice":	include("notice.php"); break;
				case "add-notice":	include("add-notice.php"); break;
				case "exam":	include("exam-home.php"); break;
				case "exam-question":	include("exam-question.php"); break;
				case "result":	include("result.php"); break;
				default : include("errorpage.php"); break;
			}
		  
		  }
		  else
		  {
		  include('dashboard.php');
		  }
		  ?>
		  <!-- container end-->
		   
<!--//four-grids here-->
<!--agileinfo-grap-->

	  <!--//w3-agileits-pane-->	
<!-- script-for sticky-nav -->
		<script>
		$(document).ready(function() {
			 var navoffeset=$(".header-main").offset().top;
			 $(window).scroll(function(){
				var scrollpos=$(window).scrollTop(); 
				if(scrollpos >=navoffeset){
					$(".header-main").addClass("fixed");
				}else{
					$(".header-main").removeClass("fixed");
				}
			 });
			 
		});
		</script>
		<!-- /script-for sticky-nav -->
<!--inner block start here-->
<div class="inner-block">

</div>
<!--inner block end here-->
<!--copy rights start here-->
<br />
<div class="copyrights w3-card-2 w3-row">
	 <p>© 2017 Course Portal. All Rights Reserved</p>
</div>	
<!--COPY rights end here-->
</div>
</div>
  <!--//content-inner-->
			<!--/sidebar-menu-->
				<div class="sidebar-menu">
					<header class="logo1">
						<a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> 
					</header>
						<div style="border-top:1px ridge rgba(255, 255, 255, 0.15)"></div>
                           <div class="menu">
									<ul id="menu" >
										<li><a href="index.php"><i class="fa fa-tachometer"></i> <span title="Dashboard">Dashboard</span><div class="clearfix"></div></a></li>
										  <li><a href="index.php?page=notice"><i class="fa fa-file-text" aria-hidden="true"></i><span title="Notice">Notice</span><div class="clearfix"></div></a></li>
										 <li><a href="index.php?page=faculty"><i class="fa fa-user" aria-hidden="true"></i><span title="Faculty">Faculty</span><div class="clearfix"></div></a></li>
										 <li><a href="index.php?page=student"><i class="fa fa-user" aria-hidden="true"></i><span title="Students">Students</span><div class="clearfix"></div></a></li>
										 <li><a href="index.php?page=course"><i class="fa fa-folder-open" aria-hidden="true"></i><span title="Courses">Courses</span><div class="clearfix"></div></a></li>
										 <li><a href="index.php?page=exam"><i class="fa fa-calendar" aria-hidden="true"></i><span title="Exams">Exams</span><div class="clearfix"></div></a></li>
										 <li><a href="index.php?page=discussion"><i class="fa fa-bullhorn" aria-hidden="true"></i><span title="Disscussion">Disscussion Forum</span><div class="clearfix"></div></a></li>
										 <li><a href="index.php?page=chat"><i class="fa fa-comment" aria-hidden="true"></i><span title="Chats">Chats</span><div class="clearfix"></div></a></li>
									
						
							        <li id="menu-academico" ><a href="#"><i class="fa fa-gear"></i>  <span>Account</span> <span class="fa fa-angle-right" style="float: right" title="Account"></span><div class="clearfix"></div></a>
										 <ul id="menu-academico-sub" >
											<li id="menu-academico-boletim" ><a href="index.php?page=profile-edit">Settings</a></li>
											<li id="menu-academico-avaliacoes" ><a href="../logout.php">Logout</a></li>
										  </ul>
									 </li>
				
								  </ul>
								</div>
							  </div>
							  <div class="clearfix"></div>		
							</div>
							<script>
							var toggle = true;
										
							$(".sidebar-icon").click(function() {                
							  if (toggle)
							  {
								$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
								$("#menu span").css({"position":"absolute"});
							  }
							  else
							  {
								$(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
								setTimeout(function() {
								  $("#menu span").css({"position":"relative"});
								}, 400);
							  }
											
											toggle = !toggle;
										});
							</script>
<!--js -->
<script src="../js/jquery.nicescroll.js"></script>
<script src="../js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
   <script src="../js/bootstrap.min.js"></script>
   <!-- /Bootstrap Core JavaScript -->	   
<!-- morris JavaScript -->	
<script src="../js/raphael-min.js"></script>
<script src="../js/morris.js"></script>
<script>
	$(document).ready(function() {
		//BOX BUTTON SHOW AND CLOSE
	   jQuery('.small-graph-box').hover(function() {
		  jQuery(this).find('.box-button').fadeIn('fast');
	   }, function() {
		  jQuery(this).find('.box-button').fadeOut('fast');
	   });
	   jQuery('.small-graph-box .box-close').click(function() {
		  jQuery(this).closest('.small-graph-box').fadeOut(200);
		  return false;
	   });
	   
	    //CHARTS
	    function gd(year, day, month) {
			return new Date(year, month - 1, day).getTime();
		}
		
		graphArea2 = Morris.Area({
			element: 'hero-area',
			padding: 10,
        behaveLikeLine: true,
        gridEnabled: false,
        gridLineColor: '#dddddd',
        axes: true,
        resize: true,
        smooth:true,
        pointSize: 0,
        lineWidth: 0,
        fillOpacity:0.85,
			data: [
				{period: '2014 Q1', iphone: 2668, ipad: null, itouch: 2649},
				{period: '2014 Q2', iphone: 15780, ipad: 13799, itouch: 12051},
				{period: '2014 Q3', iphone: 12920, ipad: 10975, itouch: 9910},
				{period: '2014 Q4', iphone: 8770, ipad: 6600, itouch: 6695},
				{period: '2015 Q1', iphone: 10820, ipad: 10924, itouch: 12300},
				{period: '2015 Q2', iphone: 9680, ipad: 9010, itouch: 7891},
				{period: '2015 Q3', iphone: 4830, ipad: 3805, itouch: 1598},
				{period: '2015 Q4', iphone: 15083, ipad: 8977, itouch: 5185},
				{period: '2016 Q1', iphone: 10697, ipad: 4470, itouch: 2038},
				{period: '2016 Q2', iphone: 8442, ipad: 5723, itouch: 1801}
			],
			lineColors:['#ff4a43','#a2d200','#22beef'],
			xkey: 'period',
            redraw: true,
            ykeys: ['iphone', 'ipad', 'itouch'],
            labels: ['All Visitors', 'Returning Visitors', 'Unique Visitors'],
			pointSize: 2,
			hideHover: 'auto',
			resize: true
		});
		
	   
	});
	</script>
</body>
</html>
