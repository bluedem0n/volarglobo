<?php

/**
 * sfGuardUser form.
 *
 * @package    hub-usmjesus
 * @subpackage form
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: sfDoctrinePluginFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class FrontendsfGuardUserForm extends sfGuardUserForm
{
  public function configure()
  {

      parent::configure();
      //this is in your somePurposeForm.class.php file

      $this->widgetSchema ['captcha'] = new sfWidgetFormInput();
      $this->validatorSchema['captcha'] =  new sfValidatorSfCryptoCaptcha(array('required' => true, 'trim' => true),
                                                           array(
                                                               'wrong_captcha' => 'The code you copied is not valid.',
                                                                'required' => 'You did not copy any code. Please copy the code.'));

       $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

  }

  protected function removeField() {
      unset(
        $this['created_at'],
        $this['updated_at'],
        $this['algorithm'],
        $this['last_login'],
        $this['first_name'],
        $this['last_name'],
        $this['salt'],
        $this['groups_list'],
        $this['permissions_list']
        

      );
  }


}
