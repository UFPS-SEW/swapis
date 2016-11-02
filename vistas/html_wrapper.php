<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
                      "http://www.w3.org/TR/html4/loose.dtd">
<html>
<?php                                                      include ("html_header.php"); ?>
  <body>
    <!--Contenido-->
<?php                                                      include ("html_navbar.php"); ?>
    <div class="ufps-container ufps-fix-navbar-fixed">
      <div id="content">
        <div class="ufps-row">
          <div class="ufps-col-mobile-12">
<?php                                                      include ("html_slider.php"); ?>
<?php                                                      include ("html_menu.php"); ?>
          </div><!-- ufps-col-mobile-12-->
        </div><!--ufps-row-->
<?php
  $_vista = 'general';
  if ($_vista == 'general') {
                                                           include ("html_proximasTop.php");
?>
        <div class="ufps-row">
          <div class="ufps-col-mobile-12 ufps-col-tablet-12 ufps-col-desktop-8">
<?php
                                                           include ("html_informaciones.php");
?>
          </div><!--ufps-col-mobile-12 ufps-col-tablet-12 ufps-col-desktop-8"-->
          <div class="ufps-col-mobile-12 ufps-col-table-12 ufps-col-desktop-4">
<?php
                                                           include ("html_galerias.php");
?>
          </div><!--ufps-col-mobile-12 ufps-col-table-12 ufps-col-desktop-4-->
        </div><!--ufps-row-->
<?php
  } elseif ($_vista == 'post') {
/*
    include ("html_detallePost");
    include ("html_detalleDerecha");
*/
  }
?>
      </div><!--content-->
<?php                                                      include ("html_footer.php"); ?>
    </div><!--ufps.container ufps.navbar.fixed-->
<?php                                                      include ("html_finalScripts.php"); ?>
  </body>
</html>
