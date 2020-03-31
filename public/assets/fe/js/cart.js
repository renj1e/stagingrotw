$(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });   
    setInterval(function(){
	    $.ajax({
			type: 'GET',
			url: '/getcartcount',
			dataType: 'json',
			success:function(data){
				// console.log(data);
				$('.cart_count').text(data)
			},
			error:function(data){
			  console.log(data);
			}
	    });
    }, 1000);

    $('.order-now-menu-details').click(function(e){
    	e.preventDefault(); 
    	var data = $('#form-menu-details-order-now').serializeArray();
        $.ajax({
           type: 'POST',
           url: '/addordertocart',
           data: data,
           dataType: 'json',
           success:function(data){
              $('.cart-added-notifs').addClass('show').empty().append('<p><span class="name">'+data.new_cart_item.mname+'</span> '+data.message+'</p>').delay(1000).show(0);
              $('.cart-added-notifs').delay(3000).fadeOut(3000).removeClass('show');
           },
           error:function(data){
              console.log(data);
           }
        });
	});

	getCartDetails();

    $('.btn-cart-drawer').click(function(){    	
		getCartDetails();
    	var subtotal = $('p[data-cart-subtotal]');
    	var del_fee = $('#cartFooter').data('delivery-fee');
    	var total = 0;

		$.each(subtotal, function(i, v){
			total += $(v).data('cart-subtotal')
		})
		$('#cartContent').empty();
		$('#cartFooter').empty();
		if(total === 0)
		{
			$('#cartContent').append('<div class="cart-items empty-cart"><div class="row"><div class="col-lg-12"><p>No items on your cart!</p></div></div></div>');
		}
		else
		{
			$('.total-amount').empty().append('<b>P'+(total + del_fee)+'.00</b>');
		  	$('#cartFooter').append('<div class="col-sm-12">'+
	            '<div class="cart-sub-total">'+
	                '<p>Sub Total <span>P'+total+'.00</span></p>'+
	                '<p>Delivery FEE <span>P'+del_fee+'.00</span></p>'+
	            '</div>'+
	            '<div class="cart-total">'+
	                '<p>Total <span>P'+(total + del_fee)+'.00</span></p>'+
	            '</div>'+
	            '<div class="cart-checkout">'+
	                '<button class="btn btn-md btn-checkout" data-toggle="modal" data-target="#checkout">CHECKOUT</button>'+
	            '</div>'+
	        '</div>');
		}
    });

    $('.btn-checkout').click(function(){
    	e.preventDefault();
	    $.ajax({
			type: 'GET',
			url: '/getmyaddress',
			dataType: 'json',
			success:function(data){
				console.log(data);
				$('.cart-added-notifs').addClass('show').empty().append('<p>'+data.message+'</p>').delay(1000).show(0);
				$('.cart-added-notifs').delay(3000).fadeOut(3000).removeClass('show');
			},
			error:function(data){
			  console.log(data);
			}
	    });
    });

    function getCartDetails()
    {
	    $.ajax({
			type: 'GET',
			url: '/getcart',
			dataType: 'json',
			success:function(data){
				var orderid = [];
				$('#cartContent').empty();
				if(data.length < 1)
				{
					$('#cartFooter').empty()
				  	$('#cartContent').append('<div class="cart-items empty-cart"><div class="row"><div class="col-lg-12"><p>No items on your cart!</p></div></div></div>');
				}
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
					orderid.push(v.orderid);
				});
				$('.btn-confirm-order').attr('data-orderid', orderid);
				removeItem();
			},
			error:function(data){
			  	$('#cartContent').empty().append('<div class="cart-items empty-cart"><div class="row"><div class="col-lg-12"><p>No items on your cart!</p></div></div></div>');
			  	$('.cart-footer').css({'display':'none'});
			  	$('#cartFooter').empty();
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
					getCartDetails();					
					$('.cart-added-notifs').addClass('show').empty().append('<p>'+data.message+'</p>').delay(1000).show(0);
					$('.cart-added-notifs').delay(3000).fadeOut(3000).removeClass('show');
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
    		$('#add-'+menuid).empty();
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

    $('.btn-confirm-order').click(function(e){
        e.preventDefault();
        var ids = $(this).data('orderid');        
    	var del_fee = $('#cartFooter').data('delivery-fee');
        $.ajax({
            type: 'POST',
            url: '/confirmorder',
            data: {ids: ids, address: $('[name="deliveryadd"]:checked').val(), fee: del_fee},
            dataType: 'json',
            success:function(data){
                console.log(data);
				location.reload(true);
            },
            error:function(data){
                console.log(data);
            }
        });
    });

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