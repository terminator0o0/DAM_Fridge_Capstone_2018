/*Dashboard*/

function init_page() {
    $("#calendar-wrapper").hide();
    $("#settings-wrapper").hide();
    $('.materialboxed').materialbox();
    $.ajax({
        url: '../php/userInfo.php',
        type: 'POST',
        success: function(res) {
            var icon = "<i class=\"material-icons left\">person</i>"
            var userName = res.data.username;
            $(".logo-container").html(userName + icon);
        },
        error: function(res) {}
    });
}

function init_calendar() {
    $('#calendar').fullCalendar({
        locale: 'en',
        header: {
            left: 'prev next title',
            right: 'month, agendaWeek, agendaDay'
        },
        views: {
            month: {
                titleFormat: 'MMMM YYYY'
            }
        }
    })
}

function show_image() {
    $.ajax({
        url: '../php/imageLocation.php',
        type: 'POST',
        success: function(res) {
            var imageLocation = res.data.imageLocation;
            if (imageLocation != '') {
                var array = imageLocation.split('/');
                var relativeLocation = array.splice(-3).join('/');
                $("#image").attr('src', relativeLocation);
            }
            else {
                $("#viewfinder-wrapper").hide();
            }
        },
        error: function(res) {}
    });
}


function init_dataTable() {
    $('#table').DataTable({
        "processing": true,
        "serverSide": true,
        "scrollY": 200,
        "ajax" : {
            type: 'POST',
            url: '../php/userItems.php'
        }
    });
}

function userClickEvent(Event) {
    var pressed = Event.data.pressed;

    if (pressed == "calendar") {
        $(".brand-logo").text('Calendar');
        $("#table-wrapper").hide();
        $("#settings-wrapper").hide();
        $("#image-wrapper").hide();
        $("#calendar-wrapper").show();
    } else if (pressed == "settings") {
        $(".brand-logo").text('Settings');
        $("#table-wrapper").hide();
        $("#calendar-wrapper").hide();
        $("#image-wrapper").hide();
        $("#settings-wrapper").show();
    } else if (pressed == "dasboard") {
        $(".brand-logo").text('Dashboard');
        $("#calendar-wrapper").hide();
        $("#settings-wrapper").hide();
        $("#image-wrapper").show();
        $("#table-wrapper").show();
    } else {
        console.log('None pressed');
    }
}

$("#calendar-start").on("click", {
    pressed: "calendar"
}, userClickEvent);

$("#settings-start").on("click", {
    pressed: "settings"
}, userClickEvent);

$("#dashboard-start").on("click", {
    pressed: "dasboard"
}, userClickEvent);


$(document).ready(function() {
    init_page();
    init_calendar();
    init_dataTable();
    show_image();
    /*Initialize all materialize plugins*/
    M.AutoInit();
});