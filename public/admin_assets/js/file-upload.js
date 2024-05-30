(function ($) {
      "use strict";
      $(".file-upload-browse").on("click", function () {
            var fileInput = $(this)
                  .closest(".form-group")
                  .find(".file-upload-default");
            fileInput.trigger("click");
      });

      $(".file-upload-default").on("change", function () {
            var fileName = $(this).val().split("\\").pop();
            $(this)
                  .closest(".form-group")
                  .find(".file-upload-info")
                  .val(fileName);
      });
})(jQuery);
