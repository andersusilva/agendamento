<?php

  class conn
  {
      public $user = 'root';

      public $pass = 'root';

      public $host = 'localhost';

      public $base = 'agendamento';

      public $consulta = '';

      public $link = '';

      public function conn()
      {
          $this->Conecta();
      }

      public function Conecta()
      {
          $this->link = mysql_connect($this->host, $this->user, $this->pass);

          if (!$this->link) {
              die('Problema na Conexão com o base de Dados');
          } elseif (!mysql_select_db($this->base, $this->link)) {
              die('Problema na Conexão com o base de Dados');
          }
      }

      public function Desconecta()
      {
          return mysql_close($this->link);
      }

      public function Consulta($consulta)
      {
          $this->consulta = $consulta;

          if ($resultado = mysql_query($this->consulta, $this->link)) {
              return $resultado;
          } else {
              return 0;
          }
      }
  }
