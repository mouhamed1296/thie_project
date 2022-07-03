$(document).ready(function () {
    loadMessageNumber();
    loadSales();
    function loadMessageNumber() {
        $.ajax({
            url: 'controllers/notify.skt.php',
            type: 'GET',
            data: { notify:"notify" },
            success: function(response){
                $("#mesNotify").html(response);
            }
        });
    }
    function loadSales() {
        $.ajax({
            url: 'controllers/notify.skt.php',
            type: 'GET',
            data: { sales:"sales" },
            success: function(response){
                $("#salesNotify").html(response);
            }
        });
    }
    
    setInterval(loadSales, 5000);
    setInterval(loadMessageNumber, 5000);

});