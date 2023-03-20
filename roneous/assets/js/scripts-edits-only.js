(function ($) {
  "use strict";

  /* GLOBAL VARIABLES - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - */
  var $window = $(window),
    tlg_nav_show = false,
    tlg_nav_hide = false,
    tlg_nav_fixed = false,
    tlg_nav,
    tlg_nav_height,
    tlg_first_section_height,
    tlg_top_offset = 0,
    tlg_cart_timeout;

  /* PROJECT FILTER - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - */
  //Added script
  //  jQuery('.projects.showcase').each(function() {
  jQuery(".projects").each(function () {
    //Changed from .projects.showcase to .projects for the creative writing page to work
    var filters = "";
    jQuery(this)
      .find(".project")
      .each(function () {
        if (jQuery(this).attr("data-filter")) {
          var filterTags = jQuery(this).attr("data-filter").split(",");
          var filterAll = true;
          var filterActive = "";
          var tagRealName = "";
          filterTags.forEach(function (tagName) {
            if (filterAll) {
              filterActive = " active ";
              filterAll = false;
            } else {
              filterActive = "";
            }
            if (filters.indexOf(tagName) == -1) {
              tagRealName = tagName;
              if (filterActive) tagName = "All";
              var charMap = {
                Ç: "C",
                Ö: "O",
                Ş: "S",
                İ: "I",
                I: "i",
                Ü: "U",
                Ğ: "G",
                ç: "c",
                ö: "o",
                ş: "s",
                ı: "i",
                ü: "u",
                ğ: "g",
              };
              var str_array = tagName.split("");
              for (var i = 0, len = str_array.length; i < len; i++) {
                str_array[i] = charMap[str_array[i]] || str_array[i];
              }
              tagName = str_array.join("");
              tagName = tagName.replace(/[çöşüğı]/gi, "");
              filters +=
                '<li class="filter' +
                filterActive +
                '" data-group="' +
                tagName
                  .replace(/[^a-zA-Z0-9\s]/g, "")
                  .toLowerCase()
                  .replace(/\s/g, "-") +
                '">' +
                tagRealName +
                "</li>";
            }
          });
        }
        jQuery(this)
          .closest(".projects")
          .find("ul.filters")
          .empty()
          .append(filters);
      });
  });

  jQuery(".project-content").each(function () {
    var $gridID = jQuery(this).attr("data-id");
    var $grid = jQuery("#" + $gridID);
    $grid.on("done.shuffle", function () {
      jQuery(".masonry-loader").addClass("fadeOut");
      $grid.addClass("active");
    });
    $grid.shuffle({
      speed: 600,
      easing: "cubic-bezier(0.785, 0.135, 0.15, 0.86)",
      itemSelector: ".project",
    });
    jQuery(document).on(
      "click",
      "ul[data-project-id='" + $gridID + "'] li",
      function (e) {
        e.preventDefault();
        jQuery("ul[data-project-id='" + $gridID + "'] li").removeClass(
          "active"
        );
        jQuery(this).addClass("active");
        $grid.shuffle("shuffle", jQuery(this).attr("data-group"));
      }
    );
  });
});

jQuery(document).ready(function () {
  // READY EVENT
  "use strict";

  /* MOBILE NAVIGATION - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - */
  jQuery(document).on("click", ".mobile-toggle", function (e) {
    jQuery(".nav-bar").toggleClass("nav-open");
    jQuery(this).toggleClass("active");
    if (!tlg_nav_fixed) {
      tlg_nav_fixed = true;
      tlg_nav.addClass("fixed");
    }
  });
  if (jQuery(window).width() < 991) {
    var clickBtn = false; //Added to keep from clicking first button
    jQuery(document).on("click", ".menu li", function (e) {
      if (!e) e = window.event;
      e.stopPropagation();
      if (clickBtn == false) {
        // Checks to see if button has been clicked once and opens sub-menu
        if (
          jQuery(this).find(">a").is('[href*="#"]') ||
          ("yes" == wp_data.roneous_menu_open &&
            jQuery(this).hasClass("menu-item-has-children"))
        ) {
          e.preventDefault();
        }
      } //Closed new clickBtn if statement
      clickBtn = true; //Adds this so the main menu item can be clicked - sub-menu will not reopen again

      if (jQuery(this).find("ul").length) {
        jQuery(this).toggleClass("toggle-sub");
      } else {
        jQuery(this).parents(".toggle-sub").removeClass("toggle-sub");
      }
    });
  }
  jQuery(document).on("click", ".module.widget-wrap", function (e) {
    jQuery(this).toggleClass("toggle-widget-wrap");
  });
  jQuery(document).on("click", ".module.widget-wrap .search a", function (e) {
    e.preventDefault();
  });
  jQuery(document).on(
    "click",
    ".search-widget-wrap .search-form input",
    function (e) {
      if (!e) e = window.event;
      e.stopPropagation();
    }
  );
})(jQuery); // END SCRIPT
