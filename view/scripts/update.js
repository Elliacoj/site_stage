let checkBox = $('.show_button');
let buttonList = $('.section_show_more');
let buttonDelete = $('.account_delete');

$('.section_documents').each(function() {
    $(this).hide();
});

// Function for send in php check for checkbox
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

// Function for switch the display
buttonList.click(function () {
    $(this).parent().parent().find('.section_documents').toggle();
})

// Create a window for confirm delete user
function confirmWindow(id) {
    $("body").append("<div id='confirm'><div id='textConfirm'>Voulez-vous vraiment delete l'utilisateur?</div><a href='../delete.php?id=" + id + "'><button>Confirmer</button></a><a href=''><button id='cancel'>Annuler</button></a></div>");
    let div = $('#confirm');
    let subDiv = $('#textConfirm');
    let cancel = $('#cancel');

    div.css({
        width: "40%",
        height: "150px",
        position: "absolute",
        top: "10%",
        left: "30%",
        border: "1px solid black",
        display: "flex",
        flexWrap: "wrap",
        justifyContent: "space-evenly",
        boxShadow: "2px 2px 9px darkgray",
        borderRadius: "3px"
    });

    subDiv.css({
        width: "100%",
        textAlign: "center",
        fontSize: "2rem",
        paddingTop: "2%",
    })

    buttonDelete.off('click');

    cancel.click(function() {
        $('#confirm').remove();
        buttonDelete.click(function () {
            confirmWindow();
        });
    })
}

buttonDelete.click(function () {
    confirmWindow($(this).val());
});

