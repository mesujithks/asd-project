<?php 
	require("utils.php"); 
	$disp="w3-hide";
	if(getStatus()!="complete") $disp="w3-show";
?>

<ol class="breadcrumb w3-card-2">
                <li class="breadcrumb-item"><a href="index.php">Home</a> <i class="fa fa-angle-right"></i> Dashboard</li>
            </ol>
<!--four-grids here-->
<div class="w3-panel w3-display-container w3-card-2 w3-round w3-blue <?php echo $disp; ?>">
  <span onclick="this.parentElement.style.display='none'"
  class="w3-button w3-display-topright">X</span>
  <h2>Incomplete Profile</h2>
  <p>Your profile is incomplete..! <a class="w3-text-white" href="index.php?page=verify"><strong>Click Here</strong></a> to complete your profile.</p>
</div>
		<div class="w3-row">
			<div class="w3-third">
			<div class="w3-card-4 four" style="width:92%;max-width:500px;">
				<a href="index.php?page=my-course">
				<div class="four-agileinfo w3-orange">
					<div class="icon">
						<i class="glyphicon glyphicon-list" aria-hidden="true"></i>
					</div>
					<div class="four-text">
						<h3>My Courses</h3>
						<h4><?php echo $mycnt; ?></h4>

					</div>
				</a>
				</div>
			</div><br />
			</div> 
			<div class="w3-third">
					<div class="w3-card-4 four" style="width:92%;max-width:500px;">
                        <a href="index.php?page=faculty">
						<div class="four-agileinfo">
							<div class="icon">
								<i class="glyphicon glyphicon-user" aria-hidden="true"></i>
							</div>
							<div class="four-text">
								<h3>Faculties</h3>
								<h4><?php echo $fcnt; ?></h4>

							</div>
						</a>
						</div>
					</div><br />
			</div> 
			<div class="w3-third">
					<div class="w3-card-4 four" style="width:92%;max-width:500px;">
                    <a href="index.php?page=course">
						<div class="four-w3ls">
							<div class="icon">
								<i class="glyphicon glyphicon-folder-open" aria-hidden="true"></i>
							</div>
							<div class="four-text">
								<h3>Courses</h3>
								<h4><?php echo $crscnt; ?></h4>
								
							</div>
							</a>
						</div>
					</div>
			</div> 
					<div class="clearfix"></div>
		</div>
		<div class="w3-row"><br />
				<div class="w3-third">
					<div class="w3-card-4 four" style="width:92%;max-width:500px;">
                        <a href="index.php?page=exam">
						<div class="four-agileits w3-brown">
							<div class="icon">
							<i class="glyphicon glyphicon-calendar" aria-hidden="true"></i>
							</div>
							<div class="four-text">
								<h3>Exams</h3>
								<h4><?php echo $exmcnt; ?></h4>
								
							</div>
							</a>
						</div>
					</div><br />
				</div> 
				<div class="w3-third">
					<div class="w3-card-4 four" style="width:92%;max-width:500px;">
                        <a href="index.php?page=discussion">
						<div class="four-agileinfo w3-pink">
							<div class="icon">
								<i class="glyphicon glyphicon-bullhorn" aria-hidden="true"></i>
							</div>
							<div class="four-text">
								<h3>Discussion Forum</h3>
								<h4><?php echo $dfcnt; ?></h4>

							</div>
							</a>
						</div>
					</div><br />
				</div>
				<div class="w3-third">
					<div class="w3-card-4 four" style="width:92%;max-width:500px;">
                     <a href="index.php?page=chat">
						<div class="four-agileinfo w3-teal">
							<div class="icon">
								<i class="glyphicon glyphicon-comment" aria-hidden="true"></i>
							</div>
							<div class="four-text">
								<h3>Chats</h3>
								<h4><?php echo $chtcnt; ?></h4>
								
							</div>
							</a>
						</div>
					</div><br />
				</div>
					<div class="clearfix"></div>
			</div>