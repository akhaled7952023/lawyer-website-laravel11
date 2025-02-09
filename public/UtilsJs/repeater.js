// $(document).ready(function () {
//     $('.repeater-default').repeater({
//         initEmpty: false,
//         defaultValues: {
//             'link': '',
//             'icon': ''
//         },
//         show: function () {
//             $(this).slideDown();
//         },
//         hide: function (deleteElement) {
//             if (confirm("{{ __('dashboard.confirm_delete') }}")) {
//                 $(this).slideUp(deleteElement);
//             }
//         }
//     });
// });



$(document).ready(function () {
    $('.repeater-default').repeater({
        initEmpty: false,
        defaultValues: {
            'link': '',
            'icon': ''
        },
        show: function () {
            $(this).slideDown();
        },
        hide: function (deleteElement) {
            // التأكد من أن العنصر يحتوي على data-confirm-message
            var message = $(this).find('[data-confirm-message]').data('confirm-message');

            console.log(message); // عرض الرسالة في الكونسول

            if (message && confirm(message)) {
                $(this).slideUp(deleteElement);
            }
        }
    });
});
