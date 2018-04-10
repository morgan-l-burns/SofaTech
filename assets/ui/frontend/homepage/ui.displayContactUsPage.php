<?=$this->displayHeaderHtml('Contact Us','contactUs');?>

	<div id="outterContainer">
		<div id="topNavigationArea">
			<?=$this->displayTopNavigation('contact');?>
		</div>
		
		<div id="mainContentArea">
			<div id="topStrapLine" class="contactUsLeather">
			<span id="dateDisplay"><?= date("d F Y");?></span>
			</div>
			<div id="mainContent">
				<div id="mainContentInner">
					<div id="content">
						<!-- <h1>Contact Us</h1>  -->
						
						<div id="col1">
							<div id="col1Inner">
								<h1>Contact Us</h1><br />
								<p>To get in touch, simply use the email form on the right, send an email to the address below or pick up the phone and give us a call. We're happy to help.</p>
								
								<h2>Contact Details:</h2>
								
								Tel/Fax: 01455 286658<br />
								Monday to Thursday 9:00 to 17:30<br />
								and Friday 8:30 to 16:00<br />
								<a href="mailto:info@sofa-tech.co.uk">info@sofa-tech.co.uk</a><br /><br />
								<h2>Address</h2>
								
								<b>Sofa-Tech Ltd</b><br />
								18 Lea Close<br />
								Broughton Astley<br />
								Leicestershire<br />
								LE9 6NW<br />
								<!--  <img src="/assets/images/keyboard.jpg" id="arrive" alt="Contact Us" /> -->
							</div>

						</div>
						
						<form action="#" method="post" enctype="multipart/form-data">
						<div id="col2">
							<div id="col2Inner">
								<?php if (strlen($this->params['feedback'])) { ?>
								<div id="feedback"><?=$this->params['feedback'];?></div>
								<?php } ?>
								
								<?php if (strlen($this->params['error'])) { ?>
								<div id="error"><?=$this->params['error'];?></div>
								<?php } ?>
								<h1>Contact Us Online</h1><br />
	
								
									<p>If you would like to email us a question, suggestion or comment, please type your email address below and write your text in the box underneath. We will endeavour to answer your email as soon as possible.</p>
	
								<h3>Name * </h3>&nbsp;
								<input type="text" name="name" class="standardForm" value="<?=$this->params['name'];?>" />
								<h3>Postcode</h3>&nbsp;
								<input type="text" name="postcode" class="standardForm" value="<?=$this->params['postcode'];?>" />
								<h3>Telephone</h3>&nbsp;
								<input type="text" name="telephone" class="standardForm" value="<?=$this->params['telephone'];?>" />
								<h3>Email Address * </h3>&nbsp;
								<input type="text" name="email" class="standardForm" value="<?=$this->params['email'];?>" />
								<br />
											
								<h3>Query *</h3>&nbsp;
								<textarea cols="40" rows="8" name="message" id="message" class="standardForm" onkeyup="return taCount('message','400','myCounter')"><?=$this->params['message'];?></textarea><br />
								<span class="note">(Max 400 chars) Characters left : <b><span id="myCounter">400</span></b></span><br /><br />
								<h3>Send us pictures of your problem</h3>&nbsp;
								<p>If you wish to send us an image please make sure that it is a JPG and is no larger than 200k.</p>
								<h3>Image 1</h3>&nbsp;
								<input type="file" name="image1" class="standardForm" />
								<h3>Image 2</h3>&nbsp;
								<input type="file" name="image2" class="standardForm" />
								<br /><br />
								<input type="image" src="/frontendImages/buttons/contactUsSubmit.jpg" name="contactUs" value="contactUs" />
							</div> <!-- end col2inner -->
						</div> <!-- end col2 -->
						</form>
		
	
	
					</div> <!-- end content -->
				</div> <!-- end mainContentInner -->
				<!-- <script language="javascript">scrollControls('mainContentInner','content');</script> -->
			
			</div> <!-- end maincontent -->
			<div id="bottomStrapLine" class="contactUsLeather">
			<a href="/admin/users/login">PARTNERS > ></a>
			</div>
		</div>
		<div id="footer">
		</div>
	</div>

	<br />
	<p>
    <a href="http://validator.w3.org/check?uri=referer"><img
        src="http://www.w3.org/Icons/valid-xhtml10"
        alt="Valid XHTML 1.0 Strict" height="31" width="88" style="border:0px;"/></a>
  	</p>


<?=$this->displayFooterHtml();?>