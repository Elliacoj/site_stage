let checkBox = $('.show_button');

checkBox.click(function () {
    let name = $(this).parent().parent().parent().first().text();

    let check = 0;
    if($(this).prop("checked")) {
        check = 1;
    }

    $.ajax({
        type: "POST",
        url: '../update.php',
        data: "nameTitle=" + name + "&checkValue=" + check,
        dataType: "html"
    });
})