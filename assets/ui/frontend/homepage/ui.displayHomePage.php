<?=$this->displayHeaderHtml('Home Page','home');?>

	<div id="outterContainer">
		<div id="topNavigationArea">
			<!-- <a href="#" id="logo" title="Sofa-Tech" alt="Sofa-Tech"></a> -->
			<?=$this->displayTopNavigation('home');?>
		</div> <!-- end topNavigationArea -->
		
		<div id="mainContentArea">
			<div id="topStrapLine" class="blackLeather">
				<span id="dateDisplay"><?= date("d F Y");?></span>
			</div>
			<div id="mainContent">
				<div id="mainContentInner">
					<div id="content">
						<h1 class="red" id="homepageHeading">Welcome to Sofa-Tech Ltd ‘The leather and furniture repair specialists’</h1>


						<div id="flashMovie">
						<!--  <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="367" height="275" title="What we can do">
							<param name="movie" value="/assets/flash/homepage.swf" />
							<param name="quality" value="high" />
							<embed src="/assets/flash/homepage.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="367" height="275"></embed>
						  </object> -->
						  
						  <object type="application/x-shockwave-flash" data="/assets/flash/homepage.swf" width="367" height="275">
			<param name="movie" value="/assets/flash/homepage.swf" />
			<param name="wmode" value="transparent" />
			<param name="menu" value="false" />
			&nbsp;
		</object>
						  
						</div>
						
						
						







						
						
						<div id="justify">
						
						<p>Sofa-Tech provides a swift and efficient on site leather, fabric and French Polishing repair service – professional and courteous service guaranteed.</p>
						
						
						<p>We are skilled craftsman with a positive attitude towards customer service.  Our main goals are to ensure client satisfaction upon repairs undertaken and to help avoid costly furniture replacement.</p>
						
						<p>We are an independently owned company specialising in all aspects of furniture repair and restoration for both commercial and domestic customers.  We repair scuffs, cigarette burns, stitching and tears.</p>
						
						<p>We also remove ink staining, adhesive and gum substances. Our expertise lies in colour matching and restoring your cherished furniture.</p>
						
						<p>Our Technicians always strive to complete all repairs on site, but for furniture that requires more complicated work then we have a fully equipped workshop which is able to accommodate this.</p>
						</div>
						
						<p style="clear:both;">Our company ethos:
						<span id="ethos" class="red">‘The solution to damaged furniture is our priority’.</span></p>

						<img src="/assets/images/blackSofa.jpg" alt="Relax with Sofa-Tech" id="relax" />
						<h2 class="red" id="whyChooseUsHeader">Why Choose Us?</h2>


						<ul id="whyChooseUsList">
							<li>Quality workmanship always</li>
							<li>Independent furniture Repair Company</li>
							<li>Home repairs specialist for commercial &amp; domestic customers</li>
							<li>Online system for retailers &amp; manufacturers</li>
							<li>Completion of all repairs on site is a priority</li>
							<li>Our technicians are uniformed &amp; fully insured</li>
							<li>We encourage and provide updated certified training for all of our staff</li>
						</ul><br />
						
						<p class="red italic">"The company that was asked to visit us and look at the problem – Sofa-Tech were extremely efficient and repaired the problem; I am pleased at the response.

Thank you."</p>
<p class="red">T. Fish
(Retailer appointed customer)
</p>
<div class="clear"></div>
<br /><br />
	
					</div> <!-- end content -->
				</div> <!-- end mainContentInner -->	
			</div> <!-- end mainContent -->
			<div id="bottomStrapLine" class="blackLeather">
				<a href="/admin/users/login">PARTNERS&nbsp;&gt;&gt;</a>
			</div>
		</div> <!-- end mainContentArea --> 
		<div id="footer"></div>
	</div> <!-- end outterContainer -->

	<p>
    <a href="http://validator.w3.org/check?uri=referer"><img
        src="http://www.w3.org/Icons/valid-xhtml10"
        alt="Valid XHTML 1.0 Strict" height="31" width="88" style="border:0px;"/></a>
  	</p>

<?=$this->displayFooterHtml();?>