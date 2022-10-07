function init_page() {
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

function startStream() {
    var socket = io.connect('http://142.156.193.149:3000');
    socket.on('liveStream', function(url) {
        var url2 = "http://142.156.193.149:3000/";
        var url1 = url2.concat(url);
        $('#stream').attr('src', url1);
    });
    $("#camera-icon").html('check');
    socket.emit('start-stream');
}

$("#camera").click(function(event) {

    startStream();
    $("#message").text("Click the check button to stop the viewfinder.");
});

$(document).ready(function() {
    /*Initialize all materialize plugins*/
    init_page();
    M.AutoInit();
});