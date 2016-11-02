<?php
  $_myvisitantes = new Visitantes();
  $_myvisitantes->grabarVisitante();
  $_myvisitantes->obtenerVisitantes();
?>
      <div class="ufps-row">
        <div class="ufps-col-mobile-12" style="height:15px;">
        </div><!--ufps-col-mobile-12-->
      </div><!--ufps-row-->

      <div id="content-stretch" style="padding-top: 0px;">
        <div class="ufps-row" style="min-height:40px;">
          <div class="ufps-col-mobile-12 ufps-col-tablet-3" style="background:url(img/s5_static1.png); min-height: 50px; padding: 12px 16px 8px 16px; text-align:center; background-color:#d0d0d0;">
<span style="font-size: 20px; font-weight:bold; color:white;">VISITANTES</span>
          </div><!--ufps-col-mobile-12 ufps-col-tablet-3-->
          <div class="ufps-col-mobile-12 ufps-col-tablet-3" style="min-height: 50px; padding: 2px 16px; text-align:center; background-color:#d8d8d8;">
<span style="font-size:12px;">Hoy</span><br><span class="ufps-badge ufps-badge-red"><?php echo number_format($_myvisitantes->hoy,0,',','.'); ?></span>
          </div><!--ufps-col-mobile-12 ufps-col-tablet-3-->
          <div class="ufps-col-mobile-12 ufps-col-tablet-3" style="min-height: 50px; padding: 2px 16px; text-align:center; background-color:#e0e0e0;">
<span style="font-size:12px;">&Uacute;ltimo mes</span><br><span class="ufps-badge ufps-badge-red"><?php echo number_format($_myvisitantes->mes,0,',','.'); ?></span>
          </div><!--ufps-col-mobile-12 ufps-col-tablet-3-->
          <div class="ufps-col-mobile-12 ufps-col-tablet-3" style="min-height: 50px; padding: 2px 16px; text-align:center; background-color:#e8e8e8;">
<span style="font-size:12px;">Desde el principio</span><br><span class="ufps-badge ufps-badge-red"><?php echo number_format($_myvisitantes->genesis,0,',','.'); ?></span>
          </div><!--ufps-col-mobile-12 ufps-col-tablet-3-->
        </div><!--ufps-row-->
      </div><!--content-->
      <div class="ufps-row">
        <div class="ufps-col-mobile-12" style="height:15px;">
        </div><!--ufps-col-mobile-12-->
      </div><!--ufps-row-->
      <div id="content" style="padding-top: 0px;">
        <div class="ufps-row">
          <div class="ufps-col-mobile-12">
            <div class="gdl-custom-sidebar-title-xs" style="float: right;">
              <table style="width:100%;"><tr><td style="text-align:center;">
<?php
  $_mylogosfooter = new EnlacesFooter();
  $_enlaces = $_mylogosfooter->obtenerEnlaces();
  if ($_enlaces[0] != 'error') {
    for ($_a = 0; $_a < count($_enlaces); $_a++) {
      echo "                ";
      if ($_enlaces[$_a][0]) {
        echo "<a href=\"".$_enlaces[$_a][0]."\"";
        if ($_enlaces[$_a][2] == 1) {
          echo " target=\"_blank\"";
        }
        echo ">";
      }
      echo "<img src=\"".$_enlaces[$_a][1]."\" style=\"";
      if ($_a > 0) {
        echo "margin-left:5px; ";
      }
      echo "margin-bottom:5px;\">";
      if ($_enlaces[$_a][0]) {
        echo "</a>";
      }
      echo "\n";
    }
  }
?>
              </td>
              <td style="padding-left:10px;">
<?php
  $_mytextoFooter = new textoFooter();
  echo utf8_encode(str_replace("\r","",str_replace("\n","<br>",$_mytextoFooter->obtenerTexto())));
?>
              </td></tr></table>
            </div>
          </div><!--ufps-col-mobile-12-->
        </div><!--ufps-row-->
      </div><!--content-->
      <div class="ufps-row">
        <div class="ufps-col-mobile-12" style="height:15px;">
        </div><!--ufps-col-mobile-12-->
      </div><!--ufps-row-->
<?php
?>
