$(document).ready(function () {
    $(".btn-edit").click(function () {
        var member_id = $(this).data('id');
        $.ajax({
            url: 'get_member.php',
            type: 'GET',
            data: {
                id: member_id
            },
            dataType: 'json',
            success: function (response) {
                console.log(response);
                $("#name").val(response[0].user);
                $("#user_name").val(response[0].user_name);
                $("#pw").val(response[0].pw);
                $("#id").val(response[0].id);
                $("#edit").modal('show');
            }
        });
    });
});
