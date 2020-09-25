<?php

namespace Drupal\social_media_icons\Form;
 
use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
 
/**
* Configure settings for this site.
*/
class Settings extends ConfigFormBase {
/**
 * {@inheritdoc}
 */
  public function getFormId() {
    return 'social_media_icons_settings';
  }
 
/**
 * {@inheritdoc}
 */
  protected function getEditableConfigNames() {
    return [
      'social_media_icons.settings',
    ];
  }
 
/**
 * {@inheritdoc}
 */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('social_media_icons.settings');
 
    $form['twitter_setting'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Twitter'),
      '#description' => $this->t('Twitter profile.'),
      '#default_value' => $config->get('twitter_setting'),
	 
    );
 
     $form['twitter_icon_setting'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Twitter Icon'),
      '#description' => $this->t('Twitter Icon.'),
      '#default_value' => $config->get('twitter_icon_setting'),
    );
 
    $form['facebook_setting'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Facebook'),
      '#description' => $this->t('Facebook profile.'),
      '#default_value' => $config->get('facebook_setting'),
    );
 
   $form['facebook_icon_setting'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Facebook Icon'),
      '#description' => $this->t('Facebook Icon.'),
      '#default_value' => $config->get('facebook_icon_setting'),
    );
 
    $form['instagram_setting'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Instagram'),
      '#description' => $this->t('Instagram profile.'),
      '#default_value' => $config->get('instagram_setting'),
    );
 
    $form['instagram_icon_setting'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Instagram Icon'),
      '#description' => $this->t('Instagram Icon.'),
      '#default_value' => $config->get('instagram_icon_setting'),
    );
 
    return parent::buildForm($form, $form_state);
  }
 
/**
 * {@inheritdoc}
 */
  public function submitForm(array &$form, FormStateInterface $form_state) {
      // Retrieve the configuration
       $this->configFactory->getEditable('social_media_icons.settings')
      // Set the submitted configuration setting
      ->set('twitter_setting', $form_state->getValue('twitter_setting'))
	  ->set('twitter_icon_setting', $form_state->getValue('twitter_icon_setting'))
	  
	  ->set('facebook_setting', $form_state->getValue('facebook_setting'))
	  ->set('facebook_icon_setting', $form_state->getValue('facebook_icon_setting'))
	  
	  ->set('instagram_setting', $form_state->getValue('instagram_setting'))
	  ->set('instagram_icon_setting', $form_state->getValue('instagram_icon_setting'))
      
	  ->save();
 
    parent::submitForm($form, $form_state);
  }
}

?>