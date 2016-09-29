<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Autocomplete textbox using jQuery, PHP and MySQL by CodexWorld</title>
  <link rel="stylesheet" type="text/css" href="mystyle.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <script>
 $(document).ready( function() {
    
    $( "#search" ).autocomplete({
      source: function(request,response){
          var val = $( "#search" ).val();
          if (val !== ''){
          $.ajax({
            type:"GET",  
            url: "http://localhost/pyrocms/seller/timkiem/?term="+$( "#search" ).val(),
            dataType: "json",
            
            success: function (data) {
                response(data);
            }
        });}
        },
        
        autoFocus: true,
	minLength: 0,
        select: function(event, ui) {
        //assign value back to the form element
        if(ui.item){
            $(event.target).val(ui.item.value);
         }
        //submit the form
        $(event.target.form).submit();
        }

    });
  });
  </script>
  
</head>
<body>
    
    <form method="get" action="seller/search_s">
        <div class="ui-widget">
          <label for="search">Search: </label>
          <input id="search" name="search" required="">
        </div>
    </div>  
    </form>

    

<div class='container-fluid' >
<h2>{{ template:title }} </h2>
{{ if categories.total > 0 }}
    <div class="row" >
        
    {{ categories.entries }}
        <div class="col-sm-3">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <a href="{{ url:site }}seller/category/{{ id }}"><p class="text-primary"> {{ category_name }} </p></a> 
                </div>
                
                <div class="panel-body" >
                    {{ image_c:img }} 
                </div>
                <div class="panel-footer">
                    {{ description_c }}
                </div>
        </div>
        </div>
        {{ /categories.entries }}
        
    </div>    

{{ else }}

<h4>There are no categories</h4>
{{endif}}
</div>

</body>
</html>
