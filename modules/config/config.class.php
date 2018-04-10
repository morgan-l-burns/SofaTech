<?php

class config {

	
	
	/////////////////////////////// LIVE SETTINGS ////////////////////////////////////
	
	// live database details i.e db1, www1, www2, www3 
	
	var $live_database_dbHost = 'db1539.oneandone.co.uk';
    var $live_database_dbUser = 'dbo250627975';
    var $live_database_dbPass = 'hR5uFWWS';
    var $live_database_dbName = 'db250627975';
	
	////////////////////////////////////////////////////////////////////////////////////
	
	
	
	/////////////////////////////// TST SETTINGS ////////////////////////////////////
	
	// tst site database details
	
	var $tst_database_dbHost = 'db1539.oneandone.co.uk';
    var $tst_database_dbUser = 'dbo250627975';
    var $tst_database_dbPass = 'zX7NUesTMazNZZeR';
    var $tst_database_dbName = 'hR5uFWWS';
	
	
	////////////////////////////////////////////////////////////////////////////////////
	
	
	
	///////////////////////////// DEV SETTINGS ////////////////////////////////////
	
	// dev site database details
	
	var $dev_database_dbHost = 'db1539.oneandone.co.uk';
    var $dev_database_dbUser = 'dbo250627975';
    var $dev_database_dbPass = 'zX7NUesTMazNZZeR';
    var $dev_database_dbName = 'hR5uFWWS';

	////////////////////////////////////////////////////////////////////////////////////
	
	
	var $pagination = 20;
	
	function config() {
		$this->setLivePlatformVars();
		if ($_SERVER['HTTP_HOST'] == 'www.sofa-tech.com') {
			$this->googleMapKey 	= 'ABQIAAAAU2JjzZGVyxxE7vZTsdFB1xSSwRPPsIoQEd-zoKGLyrdZf6rgiRQ5AmiMu8TJ3qrYSG3Yp9XdBqP54g';
			$this->googleMapAjaxKey = 'ABQIAAAAU2JjzZGVyxxE7vZTsdFB1xSSwRPPsIoQEd-zoKGLyrdZf6rgiRQ5AmiMu8TJ3qrYSG3Yp9XdBqP54g';
		}
		else {
			$this->googleMapKey 	= 'ABQIAAAAU2JjzZGVyxxE7vZTsdFB1xS44Wkx6vI5QhapLotb-a1GRYgMPBQdJ5wSF-5QINKzowQ-KZp_fanzXw';
			$this->googleMapAjaxKey = 'ABQIAAAAU2JjzZGVyxxE7vZTsdFB1xS44Wkx6vI5QhapLotb-a1GRYgMPBQdJ5wSF-5QINKzowQ-KZp_fanzXw';
		}
	}
	
	
	
	
	
	
	function setTestPlatformVars() {
		$this->targetSiteURL = "http://ori2115-tst.titled.co.uk/";
	}
	
	
	
	function setDevPlatformVars() {
		$this->targetSiteURL = "http://ori2115-dev.titled.co.uk/";
	}
	
	
	
	function setLivePlatformVars() {
		$this->database_dbHost = $this->live_database_dbHost;
		$this->database_dbUser = $this->live_database_dbUser;
		$this->database_dbPass = $this->live_database_dbPass;
		$this->database_dbName = $this->live_database_dbName;
	}
	

}

?>
