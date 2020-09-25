<?php

namespace Drupal\social_media_icons\Plugin\Block;

use Drupal\Core\Access\AccessResult;
use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Session\AccountInterface;

/**
 * Provides a block with a simple text.
 *
 * @Block(
 *   id = "my_block_example_block",
 *   admin_label = @Translation("My block"),
 * )
 */
class MyBlock extends BlockBase {
  /**
   * {@inheritdoc}
   */
  public function build() {
	  
	$config = \Drupal::config('social_media_icons.settings');
	
    $twitter = $config->get('twitter_setting');
	$twitter_icon = $config->get('twitter_icon_setting');
	
	$facebook = $config->get('facebook_setting');
	$facebook_icon = $config->get('facebook_icon_setting');	
	
	$instagram = $config->get('instagram_setting');
	$instagram_icon = $config->get('instagram_icon_setting');
	
	$div  = '<a class="social_links" href="'.$twitter.'"><img alt="Twitter" src="'.$twitter_icon.'" width="32" height="32" /></a>';
	$div .= '<a class="social_links margin-10" href="'.$facebook.'"><img alt="Twitter" src="'.$facebook_icon.'" width="32" height="32" /></a>';
	$div .= '<a class="social_links" class="margin-5" href="'.$instagram.'"><img alt="Twitter" src="'.$instagram_icon.'" width="32" height="32" /></a>';
	
    return [
		'#markup' => $div,
		'#allowed_tags' => ['a', 'i', 'img'],
		'#attached' => array(
            'library' =>  array(
				'social_media_icons/social_media_icons',
            ),	
        ),			
    ];
  }

  /**
   * {@inheritdoc}
   */
  protected function blockAccess(AccountInterface $account) {
    return AccessResult::allowedIfHasPermission($account, 'access content');
  }

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    $config = $this->getConfiguration();

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    $this->configuration['SocialMediaIcons_block_settings'] = $form_state->getValue('SocialMediaIcons_block_settings');
  }
}

