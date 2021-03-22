let checkBox = $('.show_button');
let buttonList = $('.section_show_more');
let deleteUser = $('.account_delete');
let buttonLink = $('.linkDoc');
let choiceCat = $('#choiceCat');
let divUser = $('.accounts_results');
let deleteDocument = $('.button_delete');

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
    $(this).parent().parent().parent().find('.section_documents').toggle();
})

// Create a window for confirm delete user
function confirmWindow(id, table, doc) {
    $("body").append("<div id='confirm'><div id='textConfirm'>Voulez-vous vraiment delete l'utilisateur?</div><a href='../delete.php?id=" + id + "&table=" + table +"&doc=" + doc +"'>" +
        "<button>Confirmer</button></a><a><button id='cancelUser'>Annuler</button></a></div>");
    let div = $('#confirm');
    let subDiv = $('#textConfirm');
    let cancel = $('#cancelUser');

    div.css({
        width: "40%",
        height: "150px",
        position: "absolute",
        top: "10%",
        left: "30%",
        border: "4px solid #ff4757",
        display: "flex",
        flexWrap: "wrap",
        justifyContent: "space-evenly",
        boxShadow: "0 0 0.5rem #ff4757"
    });

    subDiv.css({
        width: "100%",
        textAlign: "center",
        fontSize: "2rem",
        paddingTop: "2%",
    })

    cancel.addClass('button_delete');

    deleteUser.off('click');
    deleteDocument.off('click');

    cancel.click(function() {
        $('#confirm').remove();
        deleteUser.click(function () {
            confirmWindow();
        });
        deleteDocument.click(function () {
            confirmWindow();
        });
    })
}

deleteUser.click(function () {
    confirmWindow($(this).val(), "User", "administratif.php");
});

deleteDocument.click(function () {
    confirmWindow($(this).val(), "Document", $(this).attr('data-doc'));
})

buttonLink.click(function () {
    let link = $(this).attr("data-href");

    if(link.includes("https")) {
        $(this).attr("href", link);
    }
    else {
        let type = $(this).attr("data-type");
        link = "../file/" + type + "/" + link;
        $(this).attr("href", link);
    }
})

choiceCat.on('change', function () {
    divUser.each(function () {
        if(choiceCat.val() === "tous") {
            $(this).show();
        }

        else if(choiceCat.val() === $(this).attr('data-role')) {
            $(this).show();
        }
        else {
            $(this).hide();
        }
    })
})