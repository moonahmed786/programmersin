<?php
/**
* Displays header widgets if assigned
*
* @package WordPress
* @subpackage markethon
* @since 1.0
* @version 1.0
*/

$markethon_option = get_option('markethon_options');


?>
<header>

<?php 
     
  
    if(isset($markethon_option['top_bar_option']) && $markethon_option['top_bar_option'] === "yes" ){   

        if(isset($markethon_option['top_contact_option']) && $markethon_option['top_contact_option'] === "yes" ){  
             
        }   

        ?>
        
<?php } ?>
  
      
</header>
<div class="iq-height"></div>
