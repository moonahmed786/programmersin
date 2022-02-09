<?php
namespace Elementor;
if (!defined('ABSPATH')) exit;

    $tab_nav = '';
    $tab_content = '';
    $image_html = '';

    $tabs = $this->get_settings_for_display('tabs');
    $id_int = rand(10, 100);

    $align = $settings['align'];

    $i = 0;
    foreach ($tabs as $index => $item) {

        if($item['media_style'] == 'image') {

            if ( ! empty( $item['image']['url'] ) )  {

                $this->add_render_attribute( 'image', 'src', $item['image']['url'] );
                $this->add_render_attribute( 'image', 'srcset', $item['image']['url'] );
                $this->add_render_attribute( 'image', 'alt', Control_Media::get_image_alt( $item['image'] ) );
                $this->add_render_attribute( 'image', 'title', Control_Media::get_image_title( $item['image'] ) );
                $image_html = Group_Control_Image_Size::get_attachment_image_html( $item, 'thumbnail', 'image' );
            }
        }

        if($item['media_style'] == 'icon') {
            $image_html = sprintf('<i aria-hidden="true" class="%1$s"></i>',esc_attr($item['selected_icon']['value'],'markethon'));
        }

        if ($i == 0) {
            $class = "active";
        } else {
            $class = "";
        }

        $tab_nav .= '
        <li class="nav-item">
            <a class="nav-link ' . esc_attr($class) . '" data-toggle="pill" href="#tabs-' . $index . $id_int . '" role="tab">
                <span class="nav-title">'.$image_html;
                    if(!empty($item['tab_title'])) {
                        $tab_nav.= '
                            <h6 class="tab-title">' .esc_html__($item['tab_title']) . '</h6>';
                            if(!empty($item['tab_title_desc'])) {
                                $tab_nav.='<p class="mb-0 tab-title-desc">'.esc_html__($item['tab_title_desc']) . '</p>';
                            }                        
                    }
                $tab_nav.='
                </span>
            </a>
        </li>';

        $tab_content .= '
        <div class="tab-pane ' . esc_attr($class) . '" id="tabs-' . $index . $id_int . '" role="tabpanel">

            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <h2 class="title iq-fw-8">' .esc_html__($item['tab_content_title']) . '</h2>
                    <p class="mt-3">' .esc_html__($item['tab_content_description']) . '</p>
                    <div>' . $this->parse_text_editor($item['tab_content']) . '</div>
                </div>
                <div class="col-lg-6 col-md-12 ">';

                    if ( ! empty( $item['tab_content_image']['url'] ) )  {

                        $this->add_render_attribute( 'tab_content_image', 'src', $item['tab_content_image']['url'] );
                        $this->add_render_attribute( 'tab_content_image', 'srcset', $item['tab_content_image']['url'] );
                        $this->add_render_attribute( 'tab_content_image', 'alt', Control_Media::get_image_alt( $item['tab_content_image'] ) );
                        $this->add_render_attribute( 'tab_content_image', 'title', Control_Media::get_image_title( $item['tab_content_image'] ) );
                        $image_html = Group_Control_Image_Size::get_attachment_image_html( $item, 'thumbnail', 'tab_content_image' );                    

                    }
                    $tab_content .= '               
                    '.$image_html.'
                </div>
            </div>
            
        </div>';
        $i++;

    } ?> 
    <div class="iq-tabs iq-tab-horizontal <?php echo esc_attr($align); ?>">
        <ul class="nav nav-pills tabs-left" id="pills-tab" role="tablist">
            <?php echo $tab_nav; ?>
        </ul>
        <div class="tab-content">
            <?php echo $tab_content; ?>
        </div>    
    </div>