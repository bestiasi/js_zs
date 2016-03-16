/*
 *  Developed by Stefan Matei - stev.matei@gmail.com
 */


var chosenStand = [];
function clickOnStand() {
    $('#stands_map').on('click', '.stand', function () {
        chosenStand = $(this).data('name');
        $("#chosen_stand").html($(this).data('name'));
    });
}

function submitReserve(url) {
    $('#submit_reserve').click(function (e) {
        e.preventDefault();

        $.ajax({
            url: url,
            data: {stand: chosenStand},
            type: 'POST'
        })
                .done(function (data) {
                    alert('Success');
                    location.reload();
                })
                .fail(function (jqXHR, textStatus, errorThrown) {
                    alert(jqXHR.responseJSON.message);
                });
    });
}

function disableReservedStands(reservedStands, ownStand) {
    $.each(reservedStands, function (k, data) {
        $('#stand_' + data.name).removeClass('stand');
        $('#stand_' + data.name).css('background', 'gray');
    });

    if (ownStand) {
        $('#stand_' + ownStand.name).removeClass('stand');
        $('#stand_' + ownStand.name).css('background', 'green');
    }
}