<?php

function prettyTask($name, $color){
  echo "<table class='taskbox'><tr><td><div class='task-square' style='background-color:#".$color."'></div></td><td>".$name."</td></tr></table>";
}
