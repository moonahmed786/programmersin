<?php
/**
* Displays header widgets if assigned
*
* @package WordPress
* @subpackage markethon
* @since 1.0
* @version 1.0
*/
$markethon_options = get_option('markethon_options');
$markethon_option = get_option('markethon_options');
?>
<header>
      <?php
      if(isset($markethon_option['email_and_button']))
      {
        $options = $markethon_option['email_and_button'];
        if($options == "yes")
        {
        ?>
        <div class="container-fluid sub-header">
          <div class="row">
          <div class="col-auto mr-auto">
          <?php
          if(!empty($markethon_option['header_display_contact']))
          {
            $options = $markethon_option['header_display_contact'];
            if($options == "yes")
            {
          ?>

              <div class="number-info">
                <ul>
                    <?php
                    if(!empty($markethon_option['header_email']))
                    {
                    ?>
                    <li class="email-header"><a href="mailto:<?php echo esc_html($markethon_options['header_email']); ?>">
                    <i class="fas fa-envelope"></i><?php echo esc_attr($markethon_options['header_email']); ?></a></li>
                    <?php } ?>
                    <?php
                    if(!empty($markethon_option['header_phone']))
                    {
                    ?>
                    <li class="phone-header"><a href="tel:<?php echo str_replace(str_split('(),-" '), '',$markethon_options['header_phone']); ?>">
                    <i class="fas fa-phone"></i><?php echo esc_attr($markethon_options['header_phone']); ?></a></li>
                    <?php } ?>
                </ul>
              </div>
            
          <?php
            }
          }
          ?>
          </div>
            <div class="col-auto col-auto ml-auto sub-main">
              <?php
              $markethon_option = get_option('markethon_options');
              if(isset($markethon_option['markethon_header_social_media']))
              {	
                $options = $markethon_option['markethon_header_social_media'];
                if($options == "yes"){ ?>
                  <div class="social-icon">
                    <?php $data = $markethon_option['header-social-media-iq']; ?>
                    <ul>
                      <?php
                      foreach ($data as $key=>$options )
                      {
                        if($options) {
                          echo '<li class="d-inline"><a href="'.$options.'"><i class="fa fa-'.$key.'"></i></a></li>';
                        }
                      } ?>
                    </ul>
                  </div>
              <?php
                }
              }	
              ?>
            </div>
          </div>
        </div>
        <?php
        }
      }
      ?>
      <div class="container-fluid main-header">
        <div class="row">
          <div class="col-sm-12">
            <nav class="navbar navbar-expand-lg navbar-light">
              <a class="navbar-brand" href="<?php  echo esc_url( home_url( '/' ) ); ?>">
                <?php  
                if(isset($markethon_option['markethon_logo']['url']))
                { 
                  $logo = $markethon_option['markethon_logo']['url'];
                ?>
                  <img class="img-fluid logo" src="<?php echo esc_url($logo); ?>" alt="<?php  esc_attr_e( 'markethon', 'markethon' ); ?>"> 
                <?php
                } 
                else 
                { 
                ?>
                  <img class="img-fluid logo" src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="<?php  esc_attr_e( 'markethon', 'markethon' ); ?>"> 
                <?php } ?>
              </a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <?php if ( has_nav_menu( 'top' ) ) : ?>
											<?php wp_nav_menu( array(
												'theme_location' => 'top',
                        'menu_class'     => 'navbar-nav ml-auto',
                        'menu_id'        => 'top-menu',
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
                    <div class="request-btn"><a href="<?php echo esc_url($dlink,'markethon'); ?>"><?php echo esc_attr($dtitle,'markethon'); ?></a></div>
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
