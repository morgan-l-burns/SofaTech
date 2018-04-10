<?php

	class session {
	
	
		var $session_start = true;
		var $__ALL_MODULES;
		
		function session($__ALL_MODULES) {
			$this->__ALL_MODULES = $__ALL_MODULES;
			session_set_cookie_params(0);
			if ($this->session_start) {
				session_start();
			}
	
		}


  }
?>