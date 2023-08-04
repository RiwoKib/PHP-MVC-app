$(document).ready(function (){

    const saveSelectedBtn = document.getElementById('saveSelectedBtn');
    const checkboxes = document.querySelectorAll('.product-checkbox');

    // Add a change event listener to each checkbox
    checkboxes.forEach(function(checkbox) {
        checkbox.addEventListener('change', function() {
            // Check if at least one checkbox is checked
            const atLeastOneChecked = Array.from(checkboxes).some(checkbox => checkbox.checked);

            
            if (atLeastOneChecked) {
                saveSelectedBtn.style.display = 'block';
            } else {
                saveSelectedBtn.style.display = 'none';
            }
        });
    });

    
    //increment && decrement  button
  $(document).on('click', '.incrementBtn', function (e) {    
        e.preventDefault();
        // alert('increment')
        var qty = $(this).closest('.table').find('.input-qty').val();
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
        var qty = $(this).closest('.table').find('.input-qty').val();
        var value = parseInt(qty, 10);
        value = isNaN(value) ? 0 : value;

        if(value  > 1){
            value--;
            //$('.input-qty').val(value);
            $(this).closest('.product_data').find('.input-qty').val(value);
        }
    });


 

})