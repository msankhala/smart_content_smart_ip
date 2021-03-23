(function (Drupal, drupalSettings) {
  Drupal.smartContent = Drupal.smartContent || {};
  Drupal.smartContent.plugin = Drupal.smartContent.plugin || {};
  Drupal.smartContent.plugin.Field = Drupal.smartContent.plugin.Field || {};

  /**
   * Function to return a value recived from SmartIp for Location condition.
   * @return Promise
   */
  Drupal.smartContent.plugin.Field['smart_ip:smart_ip'] = function (condition) {
    return drupalSettings.smart_content_smart_ip.region;
  };

  /**
   * Function to return a value based on New V/S Returning User.
   * @return Promise
   */
  Drupal.smartContent.plugin.Field['smart_ip:new_user'] = function (condition) {
    var pages = getPages();
    var current = drupalSettings.path.currentPath;
    if (pages.includes(current)) {
      return false;
    }
    if (pages.indexOf(current) == -1) {
      pages.push(current);
    }
    setCookie('pages', pages);
    return true;
  };

  /**
   * Get the list of pages viewed by the user from cookie.
   */
  function getPages() {
    var pages = getCookie('pages') || [];
    if (typeof pages === 'string') {
      pages = pages.split(",");
    }
    return pages;
  }

  /**
   * Get already existing cookie values
   */
  function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for (var i = 0; i < ca.length; i++) {
      var c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return "";
  }

  /**
   * Set cookie value along with expiration time
   */
  function setCookie(cname, cvalue) {
    document.cookie = cname + "=" + cvalue + '; path=/;';
  }
})(Drupal, drupalSettings);
