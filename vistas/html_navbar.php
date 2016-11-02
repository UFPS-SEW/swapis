<?php
?>
    <div class="ufps-navbar ufps-navbar-fixed" id="menuPrincipal">
      <div class="ufps-container">
<!--            <div class="ufps-navbar-brand" style="line-height:20px; padding: 15px; 10px;">-->
        <div class="ufps-navbar-brand">
<!--              Programa de Ingenier&iacute;a de Sistemas<br><font style="font-size:80%;">Universidad Francisco de Paula Santander</font>-->
             Programa de Ingenier&iacute;a de Sistemas
<!--                <div class="ufps-btn-menu" onclick="toggleMenu('menuPrincipal')" style="padding: 21px 5px 0px 10px;">-->
          <div class="ufps-btn-menu" style="display:block;" onclick="toggleMenu('menuPrincipal')">
<!--              <a href="#" id="menu-control" style="height:70px;">-->
            <a href="#" id="ufps-menu-control" class="ufps-tooltip">
              <div class="ufps-btn-menu-bar"></div>
              <div class="ufps-btn-menu-bar"></div>
              <div class="ufps-btn-menu-bar"></div>
              <span class="ufps-tooltip-content-right-bottom">Enlaces de inter&eacute;s</span>
            </a>
          </div>
        </div>
        <div class="ufps-navbar-left" style="display:none;">
<!---->
<?php
  $_mynavbar = new EnlacesDeInteres();
  $_enlaces = $_mynavbar->obtenerEnlaces();
  for ($_a = 0; $_a < count($_enlaces); $_a++) {
    echo "              <a href=\"".$_enlaces[$_a][0]."\"";
    if ($_enlaces[$_a][2] == 1) {
       echo " target=\"_blank\"";
    }
    echo " class=\"ufps-navbar-btn\">".utf8_encode($_enlaces[$_a][1])."</a>\n";
  }
?>
<!----->
        </div>
        <div class="ufps-navbar-right">
          <div class="ufps-navbar-corporate">
            <a href="."><img src="img/logo_ingsistemas.png" alt="Logo ingenierÃ­a de sistemas"></a>
            <a href="http://www.ufps.edu.co"><img src="img/logo_ufps.png" alt="Logo UFPS"></a>
          </div>
        </div>
      </div>
    </div>
<?php
?>
