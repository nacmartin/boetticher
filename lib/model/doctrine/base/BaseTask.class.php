<?php

/**
 * BaseTask
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $name
 * @property string $color
 * @property integer $taskgroup_id
 * @property boolean $hidden
 * @property TaskGroup $TaskGroup
 * @property Doctrine_Collection $Uows
 * @property Doctrine_Collection $Daystats
 * 
 * @method string              getName()         Returns the current record's "name" value
 * @method string              getColor()        Returns the current record's "color" value
 * @method integer             getTaskgroupId()  Returns the current record's "taskgroup_id" value
 * @method boolean             getHidden()       Returns the current record's "hidden" value
 * @method TaskGroup           getTaskGroup()    Returns the current record's "TaskGroup" value
 * @method Doctrine_Collection getUows()         Returns the current record's "Uows" collection
 * @method Doctrine_Collection getDaystats()     Returns the current record's "Daystats" collection
 * @method Task                setName()         Sets the current record's "name" value
 * @method Task                setColor()        Sets the current record's "color" value
 * @method Task                setTaskgroupId()  Sets the current record's "taskgroup_id" value
 * @method Task                setHidden()       Sets the current record's "hidden" value
 * @method Task                setTaskGroup()    Sets the current record's "TaskGroup" value
 * @method Task                setUows()         Sets the current record's "Uows" collection
 * @method Task                setDaystats()     Sets the current record's "Daystats" collection
 * 
 * @package    boetticher
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseTask extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('task');
        $this->hasColumn('name', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('color', 'string', 6, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 6,
             ));
        $this->hasColumn('taskgroup_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('hidden', 'boolean', null, array(
             'type' => 'boolean',
             'default' => false,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('TaskGroup', array(
             'local' => 'taskgroup_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasMany('Uow as Uows', array(
             'local' => 'id',
             'foreign' => 'task_id'));

        $this->hasMany('Daystat as Daystats', array(
             'local' => 'id',
             'foreign' => 'task_id'));
    }
}