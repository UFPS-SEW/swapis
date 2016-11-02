<?php
?>
            <div class="slider-wrapper fullwidth">
              <div id="slider" class="nivoSlider" style="margin:auto; width:100%; height:310px;">
<?php
  $_myslides = new Slides();
  $_enlaces = $_myslides->obtenerSlides();
  if ($_enlaces[0] != "error") {
    for ($_a = 0; $_a < count($_enlaces); $_a++) {
      echo "                <img class=\"no-preload\" src=\"".$_enlaces[$_a][2]."\" title=\"#nivo-caption".$_a."\" alt=\"\" />\n";;
    }
  }
?>
              </div>
<?php
  if ($_enlaces[0] != "error") {
    for ($_a = 0; $_a < count($_enlaces); $_a++) {
      echo "              <div class='nivo-caption gdl-slider-caption' id='nivo-caption".$_a."' >\n";
      echo "                <div class='gdl-slider-title gdl-title'>".utf8_encode($_enlaces[$_a][0])."</div>\n";
      echo utf8_encode($_enlaces[$_a][1])."\n";
      echo "              </div>\n";
    }
  }
?>
            </div>
<?php
?>
