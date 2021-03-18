let checkBox = $('.show_button');

checkBox.click(function () {
    let id = $(this).val();
    let check = 0;
    if($(this).prop("checked")) {
        check = 1;
    }

    $.ajax({
        type: "POST",
        url: '../update.php',
        data: "checkId=" + id + "&checkValue=" + check,
        dataType: "html"
    });
})