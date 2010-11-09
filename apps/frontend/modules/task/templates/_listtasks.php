<?php use_helper('task')?>
<div id="changetask">
<div class="bigtext">
Change task to
</div>

<?php if (count($alltasks) > 0):?>
  <ul class="tasklist">
  <?php foreach ($alltasks as $task):?>
    <li><a href="<?php echo url_for('@task_start?id='.$task['id'])?>"><?php prettyTask($task['name'], $task['color'])?></a></li>
  <?php endforeach?>
  </ul>
<?php else:?>
    <div id="notasks" class="message">No tasks defined</div>
<?php endif?>
</div>
