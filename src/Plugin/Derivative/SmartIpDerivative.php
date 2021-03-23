<?php

namespace Drupal\smart_content_smart_ip\Plugin\Derivative;

use Drupal\Component\Plugin\Derivative\DeriverBase;
use Drupal\Core\StringTranslation\StringTranslationTrait;

/**
 * Deriver for SmartIp Condition.
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
        'label' => $this->t('Location'),
        'type' => 'select',
        'options_callback' => [get_class($this), 'getRegionOptions'],
      ] + $base_plugin_definition,
      'new_user' => [
        'label' => $this->t('New User'),
        'type' => 'boolean',
      ] + $base_plugin_definition,
    ];
    return $this->derivatives;
  }

  /**
   * Returns list of 'Regions' for select element.
   *
   * @return array
   *   Array of Regions.
   */
  public static function getRegionOptions() {
    $file = fopen(drupal_get_path('module', 'smart_content_smart_ip') . '/data/region_codes.csv', "r");
    $region_codes = [];
    while (!feof($file)) {
      $regions = fgetcsv($file);
      if (!empty($regions[2])) {
        $country_name = self::getCountryNameFromCode($regions[0]);
        $region_codes[$country_name][$regions[2]] = $regions[2];
      }
    }
    ksort($region_codes);
    foreach ($region_codes as $key => $value) {
      ksort($value);
      $region_codes[$key] = $value;
    }
    return $region_codes;
  }

  /**
   * Getting country name from Country code.
   *
   * @return array
   *   Array of Country Name.
   */
  public static function getCountryNameFromCode($country_code) {
    $country_list = \Drupal::service('country_manager')->getList();
    foreach ($country_list as $key => $value) {
      if ($key === $country_code) {
        return $value->__toString();
      }
    }
  }

}
