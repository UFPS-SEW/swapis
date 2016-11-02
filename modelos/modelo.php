<?php
  class conexion {
    var $bd;
    var $bdatos;
    function __construct($basedatos) {
      $this->bdatos = $basedatos;
    }
    function conectar() {
      $_lectura = fopen("bdconf.txt","r");
      $_campos = fread($_lectura,2048);
      fclose($_lectura);
      if ($lineas = explode("\n",$_campos)) {
        $_myhost = explode("=",$lineas[0]);
        $_myuser = explode("=",$lineas[1]);
        $_mypass = explode("=",$lineas[2]);
        $this->bd = mysqli_connect($_myhost[1], $_myuser[1], $_mypass[1], $this->bdatos);
      }
    }
    function desconectar() {
      mysqli_close($this->bd);
    }
  }
  class EnlacesDeInteres {
    function __construct() {
    }
    function obtenerEnlaces() {
      $_cadena = array();
      $_mbd = new conexion("ingsistemas");
      $_mbd->conectar();
      $_e = 1;
      if ($_mbd->bd) {
        $_sql = "SELECT etiqueta, urldestino, afuera FROM enlacesdeinteres WHERE activo = 1 ORDER BY orden";
        $_resultado = $_mbd->bd->query($_sql);
        if ($_resultado) {
          if ($_resultado->num_rows !== 0) {
            $_e = 0;
            while ($row = $_resultado->fetch_assoc()) {
              array_push($_cadena,array($row['urldestino'],$row['etiqueta'],$row['afuera']));
            }
          }
          $_resultado->free();
        }
        $_mbd->desconectar();
      }
      if ($_e == 1) {
        array_push($_cadena,array('javascript;','Error recuperando los enlaces r&aaute;pidos',0));
      }
      return $_cadena;
    }
  }
  class EnlacesFooter {
    function __construct() {
    }
    function obtenerEnlaces() {
      $_cadena = array();
      $_mbd = new conexion("ingsistemas");
      $_mbd->conectar();
      $_e = 1;
      if ($_mbd->bd) {
        $_sql = "SELECT imagen, urldestino, afuera FROM enlacesfooter WHERE activo = 1 ORDER BY orden";
        $_resultado = $_mbd->bd->query($_sql);
        if ($_resultado) {
          if ($_resultado->num_rows !== 0) {
            $_e = 0;
            while ($row = $_resultado->fetch_assoc()) {
              array_push($_cadena,array($row['urldestino'],$row['imagen'],$row['afuera']));
            }
          }
          $_resultado->free();
        }
        $_mbd->desconectar();
      }
      if ($_e == 1) {
        array_push($_cadena,'error');
      }
      return $_cadena;
    }
  }
  class textoFooter {
    function __construct() {
    }
    function obtenerTexto() {
      $_mbd = new conexion("ingsistemas");
      $_mbd->conectar();
      $_cadena = "Error obteniendo informaci&oacute;n de pie de p&aacute;gina.";
      if ($_mbd->bd) {
        $_sql = "SELECT TextoFooter FROM configuracion";
        $_resultado = $_mbd->bd->query($_sql);
        if ($_resultado) {
          if ($_resultado->num_rows !== 0) {
            $row = $_resultado->fetch_assoc();
            $_cadena = $row['TextoFooter'];
          }
          $_resultado->free();
        }
        $_mbd->desconectar();
      }
      return $_cadena;
    }
  }
  class Slides {
    function __construct() {
    }
    function obtenerSlides() {
      $_cadena = array();
      $_mbd = new conexion("ingsistemas");
      $_mbd->conectar();
      $_e = 1;
      if ($_mbd->bd) {
        $_sql = "SELECT titulo, texto, imagen, urldestino, afuera FROM slider WHERE activo = 1 ORDER BY orden";
        $_resultado = $_mbd->bd->query($_sql);
        if ($_resultado) {
          if ($_resultado->num_rows !== 0) {
            $_e = 0;
            while ($row = $_resultado->fetch_assoc()) {
              array_push($_cadena,array($row['titulo'],$row['texto'],$row['imagen'],$row['urldestino'],$row['afuera']));
            }
          }
          $_resultado->free();
        }
        $_mbd->desconectar();
      }
      if ($_e == 1) {
        array_push($_cadena,'error');
      }
      return $_cadena;
    }
  }
  class Menus {
    function __construct() {
    }
    function obtenerMenu() {
      $_cadena = array();
      $_mbd = new conexion("ingsistemas");
      $_mbd->conectar();
      $_e = 1;
      if ($_mbd->bd) {
        $_sql = "SELECT id, nivel, etiqueta, urldestino, afuera, conhijos FROM menus WHERE activo = 1 ORDER BY orden";
        $_resultado = $_mbd->bd->query($_sql);
        if ($_resultado) {
          if ($_resultado->num_rows !== 0) {
            $_e = 0;
            while ($row = $_resultado->fetch_assoc()) {
              array_push($_cadena,array($row['id'],$row['nivel'],$row['etiqueta'],$row['urldestino'],$row['afuera'],$row['conhijos']));
            }
          }
          $_resultado->free();
        }
        $_mbd->desconectar();
      }
      if ($_e == 1) {
        array_push($_cadena,'error');
      }
      return $_cadena;
    }
  }
  class Actividades {
    function __construct() {
    }
    function obtenerActividades($semana) {
      if ($semana == 0) {
        $_inicio = strtotime("now");
      } else {
        $_inicio = strtotime("+".$semana." week");
      }
      $_final = strtotime("+".($semana+1)." week");
      $_cadena = array();
      $_mbd = new conexion("ingsistemas");
      $_mbd->conectar();
      $_e = 1;
      if ($_mbd->bd) {
        $_sql = "SELECT fechainicial, fechafinal, horainicial, horafinal, descripcion, urldestino, afuera FROM actividades WHERE (fechainicial BETWEEN '".Date("Y-m-d",$_inicio)."' AND '".Date("Y-m-d",$_final)."' OR fechafinal BETWEEN '".Date("Y-m-d",$_inicio)."' AND '".Date("Y-m-d",$_final)."' OR fechainicial < '".Date("Y-m-d",$_inicio)."' AND fechafinal > '".Date("Y-m-d",$_final)."') AND activo = 1 ORDER BY fechainicial, fechafinal, horainicial, horafinal";
        $_resultado = $_mbd->bd->query($_sql);
        if ($_resultado) {
          if ($_resultado->num_rows !== 0) {
            $_e = 0;
            while ($row = $_resultado->fetch_assoc()) {
              array_push($_cadena,array($row['id'],$row['fechainicial'],$row['fechafinal'],$row['horainicial'],$row['horafinal'],$row['descripcion'],$row['urldestino'],$row['afuera']));
            }
          }
          $_resultado->free();
        }
        $_mbd->desconectar();
      }
      if ($_e == 1) {
        array_push($_cadena,'error');
      }
      return $_cadena;
    }
  }
  class Visitantes {
    var $hoy;
    var $mes;
    var $genesis;
    function __construct() {
    }
    function obtenerVisitantes() {
      $this->hoy = 0;
      $this->mes = 0;
      $this->genesis = 0;
      $_cadena = array();
      $_mbd = new conexion("ingsistemas");
      $_mbd->conectar();
      if ($_mbd->bd) {
        $_sql = "SELECT COUNT(*) AS tantos FROM visitantes WHERE fecha = '".Date("Y-m-d")."'";
        $_resultado = $_mbd->bd->query($_sql);
        if ($_resultado) {
          if ($_resultado->num_rows !== 0) {
            $row = $_resultado->fetch_assoc();
            $this->hoy = $row['tantos'];
          }
          $_resultado->free();
        }
        $_sql = "SELECT COUNT(*) AS tantos FROM visitantes WHERE fecha BETWEEN (CURDATE() - INTERVAL 30 DAY) AND CURDATE()";
        $_resultado = $_mbd->bd->query($_sql);
        if ($_resultado) {
          if ($_resultado->num_rows !== 0) {
            $row = $_resultado->fetch_assoc();
            $this->mes = $row['tantos'];
          }
          $_resultado->free();
        }
        $_sql = "SELECT COUNT(*) AS tantos FROM visitantes";
        $_resultado = $_mbd->bd->query($_sql);
        if ($_resultado) {
          if ($_resultado->num_rows !== 0) {
            $row = $_resultado->fetch_assoc();
            $this->genesis = $row['tantos'];
          }
          $_resultado->free();
        }
        $_mbd->desconectar();
      }
    }
    function grabarVisitante() {
      $_mbd = new conexion("ingsistemas");
      $_mbd->conectar();
      if ($_mbd->bd) {
        $_behind = "";
        if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
          $_behind = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
          if (isset($_SERVER['HTTP_CLIENT_IP'])) {
            $_behind = $_SERVER['HTTP_CLIENT_IP'];
          }
        }
        $_sql = "INSERT INTO visitantes (fecha, ipcliente, ipforwarded) VALUES ('".Date("Y-m-d")."','".$_SERVER['REMOTE_ADDR']."','".$_behind."')";
        $_resultado = $_mbd->bd->query($_sql);
        $_mbd->desconectar();
      }
    }
  }
?>
