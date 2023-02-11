recaptcha();
function recaptcha() {
    $.getJSON("make_pic.php", (captcha) => {
        $("#pics").html("");
        $("#captcha").html("");
        $.each(captcha.captcha, (key, pic) => {
            $("#pics").append(`<img src='${pic}' data-key='${key}' class='pic'>`)
        });
        captcha.ans.forEach(a => {
            $("#captcha").append(`<span class='ans-area'>${a}</span>`)
        });
        let drag;
        $(".pic").on({
            'dragstart': (e) => {
                drag = e.target
            }
        })
        $(".ans-area").on({
            "drop": (e) => {
                $(e.currentTarget).html($(drag).clone())
            },
            "dragover": (e) => {
                e.preventDefault();
            }
        })
    })
}