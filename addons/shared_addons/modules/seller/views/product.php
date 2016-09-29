<h1>LIST PRODUCT</h1>

{{ if product.total >0 }}
<div class="row" >
    {{ product.entries }}
   
        <div class="col-sm-3">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <a href="{{ url:site }}seller/product/{{ id }}"><p class="text-primary"> {{ name }} </p></a> 
                </div>
                
                <div class="panel-body" >
                    {{ image:img }} 
                </div>
                
                <div class="panel-footer">
                    Price:{{ price }} $
                </div>
        </div>
        </div>
    

    {{ /product.entries }}
    <div id="back" class="col-sm-12"  ><a href="{{ url:site }}seller" title="">Quay lại </a></div>
{{ else }}

<h4>There are no Product for this Category</h4>
{{endif}}    
    </div>    


