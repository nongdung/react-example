<?php
if($Term2 != ''){
    foreach($Term2 as $row){        
?>
<h1> CATEGORIES </h1>
<div class="row" >
        
    
        <div class="col-sm-3">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <a href="{{ url:site }}seller/category/<?php echo $row->id ?>"><p class="text-primary"> <?php echo $row->category_name?> </p></a> 
                </div>
                
                <div class="panel-body" >
                    <img src="<?php echo base_url('files/large/'.$row->image_c);?>">
                </div>
                <div class="panel-footer">
                    <?php echo $row->description_c?>
                </div>
        </div>
        </div>
       
        
    </div>
<?php }
} ?>

<?php 
if($Term!= ''){
    foreach($Term as $r) {
    
?>
<h1> DETAIL PRODUCTS </h1>


<div class="col-sm-12">
    <div class="row" >
        
        
        <div class="col-sm-3">
            <div class="row" >
                <div class="col-sm-12">
                    <div class="panel panel-default">
                        <div class="panel-body" >
                            <img src="<?php echo base_url('files/large/'.$r->image);?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>	

        <div class="col-sm-9">
            <div class="row" >
                <div class="col-sm-12">
                    <h1><?php echo $r->name;?></h1>
                        ----------------------------------------------
                    <p class="option"> Price:<span><?php echo $r->price;?></span> </p>
                    <p class="option"> Introduction:<span ><?php echo $r->short_description;?></span> </p>
                    <p class="option"> Code:<span><?php echo $r->code_product;?></span> </p>
                    <p class="option"> Discount:<span>
                        <?php if($r->discount == ''){
                            echo '0';
                            
                        }  else {
    
                    echo $r->discount;}?>
                        </span> </p>
                    <p class="option"> Category:<a href="<?php echo base_url('seller/product/'.$r->id);?>"><span> asd</span> </a></p>
                </div>
            </div>
        </div>
        
        <div class="col-sm-12">
            <h1>Detail of Product "<?php echo $r->name;?>"</h1>
            <p class="option"> Intro:<span><?php echo $r->description;?></span> </p>
        </div>  
        
    </div> 
</div>    
    
    
<div id="back" class="col-sm-12"  ><a href="{{ url:site }}seller" title="">Quay lại </a></div>
<?php }} else {?>
<h4>No Result has found </h4>
<?php } ?>
