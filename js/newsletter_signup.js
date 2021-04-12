(function (Drupal) {
  Drupal.behaviors.newsletter_signup = {
    attach( context, settings ) { 
      document.getElementById("edit-email-address").addEventListener("click", fieldInteraction, true);
      document.getElementById("edit-zip-code").addEventListener("click", fieldInteraction, true);
      document.getElementById("edit-actions-submit").addEventListener("click", newsletterSubmit, true);
    }
  };
  function fieldInteraction() {
    localStorage.setItem('NL_interaction', true);
  }
  function newsletterSubmit() {
    localStorage.setItem('NL_submit', true);
  }
})(Drupal);
