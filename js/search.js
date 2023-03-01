$(document).ready(function() {
    // 當表單提交時
    $('#search-form').submit(function(event) {
        // 防止表單的預設提交行為
        event.preventDefault();
        
        // 獲取用戶輸入的關鍵字和價格範圍
        var search = $('#search-input').val();
        var minPrice = $('#min-price-input').val();
        var maxPrice = $('#max-price-input').val();
        
        // 發送 Ajax 請求
        $.ajax({
            url: 'search.php',
            type: 'post',
            data: {
                search: search,
                min_price: minPrice,
                max_price: maxPrice
            },
            success: function(response) {
                // 在網頁上顯示查詢結果
                $('#result').html(response);
            }
        });
    });
});
