$(document).ready(function () {
    $("form").submit(function () {
        // Добавление решётки к имени ID
        var formNm = $(this);
        $.ajax({
            type: "POST",
            url: $(this).attr('action'),
            data: formNm.serialize(),
            success: function (data) {
                // Вывод текста результата отправки
                formNm.html(data);
            },
            error: function (jqXHR, text, error) {
                // Вывод текста ошибки отправки
                formNm.html(error);
            }
        });
        return false;
    });
});