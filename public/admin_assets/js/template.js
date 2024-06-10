document.addEventListener("DOMContentLoaded", function () {
      "use strict";

      var body = document.querySelector("body");
      var sidebar = document.querySelector(".sidebar");

      function addActiveClass(element) {
            if (element && element.getAttribute("href") !== undefined) {
                  var currentUrl = window.location.href.split("?")[0];
                  var elementUrl = element.href.split("?")[0];

                  if (currentUrl === elementUrl) {
                        element.closest(".nav-item").classList.add("active");

                        if (element.closest(".sub-menu")) {
                              element
                                    .closest(".collapse")
                                    .classList.add("show");
                              element.classList.add("active");
                        }
                        if (element.closest(".submenu-item")) {
                              element.classList.add("active");
                        }
                  }
            }
      }

      document
            .querySelectorAll(".nav li a", sidebar)
            .forEach(function (element) {
                  addActiveClass(element);
            });

      document
            .querySelectorAll(".horizontal-menu .nav li a")
            .forEach(function (element) {
                  addActiveClass(element);
            });

      sidebar.addEventListener("show.bs.collapse", function (event) {
            if (event.target.classList.contains("collapse")) {
                  document
                        .querySelectorAll(".collapse.show", sidebar)
                        .forEach(function (element) {
                              element.classList.remove("show");
                        });
            }
      });

      applyStyles();

      function applyStyles() {
            if (!body.classList.contains("rtl")) {
                  if (
                        document.querySelector(
                              ".settings-panel .tab-content .tab-pane.scroll-wrapper"
                        )
                  ) {
                        new PerfectScrollbar(
                              ".settings-panel .tab-content .tab-pane.scroll-wrapper"
                        );
                  }
                  if (document.querySelector(".chats")) {
                        new PerfectScrollbar(".chats");
                  }
                  if (body.classList.contains("sidebar-fixed")) {
                        if (document.querySelector("#sidebar")) {
                              new PerfectScrollbar("#sidebar .nav");
                        }
                  }
            }
      }

      document
            .querySelectorAll('[data-bs-toggle="minimize"]')
            .forEach(function (element) {
                  element.addEventListener("click", function () {
                        if (
                              body.classList.contains(
                                    "sidebar-toggle-display"
                              ) ||
                              body.classList.contains("sidebar-absolute")
                        ) {
                              body.classList.toggle("sidebar-hidden");
                        } else {
                              body.classList.toggle("sidebar-icon-only");
                        }
                  });
            });

      document
            .querySelectorAll(".form-check label,.form-radio label")
            .forEach(function (element) {
                  var span = document.createElement("i");
                  span.classList.add("input-helper");
                  element.appendChild(span);
            });

      document
            .querySelectorAll('[data-toggle="horizontal-menu-toggle"]')
            .forEach(function (element) {
                  element.addEventListener("click", function () {
                        document
                              .querySelector(".horizontal-menu .bottom-navbar")
                              .classList.toggle("header-toggled");
                  });
            });

      var navItemClicked = document.querySelectorAll(
            ".horizontal-menu .page-navigation > .nav-item"
      );
      navItemClicked.forEach(function (element) {
            element.addEventListener("click", function () {
                  if (window.matchMedia("(max-width: 991px)").matches) {
                        if (!element.classList.contains("show-submenu")) {
                              navItemClicked.forEach(function (item) {
                                    item.classList.remove("show-submenu");
                              });
                        }
                        element.classList.toggle("show-submenu");
                  }
            });
      });

      window.addEventListener("scroll", function () {
            if (window.matchMedia("(min-width: 992px)").matches) {
                  var header = document.querySelector(".horizontal-menu");
                  if (window.scrollY >= 70) {
                        header.classList.add("fixed-on-scroll");
                  } else {
                        header.classList.remove("fixed-on-scroll");
                  }
            }
      });

      if (document.querySelector("#datepicker-popup")) {
            var datepickerPopup = document.querySelector("#datepicker-popup");
            new Datepicker(datepickerPopup, {
                  enableOnReadonly: true,
                  todayHighlight: true,
            });
            datepickerPopup.setDate(new Date());
      }

      document
            .querySelector("#check-all")
            .addEventListener("click", function () {
                  document
                        .querySelectorAll(".form-check-input")
                        .forEach(function (checkbox) {
                              checkbox.checked = this.checked;
                        }, this);
            });

      document
            .querySelector("#navbar-search-icon")
            .addEventListener("click", function () {
                  document.querySelector("#navbar-search-input").focus();
            });

      window.addEventListener("scroll", function () {
            var scroll = window.scrollY;
            var fixedTop = document.querySelector(".fixed-top");
            if (scroll >= 97) {
                  fixedTop.classList.add("headerLight");
            } else {
                  fixedTop.classList.remove("headerLight");
            }
      });
});
