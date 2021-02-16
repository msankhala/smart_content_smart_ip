<?php

namespace Drupal\smart_content_smart_ip\Plugin\Derivative;

use Drupal\Component\Plugin\Derivative\DeriverBase;
use Drupal\Core\StringTranslation\StringTranslationTrait;

/**
 * Deriver for BrowserCondition.
 *
 * Provides a deriver for
 * Drupal\smart_content_smart_ip\Plugin\smart_content\Condition\SmartIpCondition.
 * Definitions are based on meta data provided by smart ip.
 */
class SmartIpDerivative extends DeriverBase {
  use StringTranslationTrait;

  /**
   * {@inheritdoc}
   */
  public function getDerivativeDefinitions($base_plugin_definition) {
    $this->derivatives = [
      'smart_ip' => [
        'label' => $this->t('Smart Ip'),
        'type' => 'textfield',
      ] + $base_plugin_definition,
    ];
    return $this->derivatives;
  }

}
