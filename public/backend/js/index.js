$(document).ready(function () {
    $("#myTable").DataTable({
        debug: true,
    });
});



$(".comment_status_btn").click(function () {
    var comment_status = $(this).data("comment_status");
    var comment_id = $(this).data("comment_id");
    var product_id = $(this).attr("id");
    var _token = $('input[name="_token"]').val();
    if (comment_status == 0) {
        var alert = "Đã duyệt bình luận";
    } else {
        var alert = "Chờ duyệt bình luận";
    }
    $.ajax({
        url: "/comment-status",
        method: "POST",
        data: {
            comment_status: comment_status,
            comment_id: comment_id,
            product_id: product_id,
            _token: _token,
        },
        success: function (data) {
            location.reload();
            $("#notify_comment").html(
                '<span class="text-danger"> ' + alert + "</span>"
            );
        },
    });
});

$(".btn_reply_comment").click(function () {
    var comment_id = $(this).data("comment_id");
    var comment = $(".reply_comment_" + comment_id).val();
    var product_id = $(this).data("product_id");
    var _token = $('input[name="_token"]').val();
    $.ajax({
        url: "/reply-comment",
        method: "POST",
        data: {
            comment: comment,
            comment_id: comment_id,
            product_id: product_id,
            _token: _token,
        },
        success: function (data) {
            location.reload();
            $(".reply_comment" + comment_id).val("");
            $("#notify_comment").html(
                '<span class="text-danger"> Trả lời bình luận thành công</span>'
            );
        },
    });
});

$(document).ready(function () {
    load_gallery();

    function load_gallery() {
        var product_id = $(".product_id").val();
        var _token = $('input[name="_token"]').val();

        $.ajax({
            url: "/load-gallery",
            method: "POST",
            data: {
                product_id: product_id,
                _token: _token,
            },
            success: function (data) {
                $("#gallery_load").html(data);
            },
        });
    }

    $("#file").change(function () {
        var error = "";
        var files = $("#file")[0].files;

        if (files.length > 5) {
            error += "<p>Bạn chỉ được chọn tối đa 5 ảnh</p>";
        } else if (files.length == 0) {
            error += "<p>Bạn chưa chọn ảnh</p>";
        } else if (files.size > 2000000) {
            error += "<p>Ảnh bạn chọn không được quá 2MB</p>";
        }
        if (error == "") {
        } else {
            $("#file").val("");
            $("#error_gallery").html(
                '<span class="text-danger">' + error + "</span>"
            );
        }
    });

    $(document).on("blur", ".edit_gallery_name", function () {
        var gallery_id = $(this).data("gallery_id");
        var gallery_name = $(this).text();
        var _token = $('input[name="_token"]').val();

        $.ajax({
            url: "/update-gallery-name",
            method: "POST",
            data: {
                gallery_name: gallery_name,
                gallery_id: gallery_id,
                _token: _token,
            },
            success: function (data) {
                load_gallery();
                $("#error_gallery").html(
                    '<span class="text-danger"> Cập nhật hình ảnh thành công</span>'
                );
            },
        });
    });

    $(document).on("click", ".delete_gallery", function () {
        var gallery_id = $(this).data("gallery_id");
        var _token = $('input[name="_token"]').val();
        if (confirm("Bạn có chắc muốn xóa hình ảnh này không ?")) {
            $.ajax({
                url: "/delete-gallery",
                method: "POST",
                data: {
                    gallery_id: gallery_id,
                    _token: _token,
                },
                success: function (data) {
                    load_gallery();
                    $("#error_gallery").html(
                        '<span class="text-danger"> Xóa hình ảnh thành công</span>'
                    );
                },
            });
        }
    });

    $(document).on("change", ".file_image", function () {
        var gallery_id = $(this).data("gallery_id");
        var _token = $('input[name="_token"]').val();
        var image = document.getElementById("file-" + gallery_id).files[0];

        var form_data = new FormData();
        form_data.append(
            "file",
            document.getElementById("file-" + gallery_id).files[0]
        );
        form_data.append("gallery_id", gallery_id);
        form_data.append("_token", _token);
        $.ajax({
            url: "/update-gallery-image",
            method: "POST",
            data: form_data,
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                load_gallery();
                $("#error_gallery").html(
                    '<span class="text-danger"> Cập nhật hình ảnh thành công</span>'
                );
            },
        });
    });
});

$(".update_quantity_order").click(function () {
    var order_product_id = $(this).data("product_id");
    var order_qty = $(".order_qty_" + order_product_id).val();
    var order_code = $(".order_code").val();
    var _token = $('input[name="_token"]').val();

    $.ajax({
        url: "/update-quantity-order",
        method: "POST",
        data: {
            order_qty: order_qty,
            order_product_id: order_product_id,
            order_code: order_code,
            _token: _token,
        },
        success: function (data) {
            alert("thay doi tinh trang don hang thanh cong ");
            location.reload();
        },
    });
});

$(".order_details").change(function () {
    var order_status = $(this).val();
    var order_id = $(this).children(":selected").attr("id");
    var _token = $('input[name="_token"]').val();

    //lay ra so luong
    quantity = [];
    $("input[name='product_sales_quantity']").each(function () {
        quantity.push($(this).val());
    });
    //lay ra product id
    order_product_id = [];
    $("input[name='order_product_id']").each(function () {
        order_product_id.push($(this).val());
    });
    j = 0;
    for (i = 0; i < order_product_id.length; i++) {
        //so luong khach dant
        var order_qty = $(".order_qty_" + order_product_id[i]).val();
        //so luong ton kho
        var order_qty_storage = $(
            ".order_qty_storage_" + order_product_id[i]
        ).val();

        if (parseInt(order_qty) > parseInt(order_qty_storage)) {
            j = j + 1;
            if (j == 1) {
                alert("so luong ban trong kho khong du");
            }
            $(".color_qty_" + order_product_id[i]).css("background", "#000");
        }
    }
    if (j == 0) {
        $.ajax({
            url: "/update-order-status",
            method: "POST",
            data: {
                order_status: order_status,
                order_id: order_id,
                _token: _token,
                quantity: quantity,
                order_product_id: order_product_id,
            },
            success: function (data) {
                alert("cap nhat so luong thanh cong ");
                location.reload();
            },
        });
    }
});

$(document).ready(function () {
    fetch_delivery();

    function fetch_delivery() {
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url: "/select-feeship",
            method: "POST",
            data: {
                _token: _token,
            },
            success: function (data) {
                $("#load_delivery").html(data);
            },
        });
    }

    $(document).on("blur", ".feeship_edit", function () {
        var feeship_id = $(this).data("feeship_id");
        var fee_value = $(this).text();
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url: "/update-feeship",
            method: "POST",
            data: {
                feeship_id: feeship_id,
                fee_value: fee_value,
                _token: _token,
            },
            success: function (data) {
                fetch_delivery();
            },
        });
    });

    $(".add_delivery").click(function () {
        var city = $(".city").val();
        var province = $(".province").val();
        var wards = $(".wards").val();
        var feeship = $(".feeship").val();
        var _token = $('input[name="_token"]').val();

        $.ajax({
            url: "/insert-delivery",
            method: "POST",
            data: {
                city: city,
                province: province,
                wards: wards,
                feeship: feeship,
                _token: _token,
            },
            success: function (data) {
                fetch_delivery();
            },
        });
    });
    $(".choose").on("change", function () {
        var action = $(this).attr("id");
        var matp = $(this).val();
        var _token = $('input[name="_token"]').val();
        var result = "";

        if (action == "city") {
            result = "province";
        } else {
            result = "wards";
        }
        $.ajax({
            url: "/select-delivery",
            method: "POST",
            data: {
                action: action,
                matp: matp,
                _token: _token,
            },
            success: function (data) {
                $("#" + result).html(data);
            },
        });
    });
});

ClassicEditor.create(document.querySelector("#editor_desc"), {
    ckfinder: {
        // Upload the images to the server using the CKFinder QuickUpload command.
        uploadUrl:
            "https://example.com/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images&responseType=json",
    },
})
    .then(/* ... */)
    .catch(/* ... */);
ClassicEditor.create(document.querySelector("#editor_content"));
ClassicEditor.create(document.querySelector("#editor_title"));
ClassicEditor.create(document.querySelector("#editor_map"));

function ChangeToSlug() {
    var slug;
    //Lấy text từ thẻ input title
    slug = document.getElementById("slug").value;
    slug = slug.toLowerCase();
    //Đổi ký tự có dấu thành không dấu
    slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, "a");
    slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, "e");
    slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, "i");
    slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, "o");
    slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, "u");
    slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, "y");
    slug = slug.replace(/đ/gi, "d");
    //Xóa các ký tự đặt biệt
    slug = slug.replace(
        /\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi,
        ""
    );
    //Đổi khoảng trắng thành ký tự gạch ngang
    slug = slug.replace(/ /gi, "-");
    //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
    //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
    slug = slug.replace(/\-\-\-\-\-/gi, "-");
    slug = slug.replace(/\-\-\-\-/gi, "-");
    slug = slug.replace(/\-\-\-/gi, "-");
    slug = slug.replace(/\-\-/gi, "-");
    //Xóa các ký tự gạch ngang ở đầu và cuối
    slug = "@" + slug + "@";
    slug = slug.replace(/\@\-|\-\@|\@/gi, "");
    //In slug ra textbox có id “slug”
    document.getElementById("convert_slug").value = slug;
}

