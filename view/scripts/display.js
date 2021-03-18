let checkBox = $('.show_button');

function display() {
    $.each(checkBox, function () {
        if($(this).prop('checked', false)) {
            $(this).parent().parent().parent().parent().remove();
        }
    })
}

display();