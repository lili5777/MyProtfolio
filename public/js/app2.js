AOS.init({
    duration: 1000,
});

$(document).ready(function () {
    // Toggle sidebar on mobile
    $("#menu-toggle").click(function () {
        $(".sidebar").addClass("active");
    });

    $("#sidebar-close").click(function () {
        $(".sidebar").removeClass("active");
    });

    // Active menu item
    $(".sidebar-menu li a").click(function () {
        $(".sidebar-menu li a").removeClass("active");
        $(this).addClass("active");
    });

    // Profile modal functionality
    const modal = $("#profile-modal");
    const openModalBtns = $(".edit-btn, #avatar-edit-btn");
    const closeModalBtn = $("#modal-close, #cancel-btn");

    openModalBtns.click(function () {
        modal.addClass("active");
        $("body").css("overflow", "hidden");
    });

    closeModalBtn.click(function () {
        modal.removeClass("active");
        $("body").css("overflow", "auto");
    });

    // Close modal when clicking outside
    $(document).mouseup(function (e) {
        if (
            !$(e.target).closest(".modal-container").length &&
            modal.hasClass("active")
        ) {
            modal.removeClass("active");
            $("body").css("overflow", "auto");
        }
    });

    // Preview image when selected
    $("#avatar-upload").change(function () {
        if (this.files && this.files[0]) {
            const reader = new FileReader();
            reader.onload = function (e) {
                $("#avatar-preview").attr("src", e.target.result);
                $("#profile-avatar").attr("src", e.target.result);
            };
            reader.readAsDataURL(this.files[0]);
        }
    });

    // Smooth scroll for modal content
    $(".modal-body").on("scroll", function () {
        if ($(this).scrollTop() > 10) {
            $(".modal-header").css("box-shadow", "0 2px 10px rgba(0,0,0,0.1)");
        } else {
            $(".modal-header").css("box-shadow", "none");
        }
    });
});
