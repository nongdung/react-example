<div class="container">
    <div class="row">
        <div class="col-md-12">				
            <h2> FAQs: <span> Question and Answer </span></h2>
        </div>
    </div>

    <?php foreach($c as $rc) : ?>
        <div class="row">
            <div class="col-md-12">
                <h3><span> <?php echo $rc->category_name;?> </span></h3>
            </div>
            <!-- so sánh : faq nằm trong categories mới đưa ra -->

            <?php foreach($f as $rf) :
                if( $rc->id == $rf->category_id ) :
            ?>
             <div class="col-md-12">
                <a data-parent="#accordion" style="cursor: pointer;"name="question" data-toggle="collapse" data-parent="#accordion" data-target="#question-<?php echo $rf->id;?>"> <?php echo $rf->question;?></a>
                    <div id="question-<?php echo $rf->id;?>" class="panel-collapse collapse">
                        <span> - <?php echo $rf->answer;?> </span>
                    </div>	
                    </div>
                <?php endif;?>
            <?php  endforeach; ?>
        </div>
        <?php endforeach;?>
    </div >
    

