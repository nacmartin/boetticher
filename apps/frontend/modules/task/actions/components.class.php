<?php
class taskComponents extends sfComponents
{
  public function executeActive(){
    $user_id = $this->getUser()->getGuardUser()->getId();
    $this->active_uow = UowTable::getActiveUow($user_id);
  }
  public function executeListtasks(){
    $user_id = $this->getUser()->getGuardUser()->getId();
    $this->alltasks = TaskTable::getAllTasks($user_id);
  }
  public function executeHistory(){
    $user_id = $this->getUser()->getGuardUser()->getId();
    $thismonth = DaystatTable::getThisMonth($user_id);
    $daystask = array();
    $colors = array();
    foreach ($thismonth as $day){
      $taskname = $day['Task']['name'];
      if (!array_key_exists($taskname,$daystask)){
        $daystask[$taskname] = array();
      }
      if (!array_key_exists($taskname,$colors)){
        $colors[$taskname] = $day['Task']['color'];
      }
      $daystask[$taskname][$day['day']] = $day['minutes'];
    }
    $this->stats = Array();
    foreach($daystask as $task => $val){
      $array4task = array();
      $starttime = strtotime(date('Y-m-',time()).'1');
      while($starttime < time()){
        $cdate = date('Y-m-d',$starttime);
        if (array_key_exists($cdate, $val)){
          array_push($array4task, $val[$cdate]);
        }else{
          array_push($array4task, 0);
        }
        $starttime += 60*60*24;
      }
      $this->stats[$task] = array('days' => $array4task, 'color'=> $colors[$task]);
    }
    $this->colorstr="";
    $this->pointstr="";
    $colors=array();
    $pointsarr = array();
    foreach ($this->stats as $stat){
      $points=array();
      array_push($colors, $stat['color']);
      foreach ($stat['days'] as $value){
        array_push($points, $value);
      }
      array_push($pointsarr, implode (",",$points));
    }
    $this->colorstr = implode(",", $colors);
    $this->pointstr = implode("|", $pointsarr);
  }

  protected function getSummary($user_id, $stats){
    $groups = array();
    $total = 0;
    foreach ($stats as $day){
      $namegroup= $day['Task']['TaskGroup']['name'];
      if(!array_key_exists($namegroup, $groups)){
        $groups[$namegroup] = array('tasks' => array(), 'minutes' => 0);
      }
      $nametask= $day['Task']['name'];
      if(!array_key_exists($nametask, $groups[$namegroup]['tasks'])){
        $groups[$namegroup]['tasks'][$nametask] = array('color' => $day['Task']['color'], 'minutes' => $day['minutes']);
      } else{
        $groups[$namegroup]['tasks'][$nametask]['minutes'] += $day['minutes'];
      }
      $groups[$namegroup]['minutes'] += $day['minutes'];
      $total += $day['minutes'];
    }
    return array('total' => $total, 'groups' => $groups);
  }

  public function executeSummary(){
    $user_id = $this->getUser()->getGuardUser()->getId();
    $thismonth = DaystatTable::getThisMonth($user_id);
    $thisweek = DaystatTable::getThisWeek($user_id);
    $thisday = DaystatTable::getThisDay($user_id);
    $this->month = $this->getSummary($user_id, $thismonth);
    $this->week = $this->getSummary($user_id, $thisweek);
    $this->day = $this->getSummary($user_id, $thisday);
    foreach($this->month['groups'] as $name =>$group){
      if(!array_key_exists($name, $this->week['groups'])){
        $this->week['groups'][$name] = array('tasks' => array(), 'minutes' => 0);
      }
      if(!array_key_exists($name, $this->day['groups'])){
        $this->day['groups'][$name] = array('tasks' => array(), 'minutes' => 0);
      }
      foreach($group['tasks'] as $namet=> $task){
        if(!array_key_exists($namet, $this->week['groups'][$name]['tasks'])){
          $this->week['groups'][$name]['tasks'][$namet] = array('color' => $task['color'] ,'minutes' => 0);
        }
        if(!array_key_exists($namet, $this->day['groups'][$name]['tasks'])){
          $this->day['groups'][$name]['tasks'][$namet] = array('color' => $task['color'] ,'minutes' => 0);
        }
      }
    }
  }
}
