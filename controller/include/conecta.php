<?php

  class conn

  {

	var $user = "root";

	var $pass = "root";

	var $host = "localhost";

	var $base = "agendamento";

	var $consulta = "";

	var $link = "";
	
	function conn()

  	{

  		$this->Conecta();

  	}

  	function Conecta()

  	{

  		$this->link = mysql_connect($this->host,$this->user,$this->pass);

  		if (!$this->link)

  		{

  			die("Problema na Conexão com o base de Dados");

  		}

  		elseif (!mysql_select_db($this->base,$this->link))

  		{

  			die("Problema na Conexão com o base de Dados");

  		}

  	}

function Desconecta()

  	{

  		return mysql_close($this->link);

  	}

function Consulta($consulta)

  	{

          	$this->consulta = $consulta;

  		if ($resultado = mysql_query($this->consulta,$this->link))

  		{

  			return $resultado;

		} else {

  			return 0;

				}

  	}

  }
  ?>