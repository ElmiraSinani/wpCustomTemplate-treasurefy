<form method="get" id="blog-searchform" role="search" action="<?php echo esc_url( home_url( '/' ) ); ?>">    

    <!-- PASSING THIS TO TRIGGER THE ADVANCED SEARCH RESULT PAGE FROM functions.php -->
    <input type="hidden" name="search" value="blog">
    <input type="text" value="" name="s" id="name" placeholder="Search..." />
    
    <input class="hidden" type="submit" id="searchsubmit" value="Search" />

</form>