$(document).ready(function (){ 
    
    
    $(document).on('click', '.incrementBtn', function (e) {    
        e.preventDefault();
        // alert('increment')
        var qty = $(this).closest('.product_data').find('.input-qty').val();
        var value = parseInt(qty, 10);
        value = isNaN(value) ? 0 : value;

        if(value  < 50){
            value++;
            //$('.input-qty').val(value);
            $(this).closest('.product_data').find('.input-qty').val(value);
        }
    });



    $(document).on('click', '.decrementBtn', function (e) {
        e.preventDefault();

        // alert('decrement')
        var qty = $(this).closest('.product_data').find('.input-qty').val();
        var value = parseInt(qty, 10);
        value = isNaN(value) ? 0 : value;

        if(value  > 1){
            value--;
            //$('.input-qty').val(value);
            $(this).closest('.product_data').find('.input-qty').val(value);
        }
    });
})