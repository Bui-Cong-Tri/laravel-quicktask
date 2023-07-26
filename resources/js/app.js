import "./bootstrap";

import $ from "jquery";
window.$ = window.jQuery = $;

import "jquery-ui/ui/widgets/datepicker.js";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

$("[data-confirm]").on("click", function (e) {
    var message = $(this).data("confirm");

    if (!confirm(message)) {
        e.preventDefault();
        e.stopImmediatePropagation();
    }
});
