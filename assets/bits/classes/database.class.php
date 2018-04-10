<?php

	Class database {

		var $dbHost;
		var $dbUser;
		var $dbPass;
		var $dbName;
		var $db_connect;
		var $selectdb;
		var $functions = array(
						   array('name'=>'Connect', 'purpose'=>'connects to database with config details', 'arguments'=>'none, uses config'),
						   array('name'=>'selectOne', 'purpose'=>'selects one line from database', 'arguments'=>'sql statement'),
						   array('name'=>'queryGeneral', 'purpose'=>'any general query', 'arguments'=>'sql statement'),
						   array('name'=>'selectMany', 'purpose'=>'uses mysql_fetch_array to bring all rows back', 'arguments'=>'sql statement'),
						   array('name'=>'insertOne', 'purpose'=>'used for inserting', 'arguments'=>'sql statement'),
						   array('name'=>'insertOneReturnId', 'purpose'=>'used for inserting and returning insert id', 'arguments'=>'sql statement'),
						   array('name'=>'updateOne', 'purpose'=>'used for updating', 'arguments'=>'sql statement'),
						   array('name'=>'closeConnection', 'purpose'=>'used for mysql_close statement', 'arguments'=>'none')
						  );

		function database() {
			$this->dbHost = 'db1539.oneandone.co.uk';
			$this->dbUser = 'dbo250627975';
			$this->dbPass = 'hR5uFWWS';
			$this->dbName = 'db250627975';
			$this->Connect();
		}

		function Connect() {
			if (strlen($this->dbName) > 0) {

				$this->db_connect = mysql_connect($this->dbHost, $this->dbUser, $this->dbPass) or die("Could not connect : ".mysql_error());
				$this->selectdb = mysql_select_db($this->dbName, $this->db_connect) or die("Could not select database : ".mysql_error() . " (" . $this->dbName . ")");
				$this->collation = mysql_query('SET NAMES utf8');

			} else {
				die( "No database name was supplied!" );
			}
		}

		function selectOne($sql) {
			$resource = mysql_query($sql, $this->db_connect) or die($this->showMySQLError($sql, mysql_error()));
			$details = mysql_fetch_array($resource, MYSQL_ASSOC);
			return($details);
		}

		// get a field value and return it directly into your variable instead of creating an array
		function selectField($sql) {
			$resource = mysql_query($sql, $this->db_connect) or die($this->showMySQLError($sql, mysql_error()));
			if(mysql_num_rows($resource)>0) $details = mysql_result($resource,0);
			return($details);
		}

		function queryGeneral($sql) {
			$flag = mysql_query($sql, $this->db_connect);// or die($this->showMySQLError($sql, mysql_error()));
			return($flag);
		}

		function selectMany($sql) {
			$resource = mysql_query($sql, $this->db_connect) or die($this->showMySQLError($sql, mysql_error()));
			while ($row =  mysql_fetch_array($resource, MYSQL_ASSOC)) {
				$details[] = $row;
			}
			return($details);
		}

		function insertOne($sql) {
			$result = mysql_query($sql, $this->db_connect) or die($this->showMySQLError($sql, mysql_error()));
			return($result);
		}

		function insertOneReturnId($sql) {
			$result1 = mysql_query($sql, $this->db_connect) or die($this->showMySQLError($sql, mysql_error()));
			$result2 = mysql_insert_id($this->db_connect);
			return(array_merge($result1,$result2));
		}

		function updateOne($sql) {
			$result = mysql_query($sql, $this->db_connect) or die($this->showMySQLError($sql, mysql_error()));
			return($result);
		}


		function closeConnection() {
			return(mysql_close($this->db_connect));
		}

		function deleteRow($sql) {
			$result = mysql_query($sql, $this->db_connect) or die($this->showMySQLError($sql, mysql_error()));
			return($result);
		}

		function showMySQLError($sql,$error) {

		?>
		<script language="javascript">
		function showHideBacktrace() {
		var bt = document.getElementById("mysqlBacktrace");
		if (bt.style.display=="inline") bt.style.display="none";
		else bt.style.display="inline";
		}
		</script>
		<div class="mysqlError">
		<strong>Error:</strong><?=$error;?>
		<p><strong>SQL: </strong><?=$sql;?></p>
		<p><a href="javascript:showHideBacktrace();">Show/hide backtrace</a></p>
		<div id="mysqlBacktrace" style="display:none;">
		<?=print_r(debug_backtrace());?>
		</div>
		</div>

		<?

		}


	} // end class



?>