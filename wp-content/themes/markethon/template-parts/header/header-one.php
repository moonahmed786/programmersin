<?php
/**
* Displays header widgets if assigned
*
* @package WordPress
* @subpackage markethon
* @since 1.0
* @version 1.0
*/
$markethon_option= get_option('markethon_options');
$markethon_options= get_option('markethon_options');
$sticky = '';
$header_class='';
if(isset($markethon_option['markethon_sticky_header_switch'])){
  $sticky =  $markethon_option['markethon_sticky_header_switch'];
}


if($sticky == "1"){
  $header_class .= ' has-sticky';
}


if(isset($markethon_option['markethon_header_variation'])){
  $header_class .= ' '.$markethon_option['markethon_header_variation'];
}

if(isset($markethon_option['header_back_opt_switch']) && $markethon_option['header_back_opt_switch'] == 3){
$header_class .=' header_transperent';
}

?>
<header class="header1 <?php echo esc_attr($header_class);  ?>" >  
 <?php 
          if(isset($markethon_option['markethon_top_header_switch']) && $markethon_option['markethon_top_header_switch'])
          { ?>    
  <div class="sub-header">
    <div class="container">
      <?php
            get_template_part( 'template-parts/header/header', 'top' );
          ?>
         
    </div>
  </div>
  <?php  }
            
          ?>
    
      <div class="container main-header">
       
        <div class="row no-gutters">        
          <div class="col-sm-12">
            <div class="logo_block">
                <a class="navbar-brand" href="<?php  echo esc_url( home_url( '/' ) ); ?>">
                <?php  
                if(isset($markethon_option['markethon_logo_type']) && $markethon_option['markethon_logo_type'] == 1)
                {
                  if(isset($markethon_option['markethon_logo']['url']) && $markethon_option['markethon_logo']['url'] != '')
                  { 
                    $logo = $markethon_option['markethon_logo']['url'];                 

                  ?>
                    <img class="img-fluid logo 22" src="<?php echo esc_url($logo); ?>" alt="<?php  esc_attr_e( 'markethon', 'markethon' ); ?>"> 
                  <?php
                  } 
                  else 
                  { ?>
                    <img class="img-fluid logo 33" src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="<?php  esc_attr_e( 'markethon', 'markethon' ); ?>"> 
                    <img class="img-fluid  logo-sticky 55" src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="<?php  esc_attr_e( 'markethon', 'markethon' ); ?>"> 
                  <?php }
                 
                
              }

              else if(isset($markethon_option['markethon_logo_type']) && $markethon_option['markethon_logo_type'] == 2)
              {
                if (isset($markethon_option['markethon_header_logo_text']) && $markethon_option['markethon_header_logo_text'] != '') 
                {
                   if(isset($markethon_option['markethon_header_logo_tag']))
                    {
                      $tag= $markethon_option['markethon_header_logo_tag'];
                    }

                    if(isset($markethon_option['header_logo_color']))
                    {
                      $style = "color:".sanitize_hex_color($markethon_option['header_logo_color'])."";
                    }
                    else {
                      $style = '';
                    }

                   echo '<'.esc_attr($tag).' style='.esc_attr($style).' class="logo">'.esc_html($markethon_option['markethon_header_logo_text']).'</'.esc_attr($tag).'>'; 
                }
                
              }

              if(isset($markethon_option['markethon_logo_sticky_type']) && $markethon_option['markethon_logo_sticky_type'] == 1)
              {
                 
                 if(isset($markethon_option['markethon_header_logo_sticky']['url']) && $markethon_option['markethon_header_logo_sticky']['url'] != '')
                { 
                  $logo = $markethon_option['markethon_header_logo_sticky']['url'];                 

                ?>
                   <img class="img-fluid  logo-sticky" src="<?php echo esc_url($logo); ?>" alt="<?php  esc_attr_e( 'markethon', 'markethon' ); ?>"> 
                <?php
                } 
                
              }

              else if(isset($markethon_option['markethon_logo_sticky_type']) && $markethon_option['markethon_logo_sticky_type'] == 2)
              {
                
                if (isset($markethon_option['markethon_header_logo_sticky_text']) && $markethon_option['markethon_header_logo_sticky_text'] != '') 
                {
                   if(isset($markethon_option['markethon_header_logo_sticky_tag']))
                    {
                      $tag= $markethon_option['markethon_header_logo_sticky_tag'];
                    }

                    if(isset($markethon_option['header_logo_sticky_color']))
                    {
                      $style = "color:".sanitize_hex_color($markethon_option['header_logo_sticky_color'])."";
                    }
                    else {
                      $style = '';
                    }

                   echo '<'.esc_attr($tag).' style='.esc_attr($style).' class="logo-sticky">'.esc_html($markethon_option['markethon_header_logo_sticky_text']).'</'.esc_attr($tag).'>'; 
                }
              }
              else 
              { 
              ?>
                <img class="img-fluid logo" src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="<?php  esc_attr_e( 'markethon', 'markethon' ); ?>"> 
                <img class="img-fluid  logo-sticky" src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="<?php  esc_attr_e( 'markethon', 'markethon' ); ?>"> 
                
                
            <?php } ?>
              </a>
            </div>
            <nav class="navbar navbar-expand-lg navbar-light menu">
            
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"><i class="ion-navicon">&nbsp;</i></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <?php if ( has_nav_menu( 'top' ) ) : ?>
											<?php wp_nav_menu( array(
												'theme_location' => 'top',
                        'menu_class'     => 'navbar-nav',
                        'menu_id'        => 'top-menu',
                        'container_id'   => 'iq-menu-container',
											) ); ?>
								<?php endif; ?>
              </div>									
              <div class="sub-main">
                <?php
                if(isset($markethon_option['header_display_button']))
                {
                $options = $markethon_option['header_display_button'];
                if($options == "yes")
                {
                ?>
                  <nav aria-label="breadcrumb">
                    <?php if((!empty($markethon_option['markethon_download_link'])) && (!empty($markethon_option['markethon_download_title'])))
                    {
                        $dlink = $markethon_option['markethon_download_link']; 
                        $dtitle = $markethon_option['markethon_download_title']; 
                    ?>
                    <div class="iq-button"><a href="<?php echo esc_url($dlink,'markethon'); ?>" class="button slide-button"><?php echo esc_attr($dtitle,'markethon'); ?></a></div>
                    <?php } ?>
                  </nav>
                  <?php
                  }
                }
                ?>
              </div>
            </nav>
          </div>
        </div>
      </div>
</header>
<div class="iq-height"></div>