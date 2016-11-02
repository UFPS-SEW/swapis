<?php
?>
            <a id="menu-control" style="cursor: pointer;"><span>&#9776;</span> MEN&Uacute;</a>
              <div id="navigation" class="menu-main-container">
<?php
  function pongaitem($_id, $_etiqueta, $_url, $_afuera, $_conhijos, $_origen, $_nivel) {
    $_stilos = "";
    echo "<li id=\"menu-item-".$_id."\" class=\"menu-item";
    if ($_conhijos == 1) {
      echo " menu-item-has-children";
    }
    echo " menu-item-".$_id."\"";
    if ($_origen == 1) {
      echo " style=\"min-height:42px;\"";
    }
    echo "><a";
    if ($_origen == 1) {
      if ($_nivel > 0) {
        $_stilos .= "padding-top:7px;";
      }
      if (strlen($_etiqueta) > 23) {
        $_stilos .= "line-height:20px;";
      }
    }
    if ($_conhijos == 1) {
      $_stilos .= "cursor:pointer;";
    } else {
      echo " href=\"".$_url."\"";
      if ($_afuera == 1) {
        echo " target=\"_blank\"";
      }
    }
    echo " style=\"".$_stilos."\"";
    echo ">".utf8_encode($_etiqueta)."</a>";
  }
  $_mymenu = new Menus();
  $_enlaces = $_mymenu->obtenerMenu();
  if ($_enlaces[0] != "error") {
    $_anterior = -1;
    for ($_a = 0; $_a < count($_enlaces); $_a++) {
      if ($_enlaces[$_a][1] == $_anterior) {
        echo "</li>\n";
        pongaitem($_enlaces[$_a][0], $_enlaces[$_a][2], $_enlaces[$_a][3], $_enlaces[$_a][4], $_enlaces[$_a][5], 1, $_enlaces[$_a][1]);
      } elseif ($_enlaces[$_a][1] > $_anterior) {
        if ($_a == 0) {
          echo "                <ul id=\"dropmenu\" class=\"menu\">\n";
        } else {
          echo "\n<ul class=\"sub-menu\">\n";
        }
        pongaitem($_enlaces[$_a][0], $_enlaces[$_a][2], $_enlaces[$_a][3], $_enlaces[$_a][4], $_enlaces[$_a][5], 1, $_enlaces[$_a][1]);
      } elseif ($_enlaces[$_a][1] < $_anterior) {
        $_tengo = $_anterior;
        while ($_tengo > $_enlaces[$_a][1]) {
          echo "</li>\n";
          echo "</ul>\n";
          $_tengo--;
        }
        echo "</li>\n";
        pongaitem($_enlaces[$_a][0], $_enlaces[$_a][2], $_enlaces[$_a][3], $_enlaces[$_a][4], $_enlaces[$_a][5], 1, $_enlaces[$_a][1]);
      }
      $_anterior = $_enlaces[$_a][1];
    }
    while ($_anterior >= 0) {
      echo "</li>\n";
      echo "</ul>\n";
      $_anterior--;
    }
?>
              </div>
              <div id="navigation2" class="menu-main-container2">
<?php
    for ($_a = 0; $_a < count($_enlaces); $_a++) {
      if ($_enlaces[$_a][1] == $_anterior) {
        echo "</li>\n";
        pongaitem($_enlaces[$_a][0], $_enlaces[$_a][2], $_enlaces[$_a][3], $_enlaces[$_a][4], $_enlaces[$_a][5], 2, $_enlaces[$_a][1]);
      } elseif ($_enlaces[$_a][1] > $_anterior) {
        if ($_a == 0) {
          echo "                <ul id=\"dropmenu2\" class=\"menu2\">\n";
        } else {
          echo "\n<ul class=\"sub-menu2\">\n";
        }
        pongaitem($_enlaces[$_a][0], $_enlaces[$_a][2], $_enlaces[$_a][3], $_enlaces[$_a][4], $_enlaces[$_a][5], 2, $_enlaces[$_a][1]);
      } elseif ($_enlaces[$_a][1] < $_anterior) {
        $_tengo = $_anterior;
        while ($_tengo > $_enlaces[$_a][1]) {
          echo "</li>\n";
          echo "</ul>\n";
          $_tengo--;
        }
        echo "</li>\n";
        pongaitem($_enlaces[$_a][0], $_enlaces[$_a][2], $_enlaces[$_a][3], $_enlaces[$_a][4], $_enlaces[$_a][5], 2, $_enlaces[$_a][1]);
      }
      $_anterior = $_enlaces[$_a][1];
    }
    while ($_anterior >= 0) {
      echo "</li>\n";
      echo "</ul>\n";
      $_anterior--;
    }

  }
?>
              </div>
<?php
?>
