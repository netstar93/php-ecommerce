@section('title', 'New Category')
@extends('admin.layout')
@section('content')
<div class="right-side category-add-form">
    <div class="page-header">        
       <h3>New Category</h3>        
    </div>
    <div class="actions">
    	<span class="breadcrump col-lg-8" style="display: inline-block;float:left">Admin/Catalog/Category</span>
    	<span class="action-buttons col-lg-4">
	    	<span class="action-btn"><button class="btn btn-success" id="category_save" >Save</button></span>
	    	<span class="action-btn"><button class="btn btn-error" id="savecontinue" >Save And Continue</button></span>
	    	<span class="action-btn"><button class="btn btn-primary" id="cancel" >Cancel</button></span>
    	</span>
	</div>
    <div class="wrapper">
	    <div class="product-form-tabs">
			<ul class="nav nav-tabs" id="myTab" role="tablist">
			  <li class="nav-item">
			    <a class="nav-link active" data-toggle="tab" href="#basic" role="tab" aria-controls="home">Basic</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" data-toggle="tab" href="#prices" role="tab" aria-controls="profile">Other Attributes</a>
			  </li>
			  
			</ul>
			</div>
			<div class="category-form-content">
				<form class="form" role="form" action="/admin/category/save" autocomplete="on" id="category-form" novalidate="" method="POST" enctype="multipart/form-data">
					<div class="tab-content">			 
					  <div class="tab-pane active" id="basic" role="tabpanel">
					  	@include('admin.catalog.category.categoryform_basic')
					  </div>

					  <div class="tab-pane" id="cat_others" role="tabpanel">
					  	@include('admin.catalog.category.categoryform_other')
					  </div>
					  			  						 
			    	</div>
                    <input type="submit" name="submit_cate_form" id="category_form_button" style="display:none;"/>
		    	</form>
	    	<div>
	</div>
</div>
@endsection
