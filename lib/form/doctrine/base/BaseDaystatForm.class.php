<?php

/**
 * Daystat form base class.
 *
 * @method Daystat getObject() Returns the current form's model object
 *
 * @package    boetticher
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseDaystatForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'      => new sfWidgetFormInputHidden(),
      'day'     => new sfWidgetFormDate(),
      'task_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Task'), 'add_empty' => false)),
      'minutes' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'      => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'day'     => new sfValidatorDate(),
      'task_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Task'))),
      'minutes' => new sfValidatorInteger(),
    ));

    $this->widgetSchema->setNameFormat('daystat[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Daystat';
  }

}
