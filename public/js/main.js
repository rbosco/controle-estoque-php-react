$(function () {
    BASE = $("link[rel='base']").attr("href");

    var fnFormSubmit = function (e) {
        e.preventDefault();

        var Form = $(this);
        var url = null;
        var action = $("input[name='callback']", $(this)).val();
        var formData = new FormData();
        var func = $("input[name='func']", $('body')).val();

        if (func !== 'undefined') {
            var url = [BASE, func, action].join('/');
        } else {
            var url = [BASE, action].join('/');
        }

        Form.find("input[type='submit']").prop("disabled", true);

        $.map(Form.serializeArray(), function (n, i) {
            formData.append("data[" + n["name"] + "]", n["value"]);
        });
        formData.append("callback", action);

        $.ajax({
            url: url,
            data: formData,
            dataType: 'json',
            type: 'POST',
            cache: false,
            processData: false,
            contentType: false,
            success: function (data) {
                if (data.message) {
                    swal({
                        title: "Uhuuul!",
                        text: data.message,
                        icon: data.type,
                    }).then(function (isConfirm) {
                        if (isConfirm) {
                            if (data.reload) {
                                window.location.reload();
                            }
                        }
                    })
                }
            },
            error: function (error) {
                console.log(error);
            }
        });
    }

    var fnEdit = function () {
        var id = $(this).data('id');
        var url = null;
        var callback = $(this).data('action');
        var func = $("input[name='func']", $('body')).val();

        if (func !== 'undefined') {
            var url = [BASE, func, callback, id].join('/');
        } else {
            var url = [BASE, callback, id].join('/');
        }

        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'JSON',
            success: function (data) {
                if (data.data) {
                    $.each(data.data, function (index, value) {
                        $('input[name="' + index + '"]', 'body').val(value);
                        $('select[name="' + index + '"]', 'body').val(value).trigger('change');
                    });
                }
            },
            error: function (error) {
                console.log(error);
            }
        });
    }

    var fnDelete = function () {
        var id = ($(this).data('id') > 0) ? $(this).data('id') : $('input[name="id"]', 'form').val();
        var callback = $(this).data('action');
        var func = $("input[name='func']", $('body')).val();
        if (func !== 'undefined') {
            var url = [BASE, func, callback, id].join('/');
        } else {
            var url = [BASE, callback, id].join('/');
        }

        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'JSON',
            success: function (data) {
                if (data.message) {
                    swal({
                        title: "Uhuuul!",
                        text: data.message,
                        icon: data.type,
                    }).then(function (isConfirm) {
                        if (isConfirm) {
                            if (data.reload) {
                                window.location.reload();
                            }
                        }
                    })
                }
            },
            error: function (error) {
                console.log(error);
            }
        });
    }

    var fnSearch = function () {

        // Search Text
        var search = $(this).val();
        
        // Hide all table tbody rows
        $('table tbody tr').hide();

        // Count total search result
        var len = $('table tbody tr:not(.notfound) td:contains("' + search + '")').length;

        if (len > 0) {
            // Searching text in columns and show match row
            $('table tbody tr:not(.notfound) td:contains("' + search + '")').each(function () {
                $(this).closest('tr').show();
            });
        } else {
            $('.notfound').show();
        }
    }

    $(".form-product").on("submit", "form", fnFormSubmit);
    $(".form-categoria").on("submit", "form", fnFormSubmit);
    $(".form-search").on("keyup", "input[name='search']", fnSearch);
    $('body').on('click', '.btn_edit', fnEdit);
    $('body').on('click', '.btn_delete', fnDelete);
});