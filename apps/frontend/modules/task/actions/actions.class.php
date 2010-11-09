<?php

/**
 * task actions.
 *
 * @package    boetticher
 * @subpackage task
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class taskActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
  }
  public function executeStart(sfWebRequest $request)
  {
    $user_id = $this->getUser()->getGuardUser()->getId();
    $uow = UowTable::getActiveUow($user_id);
    if ($uow){
      $uow->end_time = date( 'Y-m-d H:i:s', time() );
      $uow->save();
      DaystatTable::computeUow($uow);
    }

    $uow = new Uow();
    $uow->start_time = date( 'Y-m-d H:i:s', time() );
    $uow->task_id = $request->getParameter('id');
    $uow->save();

    $this->redirect('@homepage');
  }
  public function executeStop(sfWebRequest $request)
  {
    $user_id = $this->getUser()->getGuardUser()->getId();
    $uow = UowTable::getActiveUow($user_id);
    $uow->end_time = date( 'Y-m-d H:i:s', time() );
    $uow->save();
    DaystatTable::computeUow($uow);
    $this->redirect('@homepage');
  }
}
