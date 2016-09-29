<h1> DETAIL PRODUCTS </h1>


<div class="col-sm-12">
    <div class="row" >
        
        
        <div class="col-sm-3">
            <div class="row" >
                <div class="col-sm-12">
                    <div class="panel panel-default">
                        <div class="panel-body" >
                            {{ image:img }} 
                        </div>
                    </div>
                </div>
            </div>
        </div>	

        <div class="col-sm-9">
            <div class="row" >
                <div class="col-sm-12">
                    <h1>{{ name }}</h1>
                        ----------------------------------------------
                    <p class="option"> Price:<span>{{ price }}</span> </p>
                    <p class="option"> Introduction:<span >{{ short_description }}</span> </p>
                    <p class="option"> Code:<span>{{ code_product }}</span> </p>
                    <p class="option"> Discount:<span>{{ if discount }}{{ else }}0{{endif}}</span> </p>
                    <p class="option"> Category:<a href="{{ url:site }}seller/category/{{ category_id }}"><span> asd</span> </a></p>
                </div>
            </div>
        </div>
        
        <div class="col-sm-12">
            <h1>Detail of Product "{{name}}"</h1>
            <p class="option"> Intro:<span>{{ description  }}</span> </p>
        </div>  
        
    </div> 
</div>    
    
    
<div id="back" class="col-sm-12"  ><a href="{{ url:site }}seller" title="">Quay lại </a></div>
  
 