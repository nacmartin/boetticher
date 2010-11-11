<?php use_helper('task')?>
<div id="changetask">
<div class="bigtext">
Change task to
</div>

<?php if (count($alltasks) > 0):?>
  <?php foreach ($alltasks as $group):?>
    <fieldset class="taskgroup">
      <legend><?php echo $group['name']?></legend>
      <ul class="tasklist">
      <?php foreach ($group['Tasks'] as $task):?>
        <li><a href="<?php echo url_for('@task_start?id='.$task['id'])?>"><?php prettyTask($task['name'], $task['color'])?></a></li>
      <?php endforeach?>
      </ul>
    </fieldset>
  <?php endforeach?>
<?php else:?>
    <div id="notasks" class="message">No tasks defined</div>
<?php endif?>
</div>
