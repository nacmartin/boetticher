<?php

/**
 * sfGuardUserProfileStuff form base class.
 *
 * @method sfGuardUserProfileStuff getObject() Returns the current form's model object
 *
 * @package    boetticher
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasesfGuardUserProfileStuffForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                      => new sfWidgetFormInputHidden(),
      'user_id'                 => new sfWidgetFormInputText(),
      'email'                   => new sfWidgetFormInputText(),
      'new_password'            => new sfWidgetFormInputText(),
      'new_password_created_at' => new sfWidgetFormDateTime(),
      'activation_key'          => new sfWidgetFormInputText(),
      'validate_at'             => new sfWidgetFormDateTime(),
      'validate'                => new sfWidgetFormInputText(),
      'created_at'              => new sfWidgetFormDateTime(),
      'updated_at'              => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                      => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'user_id'                 => new sfValidatorInteger(),
      'email'                   => new sfValidatorString(array('max_length' => 80)),
      'new_password'            => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'new_password_created_at' => new sfValidatorDateTime(array('required' => false)),
      'activation_key'          => new sfValidatorString(array('max_length' => 32, 'required' => false)),
      'validate_at'             => new sfValidatorDateTime(array('required' => false)),
      'validate'                => new sfValidatorString(array('max_length' => 33, 'required' => false)),
      'created_at'              => new sfValidatorDateTime(),
      'updated_at'              => new sfValidatorDateTime(),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'sfGuardUserProfileStuff', 'column' => array('email')))
    );

    $this->widgetSchema->setNameFormat('sf_guard_user_profile_stuff[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'sfGuardUserProfileStuff';
  }

}
