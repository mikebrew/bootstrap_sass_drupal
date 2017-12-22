(function ($) {
  $(document).ready(function() {

    // Clipboard and Email buttons for territory
    new Clipboard('.copy-btn');

    // $( ".form-item-this-shortened" ).addClass( "input-group" );
    $( ".form-item-this-shortened" ).wrapInner( '<div class="input-group"></div>' );
    $( "#edit-this-shortened" ).after('' +
      '<span class="input-group-btn">' +
        '<span class="a2a_kit a2a_kit_size_24 btn btn-primary btn-lg">' +
          '<a class="a2a_button_email" href="/#email"></a>' +
        '</span>' +
        '<button class="btn btn-primary btn-lg copy-btn" type="button" data-clipboard-target="#edit-this-shortened" aria-hidden="true">' +
          'Copy ' +
          '<span class="glyphicon glyphicon-copy" aria-hidden="true"></span>' +
        '</button>' +
      '</span>');

    // Get URL Parameters
    function getParameterByName(name, url) {
      if (!url) url = window.location.href;
      name = name.replace(/[\[\]]/g, "\\$&");
      var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
          results = regex.exec(url);
      if (!results) return null;
      if (!results[2]) return '';
      return decodeURIComponent(results[2].replace(/\+/g, " "));
    }
    var terrreturn = getParameterByName('terrreturn');

    if(window.location.href.indexOf("terrreturn=true") > -1) {
       $(".field-name-field-teritory-assign-expire").addClass("hidden");
    }

    // change button text
    // $('#edit-field-smpw-dates-available-fc .field-add-more-submit').text('Add Available Day');

    // Add class to logo header
    $(".navbar-header").addClass("col-md-2");

    // Remove .menu class from footer
    $("#block-menu-menu-footer-menu ul").removeClass("menu nav");

    // Blog breadcrumb, hide users blog link
    $( ".node-type-blog ol.breadcrumb li:nth-child(2)" ).addClass("hidden");

    // Switch out default button to primary style on all webforms
    $(".webform-submit").removeClass("btn-default").addClass("btn-primary btn-lg");

  }); // end document.ready
})(jQuery);
