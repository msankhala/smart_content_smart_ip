<?php

namespace Drupal\smart_content_smart_ip\Plugin\smart_content\Condition;

use Drupal\smart_content\Condition\ConditionTypeConfigurableBase;

/**
 * Provides a Smart IP Condition.
 *
 * @SmartCondition(
 *   id = "smart_ip",
 *   label = @Translation("Smart IP"),
 *   group = "smart_ip",
 *   weight = 0,
 *   deriver = "Drupal\smart_content_smart_ip\Plugin\Derivative\SmartIpDerivative"
 * )
 */
class BrowserCondition extends ConditionTypeConfigurableBase {

  /**
   * {@inheritdoc}
   */
  public function getLibraries() {
    $libraries = array_unique(array_merge(parent::getLibraries(), ['smart_content_browser/condition.browser']));
    return $libraries;
  }

}
