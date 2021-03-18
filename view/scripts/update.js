let checkBox = $('.show_button');
let buttonListe = $('.section_show_more');

$('.section_documents').each(function() {
    $(this).hide();
});

checkBox.click(function () {
    let id = $(this).val();
    let check = 0;
    let table;
    if($(this).prop("checked")) {
        check = 1;
    }
    if($(this).parent().parent().parent().parent().hasClass("section_type")) {
        table = "Category";
    }
    else {
        table = "Document";
    }


    $.ajax({
        type: "POST",
        url: '../update.php',
        data: "checkId=" + id + "&checkValue=" + check + "&checkTable=" + table,
        dataType: "html"
    });
})

buttonListe.click(function () {

    $(this).parent().parent().find('.section_documents').toggle();
})