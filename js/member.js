$(document).ready(function () {
    $(".btn-edit").click(function () {
        let member_id = $(this).data('id');
        $.ajax({
            url: 'get_member.php',
            type: 'GET',
            data: {
                id: member_id
            },
            dataType: 'json',
            success: function (response) {
                // console.log(response);
                $("#user").val(response[0].user);
                $("#user_name").val(response[0].user_name);
                $("#pw").val(response[0].pw);
                $("#id").val(response[0].id);
                $("#edit").modal('show');
            }
        });
    });
    $("#save").click(function () {
        let user = $("#user").val();
        let user_name = $("#user_name").val();
        let pw = $("#pw").val();
        let id = $("#id").val();

        let data = {
            user: user,
            user_name: user_name,
            pw: pw,
            id: id
        };

        $.ajax({
            url: "save_member.php",
            type: "POST",
            data: JSON.stringify(data),
            contentType: "application/json",
            success: function (response) {
                // console.log('Success: ' + response);
                alert('儲存成功');
                window.location.reload();
            }
        });
    });
});