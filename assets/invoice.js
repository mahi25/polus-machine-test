$(document).ready(function () {
    $('body').on('click', '#new_item', function (e) {
        var length = parseInt($('#invoice-items .item').length) + 1;
        $('#item-content').find('.item').attr('id', 'item-' + length);
        $('#item-content input').attr('data-item-parent', length);
        $('#item-content select').attr('data-item-parent', length);
        $('#item-content .remove-item').attr('data-item-parent', length);
        var html = $('#item-content').html();
        $('#invoice-items').append(html);
    })

    //quantity/price/tax change
    $('body').on('change', '.calculate-line-total', function (e) {
        calculateLineItem($(this).attr('data-item-parent'));
    });

    $('body').on('change', '#discount,.itemTotal', function (e) {
        calculateOverallTotal();
    });
    //remove line item
    $('body').on('click', '.remove-item', function (e) {
        var itemParent = $(this).attr('data-item-parent');
        $('#item-' + itemParent).remove();
    })
})

function calculateLineItem(itemNo) {
    var tax = $('#item-' + itemNo).find('.tax').val();
    tax = tax ? tax : 0;
    var quantity = parseInt($.trim($('#item-' + itemNo).find('.quantity').val()));
    var price = parseFloat($.trim($('#item-' + itemNo).find('.price').val()));
    var originalPrice = price.toFixed(2);
    console.log(tax, quantity, price)
    if (quantity && price) {
        if (tax) {
            price = (price + (price * (tax / 100))).toFixed(2)
        }
        var totalPrice = (quantity * price).toFixed(2);
        $('#item-' + itemNo).find('.itemTotal').val('$' + totalPrice);
        $('#item-' + itemNo).find('.itemTotalHidden').val(totalPrice);
        $('#item-' + itemNo).find('.no-tax-total').val('$' + originalPrice);
        $('#item-' + itemNo).find('.no-tax-total-hidden').val(originalPrice);
        $('#item-' + itemNo).find('.tax-total').val('$' + price);
        $('#item-' + itemNo).find('.tax-total-hidden').val(price);
        $('#item-' + itemNo).find('.item-total-section').removeClass('d-none')
        calculateOverallTotal();
    } else {
        $('#item-' + itemNo).find('.item-total-section').addClass('d-none');
    }
}

function calculateOverallTotal() {
    var discount = $.trim($('#discount').val());
    var overAllTotal = 0;
    $.each($("#invoice-items .itemTotalHidden"), function () {
        var val = parseFloat($(this).val());
        overAllTotal += val;
    });
    if (discount) {
        if (discount.includes("%")) {
            var discountValue = parseFloat(discount.replace('%', ''));
            overAllTotal = (overAllTotal - (overAllTotal * (discountValue / 100))).toFixed(2)
        } else {
            overAllTotal = (overAllTotal - parseFloat(discount)).toFixed(2);
        }
    }
    $('#totalAmt').val('$' + overAllTotal);
}