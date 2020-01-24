$(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });   

    $('.order-now-menu-details').click(function(e){
    	e.preventDefault(); 
    	var data = $('#form-menu-details-order-now').serializeArray();
        $.ajax({
           type: 'POST',
           url: '/addordertocart',
           data: data,
           dataType: 'json',
           success:function(data){
              console.log(data);
           },
           error:function(data){
              console.log(data);
           }
        });
	});

    getCartDetails();

    function getCartDetails()
    {
	    $.ajax({
			type: 'GET',
			url: '/getcart',
			dataType: 'json',
			success:function(data){
			  console.log(data);
				$.each(data, function( i, v ) {
					getAddons(v.orderaddons, v.menuid);
				  	$('#cartContent').append('<div class="cart-items" data-cart-item-id="'+v.menuid+'">'+
						'<div class="row">'+
							'<div class="col-lg-12">'+
								'<p title="1 '+v.mname+' is P'+v.mprice +'.00 only" data-cart-subtotal="'+(v.mprice * v.orderquantity)+'"><small>'+v.orderquantity+' x </small>'+v.mname+' <span>P'+(v.mprice * v.orderquantity)+'.00</span></p>'+
								'<div id="add-'+v.menuid+'"></div>'+
								'<p class="action-item left btn-remove-item" data-item-id="'+v.orderid+'"><span><i class="fa fa-trash-o"></i></span></p>'+
							'</div>'+
						'</div>'+
					'</div>');
				});
				removeItem();

			  	$('#cartFooter').append('<div class="col-sm-12">'+
	                '<div class="cart-sub-total">'+
	                    '<p>Sub Total <span>P1500.00</span></p>'+
	                    '<p>Delivery FEE <span>P100.00</span></p>'+
	                '</div>'+
	                '<div class="cart-total">'+
	                    '<p>Total <span>P1600.00</span></p>'+
	                '</div>'+
	                '<div class="cart-checkout">'+
	                    '<button class="btn btn-md ">CHECKOUT</button>'+
	                '</div>'+
	            '</div>');
			},
			error:function(data){
				console.log(data);
			  	$('#cartContent').append('<div class="cart-items empty-cart"><div class="row"><div class="col-lg-12"><p>No items on your cart!</p></div></div></div>');
			  	$('.cart-footer').css({'display':'none'});
			  	$('#cartFooter').append('');
			}
	    });
    }

    function removeItem()
    {
		$('.btn-remove-item').on('click',function(e){
	    	e.preventDefault();
	    	var id = $(this).data('item-id'); 	    	
		    $.ajax({
				type: 'POST',
				url: '/removecartitem/'+id,
				dataType: 'json',
				success:function(data){
					console.log(data);
				},
				error:function(data){
				  console.log(data);
				}
		    });
		}); 
    }

    function getAddons(id, menuid)
    {	
    	var arrid = jQuery.parseJSON(id);
    	var keys = Object.keys(arrid);
    	var values = Object.values(arrid);

    	if(keys.length > 0)
    	{  
			$.each(keys, function( i, v ) {
				return $.ajax({
					type: 'POST',
					url: '/getcartaddons/'+v,
					dataType: 'json',
					success:function(data){
						$('#add-'+menuid).append('<p class="add-ons" data-cart-subtotal="'+(data.addprice * values[i])+'" title="1 ' +data.addname+' is P'+data.addprice+'.00 only">'+values[i]+ ' x ' +data.addname+' <span>P'+(data.addprice * values[i])+'.00 </span></p>');
					},
					error:function(data){
					  console.log(data);
					}
				});
			});
	    }
    }
  //   $.ajax({
		// type: 'GET',
		// url: '/getcartaddons',
		// dataType: 'json',
		// success:function(data){
		// 	console.log(data);

		// },
		// error:function(data){
		//   console.log(data);
		// }
  //   });
})