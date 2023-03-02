// $(document).ready(function () {
//     $('#search-member').submit(function (event) {
//         event.preventDefault();
//         let search = $('#search-input').val();
//         $.ajax({
//             type: 'POST',
//             url: 'search_member.php',
//             data: {
//                 search: search
//             },
//             success: function (response) {
//                 $('#search_result').html(response); // 將搜尋結果填入搜尋結果區塊中
//             },
//             error: function () {
//                 alert('搜尋失敗'); // 錯誤處理
//             }
//         });
//     });
// });
$(document).ready(function () {
    $('#search-member').submit(function (event) { // 將表單的 id 屬性修改為 search_form
        event.preventDefault();
        let search = $('#search-input').val();
        $.ajax({
            type: 'POST',
            url: 'search_member.php',
            data: {
                search: search
            },
            success: function (response) {
                $('#search_result').html(response); // 將搜尋結果填入搜尋結果區塊中
            },
            error: function () {
                alert('搜尋失敗'); // 錯誤處理
            }
        });
    });
});
