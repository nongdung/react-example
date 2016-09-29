<div class="container">

<div class="page-header">
    <h1> FAQs: <span> Question and Answer </span></h1>
</div>

<!-- Bootstrap FAQ - START -->
<div class="container">
    

    <div class="panel-group" id="accordion">
        <?php foreach($c as $rc) : ?>
        <div class="faqHeader"><?php echo $rc->category_name;?></div>
        
        <?php foreach($f as $rf) :
                if( $rc->id == $rf->category_id ) :
            ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#<?php echo $rf->id;?>"><?php echo $rf->question;?></a>
                </h4>
            </div>
            <div id="<?php echo $rf->id;?>" class="panel-collapse collapse in">
                <div class="panel-body">
                    <?php echo $rf->answer;?>
                </div>
            </div>
        </div>
        
        
         <?php endif;?>
         <?php  endforeach; ?>
    </div>
    <?php endforeach;?>
</div>

<style>
    .faqHeader {
        font-size: 27px;
        margin: 20px;
    }

    .panel-heading [data-toggle="collapse"]:after {
        font-family: 'Glyphicons Halflings';
        content: "\e072"; /* "play" icon */
        float: right;
        color: #F58723;
        font-size: 18px;
        line-height: 22px;
        /* rotate "play" icon from > (right arrow) to down arrow */
        -webkit-transform: rotate(-90deg);
        -moz-transform: rotate(-90deg);
        -ms-transform: rotate(-90deg);
        -o-transform: rotate(-90deg);
        transform: rotate(-90deg);
    }

    .panel-heading [data-toggle="collapse"].collapsed:after {
        /* rotate "play" icon from > (right arrow) to ^ (up arrow) */
        -webkit-transform: rotate(90deg);
        -moz-transform: rotate(90deg);
        -ms-transform: rotate(90deg);
        -o-transform: rotate(90deg);
        transform: rotate(90deg);
        color: #454444;
    }
</style>


</div>