$(document).ready(function () {
    $("#query").keyup(function (e) {
        e.preventDefault();
        let searchText = $(this).val();
        console.log(searchText);
        if(searchText !== '')
        {
            $.ajax({
                url: 'controllers/search.skt.php',
                method: 'post',
                data: {query: searchText},
                success: function (response) {
                    $("#show-list").html(response);
                }
            });
        }
        else{
            $("#show-list").html('');
        }
    });
    $(document).on("click", "#show-list a", function (e) {
        e.preventDefault();
        $("#query").val($(this).text());
        $("#showlist").html('');
    })
});