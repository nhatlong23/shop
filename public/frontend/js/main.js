/*scroll to top*/

$(document).ready(function () {
    $(function () {
        $.scrollUp({
            scrollName: "scrollUp", // Element ID
            scrollDistance: 300, // Distance from top/bottom before showing element (px)
            scrollFrom: "top", // 'top' or 'bottom'
            scrollSpeed: 300, // Speed back to top (ms)
            easingType: "linear", // Scroll to top easing (see http://easings.net/)
            animation: "fade", // Fade, slide, none
            animationSpeed: 200, // Animation in speed (ms)
            scrollTrigger: false, // Set a custom triggering element. Can be an HTML string or jQuery object
            //scrollTarget: false, // Set a custom target element for scrolling to the top
            scrollText: '<i class="fa fa-angle-up"></i>', // Text for element, can contain HTML
            scrollTitle: false, // Set a custom <a> title if required.
            scrollImg: false, // Set true to use image
            activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
            zIndex: 2147483647, // Z-Index for the overlay
        });
    });
});

//-----JS for Price Range slider-----




$(document).ready(function() {
    $('#sort').on('change', function() {
        var url = $(this).val();
        if (url) {
            window.location = url;
        }
        return false;
    });
});




function view() {
    var wishlist = JSON.parse(localStorage.getItem('wishlist'));

    if (Array.isArray(wishlist) && wishlist.length > 0) {
        wishlist.reverse();
        document.getElementById('row_wishlist').style.overflow = 'scroll ';
        document.getElementById('row_wishlist').style.height = '600px ';

        for (var i = 0; i < wishlist.length; i++) {
            var id = wishlist[i].id;
            var name = wishlist[i].name;
            var price = wishlist[i].price;
            var image = wishlist[i].image;
            var url = wishlist[i].url;
            var row = '<div class="row" id="wishlist_' + id +
                '" style="margin:10px 0"><div class="col-md-4"><img width="100%" src="' +
                image + '"></div><div class="col-md-8 info_wishlist"><p>' + name + '</p><p style="color:#FE980F">' +
                price + '</p><a href="' + url +
                '">Dat hang</a></div><button class="btn btn-danger" onclick="remove_wishlist(\'' + id +
                '\')" style="background-color: #dc3545; color: #fff; border-color: #dc3545; padding: 5px 10px; border-radius: 3px;">Xóa</button></div>';
            $('#row_wishlist').append(row);
        }

        document.querySelector('.brands_products').style.display = 'block';
    } else {
        document.querySelector('.brands_products').style.display = 'none';
    }
}

function remove_wishlist(id) {
    var old_data = JSON.parse(localStorage.getItem('wishlist'));
    for (var i = 0; i < old_data.length; i++) {
        if (old_data[i].id == id) {
            old_data.splice(i, 1);
            break;
        }
    }
    localStorage.setItem('wishlist', JSON.stringify(old_data));
    $('#wishlist_' + id).remove();
}
window.onload = function() {
    view();
};



function add_wishlist(clicked_id) {
    var id = clicked_id;
    var name = document.getElementById('wistlist_productname' + id).value;
    var price = document.getElementById('wistlist_productprice' + id).value;
    var image = document.getElementById('wistlist_productimage' + id).src;
    var url = document.getElementById('wistlist_producturl' + id).href;
    var _token = $('input[name="_token"]').val();

    var newItem = {
        id: id,
        name: name,
        price: price,
        image: image,
        url: url
    };
    if (localStorage.getItem('wishlist') == null) {
        localStorage.setItem('wishlist', '[]');
    }
    var old_data = JSON.parse(localStorage.getItem('wishlist'));
    var matches = $.grep(old_data, function(obj) {
        return obj.id == id;
    });
    if (matches.length) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Sản phẩm đã có trong danh sách yêu thích',
        })
    } else {
        old_data.push(newItem);
        localStorage.setItem('wishlist', JSON.stringify(old_data));
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Đã thêm sản phẩm vào danh sách yêu thích',
            showConfirmButton: false,
            timer: 1500
        });
        var row = '<div class="row" id="wishlist_' + id +
            '" style="margin:10px 0"><div class="col-md-4"><img width="100%" src="' +
            image + '"></div><div class="col-md-8 info_wishlist"><p>' + name + '</p><p style="color:#FE980F">' +
            price + '</p><a href="' + url +
            '">Dat hang</a></div><button class="btn btn-danger" onclick="remove_wishlist(\'' + id +
            '\')" style="background-color: #dc3545; color: #fff; border-color: #dc3545; padding: 5px 10px; border-radius: 3px;">Xóa</button></div>';
        $('#row_wishlist').append(row);
    }
}



$(document).ready(function() {
    $('.tabs_product').click(function() {
        var cate_id = $(this).data('id');
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url: '/tabs-product',
            method: 'POST',
            data: {
                _token: _token,
                cate_id: cate_id
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                $('#tabs_product').html(data);
            }
        });
    });

    setTimeout(function() {
        var link = $('#myTab li:first-child a').tab('show');
        if (link) {
            link.click();
        }
    }, 100); // 100 ms delay
});



function remove_background(product_id) {
    for (var count = 1; count <= 5; count++) {
        $('#' + product_id + '-' + count).css('color', '#ccc');
    }
}
//hover chuot danh gia sao
$(document).on('mouseenter', '.rating', function() {
    var index = $(this).data("index");
    var product_id = $(this).data('product_id');
    remove_background(product_id);
    for (var count = 1; count <= index; count++) {
        $('#' + product_id + '-' + count).css('color', '#ffcc00');
    }
});
//nha chuot khong danh gia
$(document).on('mouseleave', '.rating', function() {
    var index = $(this).data("index");
    var product_id = $(this).data('product_id');
    var rating = $(this).data("rating");
    remove_background(product_id);

    for (var count = 1; count <= rating; count++) {
        $('#' + product_id + '-' + count).css('color', '#ffcc00');
    }
});

//click danh gia sao
$(document).on('click', '.rating', function() {
    var index = $(this).data("index");
    var product_id = $(this).data('product_id');
    var _token = $('input[name="_token"]').val();

    $.ajax({
        url: '/insert-rating',
        method: 'POST',
        data: {
            index: index,
            product_id: product_id,
            _token: _token
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(data) {
            if (data == 'done') {
                alert("Bạn đã đánh giá " + index + " trên 5");
                location.reload();
            } else if (data == 'exist') {
                alert("Bạn đã đánh giá sản phẩm này rồi,cảm ơn bạn nhé");
            } else {
                alert("Lỗi đánh giá");
            }
        }
    });
});



$(document).ready(function() {
    load_comment();

    function load_comment() {
        var product_id = $('.comment_product_id').val();
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url: '/load-comment',
            method: 'POST',
            data: {
                _token: _token,
                product_id: product_id
            },
            success: function(data) {
                $('#comment_load').html(data);
            }
        });
    }

    $('.send-comment').click(function() {
        var product_id = $('.comment_product_id').val();
        var comment_name = $('.comment_name').val();
        var comment_content = $('.comment_content').val();
        var _token = $('input[name="_token"]').val();

        $.ajax({
            url: '/send-comment',
            method: 'POST',
            data: {
                _token: _token,
                product_id: product_id,
                comment_name: comment_name,
                comment_content: comment_content
            },
            success: function(data) {
                $('#notify_comment').html(
                    '<p class="text text-success">Gửi bình luận thành công, chờ kiểm duyệt</p>'
                )
                load_comment();
                $('#notify_comment').fadeOut(3000);
                $('.comment_name').val('');
                $('.comment_content').val('');
            }
        });
    });
});



$('.quickview').click(function() {
    var product_id = $(this).data('id_product');
    var _token = $('input[name="_token"]').val();
    $.ajax({
        url: '/quickview',
        method: 'POST',
        dataType: 'JSON',
        data: {
            _token: _token,
            product_id: product_id
        },
        success: function(data) {
            $('#product_quickview_title').html(data.product_name);
            $('#product_quickview_id').html(data.product_id);
            $('#product_quickview_price').html(data.product_price);
            $('#product_quickview_image').html(data.product_image);
            $('#product_quickview_gallery').html(data.product_gallery);
            $('#product_quickview_desc').html(data.product_desc);
            $('#product_quickview_content').html(data.product_content);
            $('#product_quickview_button').html(data.product_button);
            $('#product_quickview_qty').html(data.product_qty);
            $('#product_quickview_value').html(data.product_quickview_value);
        }
    });
});


$(document).ready(function() {
    $('#timkiem').keyup(function() {
        $('#result').html('');
        var search = $('#timkiem').val();
        if (search != '') {
            $('#result').css('display', 'none');
            var expression = new RegExp(search, "i");
            $.getJSON('json/product.json', function(data) {
                $.each(data, function(key, value) {
                    if (value.product_name.search(expression) != -1) {
                        $('#result').css('display', 'inherit');
                        $('#result').append(
                            '<li class="list-group-item" style="cursor: pointer"> <img class="img-thumbnail" height="40" width="40" src="uploads/product/' +
                            value.product_image + '">' + value.product_name +
                            ' </li>');
                    }
                });
            });
        } else {
            $('#result').css('display', 'none');
        }
    })
    $('#result').on('click', 'li', function() {
        var click_text = $(this).text().split('|');
        $('#timkiem').val($.trim(click_text[0]));
        $('#result').html('');
        $('#result').css('display', 'none');
    });
})



$(document).ready(function() {
    $('#imageGallery').lightSlider({
        gallery: true,
        item: 1,
        loop: true,
        thumbItem: 9,
        slideMargin: 0,
        enableDrag: false,
        currentPagerPosition: 'left',
        onSliderLoad: function(el) {
            el.lightGallery({
                selector: '#imageGallery .lslide'
            });
        }
    });
});



$(document).ready(function() {
    $('.add-to-cart').click(function() {
        var id = $(this).data('id_product');
        var cart_product_id = $('.cart_product_id_' + id).val();
        var cart_product_name = $('.cart_product_name_' + id).val();
        var cart_product_image = $('.cart_product_image_' + id).val();
        var cart_product_price = $('.cart_product_price_' + id).val();
        var cart_product_qty = $('.cart_product_qty_' + id).val();
        var cart_product_quantity = $('.cart_product_quantity_' + id).val();
        var _token = $('input[name="_token"]').val();
        if (parseInt(cart_product_qty) > parseInt(cart_product_quantity)) {
            alert('Sản phẩm' + ' ' + cart_product_name + ' ' + 'chỉ còn' + ' ' +
                cart_product_quantity + ' ' + 'sản phẩm');
        } else {
            $.ajax({
                url: '/add-cart-ajax',
                method: 'POST',
                data: {
                    _token: _token,
                    cart_product_id: cart_product_id,
                    cart_product_name: cart_product_name,
                    cart_product_image: cart_product_image,
                    cart_product_price: cart_product_price,
                    cart_product_qty: cart_product_qty,
                    cart_product_quantity: cart_product_quantity
                },
                success: function(data) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Thêm sản phẩm thành công',
                        showCancelButton: true,
                        confirmButtonText: 'Đi đến giỏ hàng!',
                        cancelButtonText: 'Tiếp tục mua sắm!',
                        timer: 5000, // thời gian chờ là 5000ms (5 giây)
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "{{ url('/cart') }}";
                        }
                    })
                }
            });
        }
    });
});



$(document).on('click', '.add-to-cart-quickview', function() {
    var id = $(this).data('id_product');
    var cart_product_id = $('.cart_product_id_' + id).val();
    var cart_product_name = $('.cart_product_name_' + id).val();
    var cart_product_image = $('.cart_product_image_' + id).val();
    var cart_product_price = $('.cart_product_price_' + id).val();
    var cart_product_qty = $('.cart_product_qty_' + id).val();
    var cart_product_quantity = $('.cart_product_quantity_' + id).val();
    var _token = $('input[name="_token"]').val();
    if (parseInt(cart_product_qty) > parseInt(cart_product_quantity)) {
        alert('Sản phẩm' + ' ' + cart_product_name + ' ' + 'chỉ còn' + ' ' +
            cart_product_quantity + ' ' + 'sản phẩm');
    } else {
        $.ajax({
            url: '/add-cart-ajax',
            method: 'POST',
            data: {
                _token: _token,
                cart_product_id: cart_product_id,
                cart_product_name: cart_product_name,
                cart_product_image: cart_product_image,
                cart_product_price: cart_product_price,
                cart_product_qty: cart_product_qty,
                cart_product_quantity: cart_product_quantity
            },
            beforeSend: function() {
                $('#beforesend_quickview').html(
                    "<p class='text text-primary'>Đang thêm sản phẩm đã thêm vào giỏ hàng</p>"
                );
            },
            success: function(data) {
                $('#beforesend_quickview').html(
                    "<p class='text text-primary'>Sản phẩm đã thêm vào giỏ hàng</p>");
                $('#buy_quickview').attr('disabled', true);
            }
        });
    }
})

$(document).on('click', '.redirect-cart', function() {
    window.location.href = "{{ asset('cart') }}";
});



$(document).ready(function() {
    $('.send_order').click(function() {
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Xác nhận đơn hàng?',
            text: "Đơn hàng sẽ không đưuọc hoàn trả khi đặt,Bạn có muốn đặt không?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Cảm ơn,Mua hàng!',
            cancelButtonText: 'Không,Ở lại trang!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                var shipping_email = $('.shipping_email').val();
                var shipping_name = $('.shipping_name').val();
                var shipping_address = $('.shipping_address').val();
                var shipping_phone = $('.shipping_phone').val();
                var shipping_notes = $('.shipping_notes').val();
                var shipping_method = $('.payment_select').val();
                var order_coupon = $('.order_coupon').val();
                var order_fee = $('.order_fee').val();
                var _token = $('input[name="_token"]').val();

                $.ajax({
                    url: '/confirm-order',
                    method: 'POST',
                    data: {
                        _token: _token,
                        shipping_email: shipping_email,
                        shipping_name: shipping_name,
                        shipping_address: shipping_address,
                        shipping_phone: shipping_phone,
                        shipping_notes: shipping_notes,
                        shipping_method: shipping_method,
                        order_coupon: order_coupon,
                        order_fee: order_fee
                    },
                    success: function(data) {
                        swalWithBootstrapButtons.fire(
                            'Đơn hàng!',
                            'Đơn hàng của bạn đã được gửi thành công.',
                            'success'
                        )
                        window.location.href = "{{ '/success-order' }}";
                    }
                });
            } else if (
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Đóng',
                    'Đơn hàng chưa được gửi,làm ơn hoàn tất đặt hàng :)',
                    'error'
                )
            }
        });

    });
});




$(document).ready(function() {
    $('.choose').on('change', function() {
        var action = $(this).attr('id');
        var matp = $(this).val();
        var _token = $('input[name="_token"]').val();
        var result = '';

        if (action == 'city') {
            result = 'province';
        } else {
            result = 'wards';
        }
        $.ajax({
            url: '/select-delivery',
            method: 'POST',
            data: {
                action: action,
                matp: matp,
                _token: _token
            },
            success: function(data) {
                $('#' + result).html(data);
            }
        });
    });
});



$(document).ready(function() {
    $('.calculate_delivery').click(function() {
        var matp = $('.city').val();
        var maqh = $('.province').val();
        var xaid = $('.wards').val();
        var _token = $('input[name="_token"]').val();
        if (matp == '' && maqh == '' && xaid == '') {
            alert('Bạn chưa chọn tỉnh thành phố');
        } else {
            $.ajax({
                url: '/calculate-fee',
                method: 'POST',
                data: {
                    matp: matp,
                    maqh: maqh,
                    xaid: xaid,
                    _token: _token
                },
                success: function(data) {
                    location.reload();
                }
            });
        }
    });
});
