(function ($) {
  "use strict";

  // Spinner
  var spinner = function () {
    setTimeout(function () {
      if ($("#spinner").length > 0) {
        $("#spinner").removeClass("show");
      }
    }, 1);
  };
  spinner();

  // Back to top button
  $(window).scroll(function () {
    if ($(this).scrollTop() > 300) {
      $(".back-to-top").fadeIn("slow");
    } else {
      $(".back-to-top").fadeOut("slow");
    }
  });
  $(".back-to-top").click(function () {
    $("html, body").animate({ scrollTop: 0 }, 1500, "easeInOutExpo");
    return false;
  });

  // Sidebar Toggler
  $(".sidebar-toggler").click(function () {
    $(".sidebar, .content").toggleClass("open");
    return false;
  });

  // Progress Bar
  $(".pg-bar").waypoint(
    function () {
      $(".progress .progress-bar").each(function () {
        $(this).css("width", $(this).attr("aria-valuenow") + "%");
      });
    },
    { offset: "80%" }
  );

  // Calender
  $("#calender").datetimepicker({
    inline: true,
    format: "L",
    locale: "fr-FR",

  });

  // LogOut
  $("#logout").on("click", (link) => {
    link.preventDefault();
    $("#logout-form").submit();
  });

  const loader = $("#loader");
  const form = $("#update-form");
  const questionBtn = $("#delete-response");

  //update client
  $(".update").on("click", async function (e) {
    e.preventDefault();
    $("#updateModal").modal("show");
    const id = this.dataset.id;
    try {
      const client = await fetch(`clients/${id}/edit`);
      const res = await client.json();
      if (res !== null) {
        setTimeout(() => {
          $("#loader").replaceWith(form.attr("action", `/clients/${id}`));
          $("#last_name").val(res.last_name);
          $("#first_name").val(res.first_name);
          $("#address").val(res.address);
          $("#contact").val(res.contact);
          $("#email").val(res.email);
        }, 1500);
      }
    } catch (error) {
      console.log(error);
    }
  });
  // Listen modal close event
  $("#updateModal").on("hidden.bs.modal", () => {
    $("#form").html(loader);
    form.reset()
  });

  //Delete client
  $(".delete").on("click", function (e) {
    e.preventDefault();
    const id = this.dataset.id;
    $("#updateModal").modal("show");
    setTimeout(() => {
      $("#loader").replaceWith($(questionBtn));
      $("#delete-form").attr("action", `/clients/${id}`);
    }, 1000);
  });

  $("#delete-btn").on("click", (e) => {
    e.preventDefault();
    $("#delete-form").submit();
  });

  // edit project
  $(".edit-project").on("click", async function (e) {
    e.preventDefault();
    $("#updateModal").modal("show");
    const id = this.dataset.id;
    try {
      const project = await fetch(`projects/${id}/edit`);
      const res = await project.json();
      if (res !== null) {
        setTimeout(() => {
          $("#loader").replaceWith(form.attr("action", `/projects/${id}`));
          $("#title").val(res.title);
          $("#service").prepend(`<option selected>${res.service}</option>`);
          $(`option[value=${res.service}]`).remove();
          $("#description").html(res.description);
          const imgs = JSON.parse(res.img_url);
          $("#preview").empty();
          imgs.forEach((url) =>
            $("#preview").append(
              `<div class="col-md-6 col-lg-3"><img src="${url}" width="110px" height="110px"></div>`
            )
          );
        }, 1500);
      }
    } catch (error) {
      console.log(error);
    }
  });

  // delete project
  $(".delete-project").on("click", function (e) {
    e.preventDefault();
    const id = this.dataset.id;
    $("#updateModal").modal("show");
    setTimeout(() => {
      $("#loader").replaceWith($(questionBtn));
      $("#delete-form").attr("action", `/projects/${id}`);
    }, 1000);
  });

  // delete invoice
  $(".delete-invoice").on("click", function (e) {
    e.preventDefault();
    const id = this.dataset.id;
    $("#updateModal").modal("show");
    setTimeout(() => {
      $("#loader").replaceWith($(questionBtn));
      $("#delete-form").attr("action", `/invoices/${id}`);
    }, 1000);
  });
})(jQuery);
