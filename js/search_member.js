$(document).ready(function () {
    $('#search-member').submit(function (event) {
        event.preventDefault();
        let search = $('#search-input').val();
        $.ajax({
            url: 'search_member.php',
            type: 'post',
            data: {
                search: search
            },
            success: function (response) {
                console.log(response);
                $('#search_result').html(response);
                $('.show-all').addClass('d-none');
            },
            error: function () {
                alert('搜尋失敗');
            }
        });
    });
});
