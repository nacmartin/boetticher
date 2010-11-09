<?php use_helper('task')?>
<table id="active-task">
<tr>
<?php if ($active_uow):?>
<td id="current"><strong>Current task</strong></td><td id="current-taskbox"><?php prettyTask($active_uow['Task']['name'],$active_uow['Task']['color'])?></td><td id="task-started"> started </td><td id="task-timeago"><?php echo floor((time() - strtotime($active_uow['start_time']))/60)?></td><td id="task-textago">minutes ago</td><td id="task-stop"><a href="<?php echo url_for("@task_stop?id=".$active_uow['id'])?>">STOP</a></td>
<?php else:?>
<td id="current"><strong>You are too lazy!</strong></td>
<?php endif?>
<tr>
</table>

