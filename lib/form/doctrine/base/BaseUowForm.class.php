<?php

/**
 * Uow form base class.
 *
 * @method Uow getObject() Returns the current form's model object
 *
 * @package    boetticher
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseUowForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'start_time' => new sfWidgetFormDateTime(),
      'end_time'   => new sfWidgetFormDateTime(),
      'task_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Task'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'start_time' => new sfValidatorDateTime(),
      'end_time'   => new sfValidatorDateTime(array('required' => false)),
      'task_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Task'))),
    ));

    $this->widgetSchema->setNameFormat('uow[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Uow';
  }

}
