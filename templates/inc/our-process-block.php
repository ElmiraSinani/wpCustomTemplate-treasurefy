<?php 

//getting data from our process page
 $title = get_post_meta( '9', 'process-content-title', true );
 $text = get_post_meta( '9', 'process-main-wysiwyg', true );
?>

<div class="our-process">
    <h1><?php echo $title; ?></h1>    
    <?php echo $text; ?>
<!--    <div class="content">
        Through over 10 years in digital marketing, we have developed a methodical system that is guaranteed to help our clients get new customers and keep the current ones.
    </div>
    <div class="list-items">
        <div class="image">
            <img src='<?php echo home_url() . "/wp-content/uploads/2016/04/wheel.png"; ?>' />
        </div>
        <ul class="items">
            <li>
                <span class="title">Analyze.</span>
                Carefully analyzing your industry, target audience, main competitors, and your current web presence.
            </li>
            <li>
                <span class="title">Strategize.</span>
                Based on the data collected, we help you develop your short, medium, and long-term goals, and devise a realistic plan to achieve these goals.
            </li>
            <li>
                <span class="title">Implement.</span>
                Our detail-oriented team will execute the plan and keep you updated on all the actions taken.
            </li>
            <li>
                <span class="title">Measure.</span>
                We keep track of our actions and their impacts, and evaluate how 
                close we are to achieving the plan.
            </li>                    
        </ul>
    </div>
    <div class="content">
        We will analyze the initial impacts of our plan, re-strategize based on 
        what is working and what is not, implement improvements, and keep a finger 
        to the pulse of your business by measuring results.
        <div class="text-center">And it goes on...</div>
    </div>-->
    
</div>