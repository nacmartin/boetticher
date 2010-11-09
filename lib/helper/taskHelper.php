<?php

function prettyTask($name, $color){
  echo "<table class='taskbox'><tr><td><div class='task-square' style='background-color:#".$color."'></div></td><td class='task-name'>".$name."</td></tr></table>";
}
