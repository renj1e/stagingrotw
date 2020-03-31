@extends('layouts.be')

@push('styles')
    <!-- dataTable CSS -->
    <link href="/assets/be/vendor/DataTables-1.10.18/css/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- footable CSS -->
    <link href="/assets/be/vendor/footable-bootstrap/css/footable.bootstrap.min.css" rel="stylesheet">
@endpush
@section('content')
	<!-- Begin page content -->
	<main class="flex-shrink-0">
	    <div class="container-fluid" id="main-container">
	        <div class="row mb-4">
	            <div class="container py-4">
	                <div class="row">
	                    <div class="col">
	                        <h5 class="font-weight-normal template-primary">Vendor / Store</h5>
	                        <p class="text-secondary mb-0">Vendor / Store update form</p>
	                    </div>
	                </div>
	            </div>
	        </div>

	        <div class="row">
	            <div class="container">
	                <div class="card border-0 shadow-sm mb-4">
	                    <div class="card-body">

                            <form action="/product-save-update" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="menuid" value="{{$menu->menuid}}">
                                <div class="modal-body">
                                    <div class="row justify-content-center">
                                        <div class="col-md-10 mx-auto">
                                            <div class="form-group row">
                                                <div class="col-lg-12 col-md-12">
                                                    <label>Product name</label>
                                                    <input type="text" name="mname" value="{{$menu->mname}}" class="form-control" placeholder="">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-lg-6 col-md-6">
                                                    <label>Vendor</label>
                                                    <select class="form-control" name="vendorid">
                                                        <option value="{{ $menu->vendor->vendorid }}">{{ $menu->vendor->vname }}</option>
                                                        <option>Select Vendor</option>
                                                        @foreach($vendors as $v)
                                                        <option value="{{ $v->vendorid }}">{{ $v->vname }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <label>Types of Meal</label>
                                                    <div class="">
                                                        <div class="custom-control mb-2 custom-checkbox custom-control-inline">
                                                            <input type="checkbox" class="custom-control-input" name="mtype[]" {{ (in_array(1, $menu->type, TRUE))? 'checked' : ''}} value="1" id="all-time">
                                                            <label class="custom-control-label" for="all-time">All time</label>
                                                        </div>
                                                        <div class="custom-control mb-2 custom-checkbox custom-control-inline">
                                                            <input type="checkbox" class="custom-control-input" name="mtype[]" value="2" {{ (in_array(2, $menu->type, TRUE))? 'checked' : ''}} id="breakfast">
                                                            <label class="custom-control-label" for="breakfast">Breakfast</label>
                                                        </div>
                                                        <div class="custom-control mb-2 custom-checkbox custom-control-inline">
                                                            <input type="checkbox" class="custom-control-input" name="mtype[]" value="3" {{ (in_array(3, $menu->type, TRUE))? 'checked' : ''}} id="Lunch">
                                                            <label class="custom-control-label" for="Lunch">Lunch</label>
                                                        </div>
                                                        <div class="custom-control mb-2 custom-checkbox custom-control-inline">
                                                            <input type="checkbox" class="custom-control-input" name="mtype[]" value="4" {{ (in_array(4, $menu->type, TRUE))? 'checked' : ''}} id="dinner">
                                                            <label class="custom-control-label" for="dinner">Dinner</label>
                                                        </div>
                                                        <div class="custom-control mb-2 custom-checkbox custom-control-inline">
                                                            <input type="checkbox" class="custom-control-input" name="mtype[]" value="5" {{ (in_array(5, $menu->type, TRUE))? 'checked' : ''}} id="merienda">
                                                            <label class="custom-control-label" for="merienda">Merienda</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-lg-12 col-md-12">
                                                    <label>Description</label>
                                                    <textarea class="form-control" placeholder="" id="editor" name="mdesc" value="{{$menu->mdesc}}">{{$menu->mdesc}}</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-lg-6 col-md-6">
                                                    <label>Price per order (Php)</label>
                                                    <input type="number" class="form-control" placeholder="" name="mprice" value="{{$menu->mprice}}">
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <label># of stacks</label>
                                                    <input type="number" class="form-control" placeholder="" name="mquantity" value="{{$menu->mquantity}}">
                                                </div>
                                            </div>
                                            {{-- 
                                            <div class="form-group row">
                                                <div class="col-lg-12 col-md-12">
                                                    <label>Add-ons: </label>
                                                    <div>
                                                        @if(isset($menu->maddons))
                                                            @foreach($menu->addons as $a)
                                                            <div class="custom-control mb-2 custom-checkbox custom-control-inline">
                                                                <input type="checkbox" class="custom-control-input" name="maddons[{{$a->amid}}]" value="1" id="addons-{{$a->amid}}" checked>
                                                                <label class="custom-control-label" for="addons-{{$a->amid}}"> {{$a->am_name}} (P{{$a->am_price}})</label>
                                                            </div>
                                                            @endforeach
                                                        @endif                                       
                                                    </div>
                                                    <hr>
                                                    <label>Other Add-ons: </label>
                                                    <div id="addons"> 
                                                    <p class="mb-0">No add-ons</p>                                          
                                                    </div>
                                                </div>
                                            </div>
                                             --}}
                                            <div class="form-group row">
                                                <div class="col-lg-12 col-md-12">
                                                    <label>Show this?</label>
                                                    <select class="form-control" name="mis_activated">
                                                        <option>Select</option>                    
                                                        <option value="1" {{ ($menu->mis_activated === 1)? 'selected' : ''}}>Yes</option>   
                                                        <option value="0" {{ ($menu->mis_activated === 0)? 'selected' : ''}}>No</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="form-group row">
                                                <div class="col-md-12">
                                                    <label>Display Photo</label>
                                                    <div class="mb-3">
                                                        <img src="/storage/images/{{ $menu->mavatar }}" class="" width="200">
                                                    </div>
                                                    <input type="file" class="form-control" name="mavatar" placeholder="Photo upload">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success">Save changes</button>
                                </div>
                            </form>
	                    </div>
	                </div>
	            </div>
	        </div>

	    </div>
	</main>
@endsection
@push('scripts')
    <script src="/assets/be/vendor/malihu-custom-scrollbar-plugin-master/jquery.mCustomScrollbar.concat.min.js"></script>

	<script>
        'user strict'
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });   

            // $('select[name="vendorid"]').change(function(e){
                // e.preventDefault();
                var id = $('select[name="vendorid"]').val()
                $.ajax({
                    type: 'POST',
                    url: '/getvendoraddons',
                    data: {id: id},
                    dataType: 'json',
                    success:function(data){
                        $('#addons').empty();
                        if(data.length > 0)
                        {
                            $.each(data, function(i, v){
                                var id = $('[name="maddons['+data[i].amid+']"]');
                                if(id.length < 1)
                                {
                                    $('#addons').append('<div class="custom-control mb-2 custom-checkbox custom-control-inline">'+
                                            '<input type="checkbox" class="custom-control-input" name="maddons['+data[i].amid+']" value="1" id="addons-'+data[i].amid+'">'+
                                            '<label class="custom-control-label" for="addons-'+data[i].amid+'">'+data[i].am_name+' (P'+data[i].am_price+')</label>'+
                                        '</div>');
                                }
                            });
                        }
                        else
                        {
                            $('#addons').append('<p class="mb-0">No add-ons</p>');
                        }
                    },
                    error:function(data){
                      console.log(data);
                    }
                });
            // });
        });   
	</script>
@endpush