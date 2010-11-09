<?php use_helper('task')?>
<table class="summarytab shadowsquare">
<tr class="tablehead"><th>Concept</th><th>Today</th><th>Week</th><th>Month</th><tr>
<?php foreach($month['groups'] as $name => $group):?>
  <tr class="grouprow"><td><?php echo $name?></td><td><?php echo $day['groups'][$name]['minutes']?></td><td><?php echo $week['groups'][$name]['minutes']?></td><td><?php echo $month['groups'][$name]['minutes']?></td></tr>
  <?php foreach($group['tasks'] as $namet => $task):?>
    <tr class="taskrow"><td><?php prettyTask($namet,$task['color'])?></td><td><?php echo $day['groups'][$name]['tasks'][$namet]['minutes']?></td><td><?php echo $week['groups'][$name]['tasks'][$namet]['minutes']?></td><td><?php echo $month['groups'][$name]['tasks'][$namet]['minutes']?></td></tr>
  <?php endforeach?>
<?php endforeach?>
<tr class="totalrow"><td>Total</td><td><?php echo $day['total']?></td><td><?php echo $week['total']?></td><td><?php echo $month['total']?></td><tr>
</table>
