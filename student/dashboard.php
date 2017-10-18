<?php require("utils.php"); ?>

<ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a> <i class="fa fa-angle-right"></i> Dashboard</li>
            </ol>
<!--four-grids here-->
		<div class="four-grids">
					<div class="col-md-4 four-grid">
                        <a href="student.php">
						<div class="four-agileits">
							<div class="icon">
								<i class="glyphicon glyphicon-user" aria-hidden="true"></i>
							</div>
							<div class="four-text">
								<h3>Students</h3>
								<h4><?php echo $scnt; ?></h4>
								
							</div>
							</a>
						</div>
					</div>
					<div class="col-md-4 four-grid">
                        <a href="faculty.php">
						<div class="four-agileinfo">
							<div class="icon">
								<i class="glyphicon glyphicon-user" aria-hidden="true"></i>
							</div>
							<div class="four-text">
								<h3>Faculties</h3>
								<h4><?php echo $fcnt; ?></h4>

							</div>
							
						</div>
					</div>
					<div class="col-md-4 four-grid">
                    <a href="course.php">
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
					<div class="clearfix"></div>
				</div>
				<div class="four-grids">
					<div class="col-md-4 four-grid">
                        <a href="exam.php">
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
					</div>
					<div class="col-md-4 four-grid">
                        <a href="disscussion.php">
						<div class="four-agileinfo w3-pink">
							<div class="icon">
								<i class="glyphicon glyphicon-bullhorn" aria-hidden="true"></i>
							</div>
							<div class="four-text">
								<h3>Disscussion Forum</h3>
								<h4><?php echo $dfcnt; ?></h4>

							</div>
							</a>
						</div>
					</div>

					<div class="col-md-4 four-grid">
                     <a href="chat.php">
						<div class="four-wthree  w3-teal">
							<div class="icon">
								<i class="glyphicon glyphicon-comment" aria-hidden="true"></i>
							</div>
							<div class="four-text">
								<h3>Chats</h3>
								<h4><?php echo $chtcnt; ?></h4>
								
							</div>
							</a>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>