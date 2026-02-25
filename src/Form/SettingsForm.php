<?php

namespace Drupal\taxonomy_single_redirect\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Configure Taxonomy Single Redirect settings for this site.
 */
class SettingsForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'taxonomy_single_redirect_settings';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return ['taxonomy_single_redirect.settings'];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('taxonomy_single_redirect.settings');

    $form['enabled'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Enable automatic redirect'),
      '#description' => $this->t('If checked, users will be redirected to the node if it is the only one tagged with the term.'),
      '#default_value' => $config->get('enabled') ?? FALSE,
    ];

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $this->config('taxonomy_single_redirect.settings')
      ->set('enabled', (bool) $form_state->getValue('enabled'))
      ->save();

    parent::submitForm($form, $form_state);
  }

}