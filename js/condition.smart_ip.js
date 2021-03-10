(function (Drupal, drupalSettings) {
  Drupal.smartContent = Drupal.smartContent || {};
  Drupal.smartContent.plugin = Drupal.smartContent.plugin || {};
  Drupal.smartContent.plugin.Field = Drupal.smartContent.plugin.Field || {};

  /**
   * Function to return a value recived from SmartIp condition.
   * @return Promise
   */
  Drupal.smartContent.plugin.Field['smart_ip'] = function (condition) {
    return drupalSettings.smart_content_smart_ip.region;
  };
})(Drupal, drupalSettings);
