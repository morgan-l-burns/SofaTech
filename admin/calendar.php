<!-- START: ui.displayAdminHeaderHtml.php -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
	<title>Job Search Calendar</title>

	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<meta name="Classification" content="Web Design" />
	<meta name="Author" content="XWhyZ" />
	<meta name="keywords" content="" />
	<meta name="description" content="" />

	<!-- load static javascript -->
	<script src="js/imgs.js" type="text/javascript"></script>
	<script type="text/javascript" src="/assets/javascript/shared/prototype.js"></script>
	<script type="text/javascript" src="/assets/javascript/shared/effects.js"></script>
	<script type="text/javascript" src="/assets/javascript/shared/carousel.js"></script>

	<style type="text/css" media="screen">
		@import "/assets/css/admin/structure.css";
		@import "/assets/css/admin/calendar.css";
	</style>
	
	<script>
	
		function OpenCloseDiv(divId) {
			var style = $(divId).getStyle('display');
			switch (style) {
				case 'none':
					$(divId).style.display = 'block';
				break;
				case 'block':
					$(divId).style.display = 'none';
				break;
			}
			
		}
	
	</script>

	<link rel="Home Page" href="index.php" title="AccessKey: 1, Home Page" />
	<link rel="Accessibility Statement" href="accState.php" title="AccessKey: 0, Accessibility Statement" />
</head>
<!-- END: ui.displayAdminHeaderHtml.php -->

<body class="green" onLoad="preloadImages('')">

	<!-- begin main container -->
	<div id="mainContainerRed">

		
<!-- START: ui.displayAdminNavigationHtml.php -->
	<div id="bannerSub">
		<h1 class="s1"><!--<span class="sofaTechTitle">Sofa-Tech</span>--></h1>

		<div id="mainNav">
			<ul>

									<li><a href="/admin/users/logout/">Logout</a></li>
								<li><a href="/">Website</a></li>
				<li><a href="/admin/users/messages/">Messages</a></li>
									<li><a href="/admin/users/clientsearch/">Clients</a></li>
								<li><a href="/admin/customers/search/">Customers</a></li>
				<li><a href="/admin/jobs/search/" class="selected">Jobs</a></li>

							</ul>
		</div>
	</div>
<!-- END: ui.displayAdminNavigaionHtml.php -->
		<!-- START: ui.displayAdminStatusBarHtml.php -->
		<div id="statusBar">
							<p></p>
					</div>
<!-- END: ui.displayAdminStatusBarHtml.php -->
		<!-- START: ui.displayJobSubNavigationHtml.php -->

	<div id="subNav">
		<ul>
			<li><a href="/admin/jobs/jobsearch/">Search Jobs</a></li>
			<li><a href="/admin/jobs/jobadd/">Add Job</a></li>
			<!--<li><a href="/admin/users/clientedit/">Edit Job</a></li>-->
		</ul>

		<div class="hr"><hr /></div>

	</div> 
<!-- END: ui.displayJobSubNavigationHtml.php -->

<div id="jobCalendarOuter">
<h2>Job Visits Calendar <a href="#" onClick="OpenCloseDiv('calendar');">Open/Close</a></h2>

<div id="calendar">
	<ul id="months">
		<li><a href="#" rel="prev" class="carousel-control">&lt;</a></li>
		<li><a href="#" rel="slide-1" class="carousel-jumper">January 2008</a></li>
		<li><a href="#" rel="slide-2" class="carousel-jumper">Febuary</a></li>
		<li><a href="#" rel="slide-3" class="carousel-jumper">March</a></li>
		<li><a href="#" rel="slide-4" class="carousel-jumper">April</a></li>
		<li><a href="#" rel="slide-5" class="carousel-jumper">May</a></li>
		<li><a href="#" rel="slide-6" class="carousel-jumper">June</a></li>
		<li><a href="#" rel="slide-7" class="carousel-jumper">July</a></li>
		<li><a href="#" rel="slide-8" class="carousel-jumper">August</a></li>
		<li><a href="#" rel="slide-9" class="carousel-jumper">September</a></li>
		<li><a href="#" rel="slide-10" class="carousel-jumper">October</a></li>
		<li><a href="#" rel="slide-11" class="carousel-jumper">November</a></li>
		<li><a href="#" rel="slide-12" class="carousel-jumper">December</a></li>
		<li><a href="#" rel="next" class="carousel-control">&gt;</a></li>
	</ul>
	<div id="scroller">
		<div id="content">
			<div class="slide" id="slide-1">
				<div class="month">
					<span class="monthName"><a href="#" rel="prev" class="carousel-control">&lt;</a>&nbsp; January 2009 &nbsp;<a href="#" rel="next" class="carousel-control">&gt;</a></span>
					<table>
						<tr>
							<th>Su</th>
							<th>M</th>
							<th>Tu</th>
							<th>W</th>
							<th>Th</th>
							<th>F</th>
							<th>Sa</th>
						</tr>
						<tr>
							<td class="weekend dayCell">
								
							</td>
							<td class="weekday dayCell">
								
							</td>
							<td class="weekday dayCell">
								
							</td>
							<td class="weekday dayCell">
								
							</td>
							<td class="weekday dayCell">
								
							</td>
						
							<td class="weekday dayCell">
								
							</td>
							<td class="weekend dayCell">
								<table class="dayInfo">
									<tr><td class="day"><a href="">1</a></td></tr>
									<tr><td class="jobs">(1 Visits)</td></tr>
									
								</table>
							</td>
						</tr>
						<tr>
							<td class="weekend dayCell">
								<table class="dayInfo">
									<tr><td class="day"><a href="">2</a></td></tr>
									<tr><td class="jobs"><a href="">(0 Jobs)</a></td></tr>
								</table>
							</td>
							<td class="weekday dayCell">
								<table class="dayInfo">
									<tr><td class="day"><a href="">3</a></td></tr>
									<tr><td class="jobs"><a href="">(0 Jobs)</a></td></tr>
								</table>
							</td>
							<td class="weekday dayCell">
								<table class="dayInfo">
									<tr><td class="day"><a href="">4</a></td></tr>
									<tr><td class="jobs"><a href="">(5 Jobs)</a></td></tr>
								</table>
							</td>
							<td class="weekday dayCell">
								<table class="dayInfo">
									<tr><td class="day"><a href="">5</a></td></tr>
									<tr><td class="jobs"><a href="">(5 Jobs)</a></td></tr>
								</table>
							</td>
							<td class="weekday dayCell">
								<table class="dayInfo">
									<tr><td class="day"><a href="">6</a></td></tr>
									<tr><td class="jobs"><a href="">(5 Jobs)</a></td></tr>
								</table>
							</td>
							<td class="weekday dayCell">
								<table class="dayInfo">
									<tr><td class="day"><a href="">7</a></td></tr>
									<tr><td class="jobs"><a href="">(5 Jobs)</a></td></tr>
								</table>
							</td>
							<td class="weekend dayCell">
								<table class="dayInfo">
									<tr><td class="day"><a href="">8</a></td></tr>
									<tr><td class="jobs"><a href="">(5 Jobs)</a></td></tr>
								</table>
							</td>
						</tr>
						<tr>
							<td class="weekend dayCell">
								<table class="dayInfo">
									<tr><td class="day"><a href="">9</a></td></tr>
									<tr><td class="jobs"><a href="">(0 Jobs)</a></td></tr>
								</table>
							</td>
							<td class="weekday dayCell">
								<table class="dayInfo">
									<tr><td class="day"><a href="">10</a></td></tr>
									<tr><td class="jobs"><a href="">(0 Jobs)</a></td></tr>
								</table>
							</td>
							<td class="weekday dayCell">
								<table class="dayInfo">
									<tr><td class="day"><a href="">11</a></td></tr>
									<tr><td class="jobs"><a href="">(5 Jobs)</a></td></tr>
								</table>
							</td>
							<td class="weekday dayCell">
								<table class="dayInfo">
									<tr><td class="day"><a href="">12</a></td></tr>
									<tr><td class="jobs"><a href="">(5 Jobs)</a></td></tr>
								</table>
							</td>
							<td class="weekday dayCell">
								<table class="dayInfo">
									<tr><td class="day"><a href="">13</a></td></tr>
									<tr><td class="jobs"><a href="">(5 Jobs)</a></td></tr>
								</table>
							</td>
							<td class="weekday dayCell">
								<table class="dayInfo">
									<tr><td class="day"><a href="">14</a></td></tr>
									<tr><td class="jobs"><a href="">(5 Jobs)</a></td></tr>
								</table>
							</td>
							<td class="weekend dayCell">
								<table class="dayInfo">
									<tr><td class="day"><a href="">15</a></td></tr>
									<tr><td class="jobs"><a href="">(5 Jobs)</a></td></tr>
								</table>
							</td>
						</tr>
						<tr>
							<td class="weekend dayCell">
								<table class="dayInfo">
									<tr><td class="day"><a href="">16</a></td></tr>
									<tr><td class="jobs"><a href="">(0 Jobs)</a></td></tr>
								</table>
							</td>
							<td class="weekday dayCell">
								<table class="dayInfo">
									<tr><td class="day"><a href="">17</a></td></tr>
									<tr><td class="jobs"><a href="">(0 Jobs)</a></td></tr>
								</table>
							</td>
							<td class="weekday dayCell">
								<table class="dayInfo">
									<tr><td class="day"><a href="">18</a></td></tr>
									<tr><td class="jobs"><a href="">(5 Jobs)</a></td></tr>
								</table>
							</td>
							<td class="weekday dayCell">
								<table class="dayInfo">
									<tr><td class="day"><a href="">19</a></td></tr>
									<tr><td class="jobs"><a href="">(5 Jobs)</a></td></tr>
								</table>
							</td>
							<td class="weekday dayCell">
								<table class="dayInfo">
									<tr><td class="day"><a href="">20</a></td></tr>
									<tr><td class="jobs"><a href="">(5 Jobs)</a></td></tr>
								</table>
							</td>
							<td class="weekday dayCell">
								<table class="dayInfo">
									<tr><td class="day"><a href="">21</a></td></tr>
									<tr><td class="jobs"><a href="">(5 Jobs)</a></td></tr>
								</table>
							</td>
							<td class="weekend dayCell">
								<table class="dayInfo">
									<tr><td class="day"><a href="">22</a></td></tr>
									<tr><td class="jobs"><a href="">(5 Jobs)</a></td></tr>
								</table>
							</td>
						</tr>
						
						<tr>
							<td class="weekend dayCell">
								<table class="dayInfo">
									<tr><td class="day"><a href="">23</a></td></tr>
									<tr><td class="jobs"><a href="">(0 Jobs)</a></td></tr>
								</table>
							</td>
							<td class="weekday dayCell">
								<table class="dayInfo">
									<tr><td class="day"><a href="">24</a></td></tr>
									<tr><td class="jobs"><a href="">(0 Jobs)</a></td></tr>
								</table>
							</td>
							<td class="weekday dayCell">
								<table class="dayInfo">
									<tr><td class="day"><a href="">25</a></td></tr>
									<tr><td class="jobs"><a href="">(5 Jobs)</a></td></tr>
								</table>
							</td>
							<td class="weekday dayCell">
								<table class="dayInfo">
									<tr><td class="day"><a href="">26</a></td></tr>
									<tr><td class="jobs"><a href="">(5 Jobs)</a></td></tr>
								</table>
							</td>
							<td class="weekday dayCell">
								<table class="dayInfo">
									<tr><td class="day"><a href="">27</a></td></tr>
									<tr><td class="jobs"><a href="">(5 Jobs)</a></td></tr>
								</table>
							</td>
							<td class="weekday dayCell">
								<table class="dayInfo">
									<tr><td class="day"><a href="">28</a></td></tr>
									<tr><td class="jobs"><a href="">(5 Jobs)</a></td></tr>
								</table>
							</td>
							<td class="weekend dayCell">
								<table class="dayInfo">
									<tr><td class="day"><a href="">29</a></td></tr>
									<tr><td class="jobs"><a href="">(5 Jobs)</a></td></tr>
								</table>
							</td>
						</tr>
						<tr>
							<td class="weekend dayCell">
								<table class="dayInfo">
									<tr><td class="day"><a href="">30</a></td></tr>
									<tr><td class="jobs"><a href="">(0 Jobs)</a></td></tr>
								</table>
							</td>
							<td class="weekday dayCell">
								<table class="dayInfo">
									<tr><td class="day"><a href="">32</a></td></tr>
									<tr><td class="jobs"><a href="">(0 Jobs)</a></td></tr>
								</table>
							</td>
							<td class="weekday dayCell">
								
							</td>
							<td class="weekday dayCell">
								
							</td>
							<td class="weekday dayCell">
								
							</td>
							<td class="weekday dayCell">
								
							</td>
							<td class="weekend dayCell">
								
							</td>
						</tr>
					</table>
				</div>
			
			</div>
			
			
			
			
			
			
			<div class="slide" id="slide-2">
				<div class="month">
					<span class="monthName"><a href="#" rel="prev" class="carousel-control">&lt;</a>&nbsp; Febuary 2009 &nbsp;<a href="#" rel="next" class="carousel-control">&gt;</a></span>
					<table>
						<tr>
							<th>Su</th>
							<th>M</th>
							<th>Tu</th>
							<th>W</th>
							<th>Th</th>
							<th>F</th>
							<th>Sa</th>
						</tr>
						<tr>
							<td class="weekend dayCell">
								
							</td>
							<td class="weekday dayCell">
								
							</td>
							<td class="weekday dayCell">
								
							</td>
							<td class="weekday dayCell">
								
							</td>
							<td class="weekday dayCell">
								
							</td>
						
							<td class="weekday dayCell">
								
							</td>
							<td class="weekend dayCell">
								<table class="dayInfo">
									<tr><td class="day"><a href="">1</a></td></tr>
									<tr><td class="jobs">(1 Jobs)</td></tr>
									
								</table>
							</td>
						</tr>
						<tr>
							<td class="weekend dayCell">
								<table class="dayInfo">
									<tr><td class="day"><a href="">2</a></td></tr>
									<tr><td class="jobs"><a href="">(0 Jobs)</a></td></tr>
								</table>
							</td>
							<td class="weekday dayCell">
								<table class="dayInfo">
									<tr><td class="day"><a href="">3</a></td></tr>
									<tr><td class="jobs"><a href="">(0 Jobs)</a></td></tr>
								</table>
							</td>
							<td class="weekday dayCell">
								<table class="dayInfo">
									<tr><td class="day"><a href="">4</a></td></tr>
									<tr><td class="jobs"><a href="">(5 Jobs)</a></td></tr>
								</table>
							</td>
							<td class="weekday dayCell">
								<table class="dayInfo">
									<tr><td class="day"><a href="">5</a></td></tr>
									<tr><td class="jobs"><a href="">(5 Jobs)</a></td></tr>
								</table>
							</td>
							<td class="weekday dayCell">
								<table class="dayInfo">
									<tr><td class="day"><a href="">6</a></td></tr>
									<tr><td class="jobs"><a href="">(5 Jobs)</a></td></tr>
								</table>
							</td>
							<td class="weekday dayCell">
								<table class="dayInfo">
									<tr><td class="day"><a href="">7</a></td></tr>
									<tr><td class="jobs"><a href="">(5 Jobs)</a></td></tr>
								</table>
							</td>
							<td class="weekend dayCell">
								<table class="dayInfo">
									<tr><td class="day"><a href="">8</a></td></tr>
									<tr><td class="jobs"><a href="">(5 Jobs)</a></td></tr>
								</table>
							</td>
						</tr>
						<tr>
							<td class="weekend dayCell">
								<table class="dayInfo">
									<tr><td class="day"><a href="">9</a></td></tr>
									<tr><td class="jobs"><a href="">(0 Jobs)</a></td></tr>
								</table>
							</td>
							<td class="weekday dayCell">
								<table class="dayInfo">
									<tr><td class="day"><a href="">10</a></td></tr>
									<tr><td class="jobs"><a href="">(0 Jobs)</a></td></tr>
								</table>
							</td>
							<td class="weekday dayCell">
								<table class="dayInfo">
									<tr><td class="day"><a href="">11</a></td></tr>
									<tr><td class="jobs"><a href="">(5 Jobs)</a></td></tr>
								</table>
							</td>
							<td class="weekday dayCell">
								<table class="dayInfo">
									<tr><td class="day"><a href="">12</a></td></tr>
									<tr><td class="jobs"><a href="">(5 Jobs)</a></td></tr>
								</table>
							</td>
							<td class="weekday dayCell">
								<table class="dayInfo">
									<tr><td class="day"><a href="">13</a></td></tr>
									<tr><td class="jobs"><a href="">(5 Jobs)</a></td></tr>
								</table>
							</td>
							<td class="weekday dayCell">
								<table class="dayInfo">
									<tr><td class="day"><a href="">14</a></td></tr>
									<tr><td class="jobs"><a href="">(5 Jobs)</a></td></tr>
								</table>
							</td>
							<td class="weekend dayCell">
								<table class="dayInfo">
									<tr><td class="day"><a href="">15</a></td></tr>
									<tr><td class="jobs"><a href="">(5 Jobs)</a></td></tr>
								</table>
							</td>
						</tr>
						<tr>
							<td class="weekend dayCell">
								<table class="dayInfo">
									<tr><td class="day"><a href="">16</a></td></tr>
									<tr><td class="jobs"><a href="">(0 Jobs)</a></td></tr>
								</table>
							</td>
							<td class="weekday dayCell">
								<table class="dayInfo">
									<tr><td class="day"><a href="">17</a></td></tr>
									<tr><td class="jobs"><a href="">(0 Jobs)</a></td></tr>
								</table>
							</td>
							<td class="weekday dayCell">
								<table class="dayInfo">
									<tr><td class="day"><a href="">18</a></td></tr>
									<tr><td class="jobs"><a href="">(5 Jobs)</a></td></tr>
								</table>
							</td>
							<td class="weekday dayCell">
								<table class="dayInfo">
									<tr><td class="day"><a href="">19</a></td></tr>
									<tr><td class="jobs"><a href="">(5 Jobs)</a></td></tr>
								</table>
							</td>
							<td class="weekday dayCell">
								<table class="dayInfo">
									<tr><td class="day"><a href="">20</a></td></tr>
									<tr><td class="jobs"><a href="">(5 Jobs)</a></td></tr>
								</table>
							</td>
							<td class="weekday dayCell">
								<table class="dayInfo">
									<tr><td class="day"><a href="">21</a></td></tr>
									<tr><td class="jobs"><a href="">(5 Jobs)</a></td></tr>
								</table>
							</td>
							<td class="weekend dayCell">
								<table class="dayInfo">
									<tr><td class="day"><a href="">22</a></td></tr>
									<tr><td class="jobs"><a href="">(5 Jobs)</a></td></tr>
								</table>
							</td>
						</tr>
						
						<tr>
							<td class="weekend dayCell">
								<table class="dayInfo">
									<tr><td class="day"><a href="">23</a></td></tr>
									<tr><td class="jobs"><a href="">(0 Jobs)</a></td></tr>
								</table>
							</td>
							<td class="weekday dayCell">
								<table class="dayInfo">
									<tr><td class="day"><a href="">24</a></td></tr>
									<tr><td class="jobs"><a href="">(0 Jobs)</a></td></tr>
								</table>
							</td>
							<td class="weekday dayCell">
								<table class="dayInfo">
									<tr><td class="day"><a href="">25</a></td></tr>
									<tr><td class="jobs"><a href="">(5 Jobs)</a></td></tr>
								</table>
							</td>
							<td class="weekday dayCell">
								<table class="dayInfo">
									<tr><td class="day"><a href="">26</a></td></tr>
									<tr><td class="jobs"><a href="">(5 Jobs)</a></td></tr>
								</table>
							</td>
							<td class="weekday dayCell">
								<table class="dayInfo">
									<tr><td class="day"><a href="">27</a></td></tr>
									<tr><td class="jobs"><a href="">(5 Jobs)</a></td></tr>
								</table>
							</td>
							<td class="weekday dayCell">
								<table class="dayInfo">
									<tr><td class="day"><a href="">28</a></td></tr>
									<tr><td class="jobs"><a href="">(5 Jobs)</a></td></tr>
								</table>
							</td>
							<td class="weekend dayCell">
								<table class="dayInfo">
									<tr><td class="day"><a href="">29</a></td></tr>
									<tr><td class="jobs"><a href="">(5 Jobs)</a></td></tr>
								</table>
							</td>
						</tr>
						<tr>
							<td class="weekend dayCell">
								<table class="dayInfo">
									<tr><td class="day"><a href="">30</a></td></tr>
									<tr><td class="jobs"><a href="">(0 Jobs)</a></td></tr>
								</table>
							</td>
							<td class="weekday dayCell">
								<table class="dayInfo">
									<tr><td class="day"><a href="">32</a></td></tr>
									<tr><td class="jobs"><a href="">(0 Jobs)</a></td></tr>
								</table>
							</td>
							<td class="weekday dayCell">
								
							</td>
							<td class="weekday dayCell">
								
							</td>
							<td class="weekday dayCell">
								
							</td>
							<td class="weekday dayCell">
								
							</td>
							<td class="weekend dayCell">
								
							</td>
						</tr>
					</table>
				</div>
			
			</div>
			<div class="slide" id="slide-3">March</div>
			<div class="slide" id="slide-4">April</div>
			<div class="slide" id="slide-5">May</div>
			<div class="slide" id="slide-6">June</div>
			<div class="slide" id="slide-7">July</div>
			<div class="slide" id="slide-8">August</div>
			<div class="slide" id="slide-9">September</div>
			<div class="slide" id="slide-10">October</div>
			<div class="slide" id="slide-11">November</div>
			<div class="slide" id="slide-12">December</div>
			
			
			
		</div>
	</div>
	<table id="changeVisitDetails">
		<tr>
			<td>Year From</td> 
			<td><select name="yearFrom">
					<option>2008</option>
					<option>2009</option>
					<option>2010</option>
				</select>
			</td>
			
			<td>Month From:</td>
			<td>	
				<select name="monthFrom">
					<option>January</option>
					<option>February</option>
					<option>March</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Year To</td>
			<td>
			 	<select name="yearFrom">
					<option>2008</option>
					<option>2009</option>
					<option>2010</option>
				</select>
			</td>
			<td>Month To:</td>
			<td>
				<select name="monthFrom">
					<option>January</option>
					<option>February</option>
					<option>March</option>
				</select>
			</td>
		</tr>
	</table>
	</div>
	
	
	
	<!-- <a href="#" rel="first" class="carousel-control">First slide</a>
	<a href="#" rel="prev" class="carousel-control">Previous slide</a>
	<a href="#" rel="next" class="carousel-control">Next slide</a>
	<a href="#" rel="last" class="carousel-control">Last slide</a>
	<a href="#" rel="toggle" class="carousel-control">Toggle slides</a> -->
	
	<script type="text/javascript">
			var carousel = new Carousel($('scroller'), $$('.slide'), $$('a.carousel-jumper', 'a.carousel-control'), {duration: 0.5, selectedClassName: 'selected'});
	</script>
</div>




		<!-- begin breadcrumbs -->
		<div id="breadCrumbs">
			<ul>
				<li>You are in:</li>
				<li><a href="#">Jobs</a> &raquo;</li>

				<li><a href="#">Search Jobs</a></li>
			</ul>
		</div>
		<!-- end breadcrumbs -->


		<!-- begin main contents -->
		<div id="mainContentCentre">

			<h2>Search Jobs</h2>
			

			<!-- begin product results -->
			<div id="prodResults">


				

				<form action="/admin/jobs/jobsearch/" method="post">
					<br/><h3>Filter Jobs List</h3>
										<table style="width: 700px; font-size: 12px; color: #333333; background-color: #CCCCCC; padding: 10px;">
													<tr>

								<td>Client</td>
								<td>
									<select name="jobClientId">
										<option value="" selected>All Clients</option>
																						<option value="3">3</option>
																						<option value="D">D</option>
																						<option value="d">d</option>

																						<option value="d">d</option>
																						<option value="c">c</option>
																						<option value="F">F</option>
																						<option value="d">d</option>
																						<option value="t">t</option>
																						<option value="" selected></option>

																						<option value="" selected></option>
																						<option value="n">n</option>
																			</select>
								</td>
							</tr>
												<tr>
							<td>Job Reference</td>
							<td><input name="jobReference" type="text" value="" /></td>

						</tr>
						<tr>
							<td>Date Entered</td>
							<td><input name="jobDateEntered" type="text" value="" /></td>
						</tr>
						<tr>
							<td>Date Created</td>
							<td><input name="jobDateCreated" type="text" value="" /></td>

						</tr>
						<tr>
							<td>Date Modified</td>
							<td><input name="jobDateModified" type="text" value="" /></td>
						</tr>
						<tr>
							<td>Created By</td>
							<td><input name="jobCreatedBy" type="text" value="" /></td>

						</tr>
						<tr>
							<td>Date Opened</td>
							<td><input name="jobDateOpened" type="text" value="" /></td>
						</tr>
						<tr>
							<td>Opened By</td>
							<td><input name="jobOpenedBy" type="text" value="" /></td>

						</tr>
						<tr>
							<td>Date Closed</td>
							<td><input name="jobDateClosed" type="text" value="" /></td>
						</tr>
						<tr>
							<td>Item Order Date</td>
							<td><input name="jobItemOrderDate" type="text" value="" /></td>

						</tr>
						<tr>
							<td>Item Delivery Date</td>
							<td><input name="jobItemDeliveryDate" type="text" value="" /></td>
						</tr>
						<tr>
							<td>Item Combination Id</td>
							<td><input name="jobItemCombinationId" type="text" value="" /></td>

						</tr>
						<tr>
							<td>Item Supplier</td>
							<td><input name="jobItemSupplier" type="text" value="" /></td>
						</tr>
						<tr>
							<td>Item Type</td>
							<td><input name="jobItemType" type="text" value="" /></td>

						</tr>
						<tr>
							<td>Item Model</td>
							<td><input name="jobItemModel" type="text" value="" /></td>
						</tr>
						<tr>
							<td>Item Colour</td>
							<td><input name="jobItemColour" type="text" value="" /></td>

						</tr>
						<tr>
							<td>Item Sample Required</td>
							<td><input name="jobItemSampleRequired" type="text" value="" /></td>
						</tr>
						<tr>
							<td>Item Customer Accepts Repair</td>
							<td><input name="jobItemCustomerAcceptsRepair" type="text" value="" /></td>

						</tr>
						<tr>
							<td>Item Photos Required</td>
							<td><input name="jobItemPhotosRequired" type="text" value="" /></td>
						</tr>
						<tr>
							<td>Item Replacement Required</td>
							<td><input name="jobItemReplacementRequired" type="text" value="" /></td>

						</tr>
						<tr>
							<td>Item Findings And Recommendations</td>
							<td><input name="jobItemFindingsAndRecommendations" type="text" value="" /></td>
						</tr>
						<tr>
							<td>Item Description And Damage Cause</td>
							<td><input name="jobItemDescriptionAndDamageCause" type="text" value="" /></td>

						</tr>
						<tr>
							<td>Quotation Price</td>
							<td><input name="jobQuotationPrice" type="text" value="" /></td>
						</tr>
						<tr>
							<td>Fault Class</td>
							<td><input name="jobFaultClass" type="text" value="" /></td>

						</tr>
						<tr>
							<td>Condition Class</td>
							<td><input name="jobConditionClass" type="text" value="" /></td>
						</tr>
						<tr>
							<td>Parts Required</td>
							<td><input name="jobPartsRequired" type="text" value="" /></td>

						</tr>
						<tr>
							<td>Batch Info</td>
							<td><input name="jobBatchInfo" type="text" value="" /></td>
						</tr>
						<tr>
							<td>Visit Outcome</td>
							<td><input name="jobVisitOutcome" type="text" value="" /></td>

						</tr>
						<tr>
							<td>Notes</td>
							<td><input name="jobNotes" type="text" value="" /></td>
						</tr>
						<tr>
							<td><input name="searchJobs" type="image" src="/images/buttonSearch.gif" alt="Job Search" /></td>
						</tr>

					</table>
				</form>
			
			
				<p class="message"><br />Fill in any of the fields above to filter the search results by that information.  If the search results are still too large, try filling in additional fields to further filter the results.</p>
				<p style="height:200px; width:700px;"></p>



			</div>
			<!-- end product results -->

		</div>
		<!-- end main contents -->


		<!-- START: ui.displayAdminFooterTextHtml.php -->
		<div id="footer">
			<!-- <p class="footerText">
				Copyright &copy; 2008 Sofa-Tech
				<span class="hide">[</span><a href="terms.php">Terms &amp; Conditions</a><span class="hide">]</span>
				<span class="hide">[</span><a href="privacy.php">Privacy Policy</a><span class="hide">]</span>
				<span class="hide">[</span><a href="#">Site Map</a><span class="hide">]</span>
			</p>
			<p class="footerLogo"><a href="http://www.xwhyz.co.uk" title="this site was designed and built by XWhyZ"><img src="images/ascLogo.gif" width="86" height="35" alt="ASC Media" /></a></p> -->
			<div class="hr"><hr /></div>
		</div>

<!-- END: ui.displayAdminFooterTextHtml.php -->
	</div>
	<!-- end main container -->


<!-- START: ui.displayAdminFooterHtml.php -->
</body>
</html>
<!-- END: ui.displayAdminFooterHtml.php -->
