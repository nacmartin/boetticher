<?php

/**
 * TaskTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class TaskTable extends Doctrine_Table
{
  /**
   * Returns an instance of this class.
   *
   * @return object TaskTable
   */
  public static function getInstance()
  {
    return Doctrine_Core::getTable('Task');
  }

  public static function getAllTasks($user_id)
  {
    // Doctrine
    $tasks = Doctrine_Query::create()->
      from('Task t')->
      leftJoin('t.TaskGroup g')->
      where('g.user_id = ?', $user_id)->
      fetchArray();
    return $tasks;
  }
}
