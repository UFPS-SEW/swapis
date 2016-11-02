<?php
  function cmes($_elmes) {
    switch ($_elmes) {
      case 1: {
        $_sarta = 'Ene';
        break;
      }
      case 2: {
        $_sarta = 'Feb';
        break;
      }
      case 3: {
        $_sarta = 'Mar';
        break;
      }
      case 4: {
        $_sarta = 'Abr';
        break;
      }
      case 5: {
        $_sarta = 'May';
        break;
      }
      case 6: {
        $_sarta = 'Jun';
        break;
      }
      case 7: {
        $_sarta = 'Jul';
        break;
      }
      case 8: {
        $_sarta = 'Ago';
        break;
      }
      case 9: {
        $_sarta = 'Sep';
        break;
      }
      case 10: {
        $_sarta = 'Oct';
        break;
      }
      case 11: {
        $_sarta = 'Nov';
        break;
      }
      case 12: {
        $_sarta = 'Dic';
        break;
      }
    }
    return $_sarta;
  }
?>
        <div class="ufps-row">
          <div class="ufps-col-mobile-12">
            <div class="gdl-custom-sidebar">
              <h3 class="gdl-custom-sidebar-title-m">Pr&oacute;ximas actividades</h3>
              <div class="ufps-tab-container" id="tabs" style="margin: auto; width:95%;">
                <ul class="ufps-tabs" style="cursor: pointer;">
                  <li><a class="ufps-tab-links" onmouseover="closeTab(event, 'tabs')" onclick="closeTab(event, 'tabs')" style="">&times;</a></li>
<?php
  $_myactividades = new Actividades();
  $_enlaces = $_myactividades->obtenerActividades(0);
  if ($_enlaces[0] != 'error') {
    $_tabulos = -1;
    $_textotabulos = array();
    $_controldia = "";
    $_controlmes = "";
    for ($_a = 0; $_a < count($_enlaces); $_a++) {
      if ($_enlaces[$_a][1] > Date("Y-m-d")) {
        $_eldia = substr($_enlaces[$_a][1],-2);
        $_elmes = substr($_enlaces[$_a][1],5,2);     
      } else {
        $_eldia = Date("d");
        $_elmes = Date("m");
      }
      if (substr($_eldia,0,1) == '0') {
        $_meldia = substr($_eldia,-1);
      }
      $_lafecha = $_meldia." ".cmes($_elmes);
      if ($_controldia != $_eldia || $_controlmes != $_elmes) {
        $_controldia = $_eldia;
        $_controlmes = $_elmes;
        $_tabulos++;
        echo "                  <li><a class=\"ufps-tab-links\" onmouseover=\"openTab(event, 'tab".($_tabulos+2)."', 'tabs')\">".$_lafecha."</a></li>\n";
      }
      $_textotabulos[$_tabulos] .= "\n<tr>\n";
      $_textotabulos[$_tabulos] .= "<td style=\"width:5%;text-align:right;vertical-align:top;padding-right:5px;\"><span class=\"ufps-badge ufps-badge-gray\">&middot;</span>";
/*
      if ($_enlaces[$_a][3] != "00:00:00") {
        $_textotabulos[$_tabulos] .= "<span class=\"ufps-badge ufps-badge-red\">";
        if (substr($_enlaces[$_a][3],0,5) == "12:00") {
          $_horin = "12";
          $_meridin = "m.";
        } else {
          if (substr($_enlaces[$_a][3],3,2) != "00") {
            $_minutin = ":".substr($_enlaces[$_a][3],3,2);
          } else {
            $_minutin = "";
          }
          if (substr($_enlaces[$_a][3],0,2) < "12") {
            if (substr($_enlaces[$_a][3],0,1) == "0") {
              $_horin = substr($_enlaces[$_a][3],1,1);
            } else {
              $_horin = substr($_enlaces[$_a][3],0,2);
            }
            $_meridin = "a.m.";
          } else {
            $_horin = substr($_enlaces[$_a][3],0,2) - 12;
            $_meridiano = "p.m.";
          }
        }
        $_textotabulos[$_tabulos] .= $_horin.$_minutin." ".$_meridiano."</span>";
        if ($_enlaces[$_a][4] != '00:00:00') {
          $_textotabulos[$_tabulos] .= "<br><br><span class=\"ufps-badge ufps-badge-red\">".substr($_enlaces[$_a][4],0,5)."</span>";
        }
      }
*/
      $_textotabulos[$_tabulos] .= "</td>";
      $_textotabulos[$_tabulos] .= "\n<td style=\"text-align:justify;vertical-align:top;padding-bottom:15px;\">".utf8_encode($_enlaces[$_a][5]);
      if ($_enlaces[$_a][6]) {
        $_textotabulos[$_tabulos] .= " <a href=\"".$_enlaces[$_a][6]."\"";
        if ($_enlaces[$_a][7] == 1) {
          $_textotabulos[$_tabulos] .= " target=\"_blank\"";
        }
        $_textotabulos[$_tabulos] .= " style=\"text-decoration:none;\">[+ Leer m&aacute;s]</a>";
      }
      $_textotabulos[$_tabulos] .=  "\n</td></tr>";
    }
?>
                </ul>
                <div id="tab1" class="ufps-tab-content"></div>
<?php
    for ($_a = 0; $_a <= $_tabulos; $_a++) {
?>
                <div id="tab<?php echo ($_a+2); ?>" class="ufps-tab-content">
                  <table width="100%" border"0" cellpadding="5" cellspacing="0">
<?php
      echo $_textotabulos[$_a];
?>
                  </table>
                </div>
<?php
    }
  }
?>
              </div>
<?php
?>
              <div class="clear" style="height:5px;"></div>
              <div style="margin-right:8px; text-align:right;"><a href="" style="text-decoration:none;">Ir al calendario de actividades</a> <a href=""><span class="ufps-badge ufps-badge-gray">+</span></a></div>
              <div class="clear" style="height:10px;"></div>
            </div>
          </div><!--ufps-col-mobile-3-->
        </div><!--ufps-row-->
<?php
?>
