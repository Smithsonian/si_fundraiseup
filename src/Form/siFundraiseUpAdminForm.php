<?php

namespace Drupal\si_fundraiseup\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Component\Utility\Xss;

/**
 * Configure EDAN API settings for this site.
 */
class siFundraiseUpAdminForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'si_fundraiseup_settings';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return ['si_fundraiseup.settings'];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('si_fundraiseup.settings');

    $form['code'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Unit Code'),
	    '#description' => $this->t("Enter the id provided by FundraiseUp.  In the javascript snippet provided, the code is usually at the end of the snippet, in the following format: (window,document,'script','FundraiseUp','ExampleID');</script>"),
      '#default_value' => $config->get('code') ?? '',
      '#maxlength' => 255,
      '#size' => 60,
      '#required' => TRUE,
    ];

    return parent::buildForm($form, $form_state);
  }



  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $config = $this->config('si_fundraiseup.settings');

    $config->set('code',
      Xss::filter($form_state->getValue('code')));
    $config->save();

    parent::submitForm($form, $form_state);
  }
}

