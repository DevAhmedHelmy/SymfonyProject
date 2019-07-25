
//add product btn
$('.add-product-btn').on('click', function (e) {
    
    e.preventDefault();
    var name = $(this).data('name');
    var id = $(this).data('id');
    var price = $.number($(this).data('price'), 2);
    
     

        $('#product_id').val(id);
        $('#name').val(name);
        $('#price').val(price);
        //to calculate total price
     
});

 
