<?php
namespace Elementor; 
if ( ! defined( 'ABSPATH' ) ) exit; 

    $html = '';

    $tabs = $this->get_settings_for_display( 'history_tabs' );
    $id_int = rand(10,100);

    $align = $settings['align'];

    $this->add_render_attribute( 'icon-back', 'style' );

    $html .= '
    <div class="cd-horizontal-timeline">

        <div class="timeline">
            <div class="events-wrapper">
                <div class="events">
                    <ol>';
                        $i= 0;
                        foreach ( $tabs as $index => $item ){

                            if($index == 0) {
                                $class = "selected";
                            } else {
                                $class = "";
                            }
                            $html .= '
                            <li>
                                <a href="#" data-date="'.esc_html__($item['history_date'], 'markethon').'" class="'.esc_attr__($class, 'markethon').'">
                                    '.esc_html__($item['history_title'], 'markethon').'
                                </a>
                            </li>';
                        }
                    $html .= '
                    </ol>
                    <span class="filling-line" aria-hidden="true"></span>
                </div>
            </div>          
            <ul class="cd-timeline-navigation">
                <li><a href="#" class="prev inactive">Prev</a></li>
                <li><a href="#" class="next">Next</a></li>
            </ul>
        </div>

        <div class="events-content">
            <ol>';
                foreach ( $tabs as $index => $item ){
        
                    if($index == 0) {
                        $class = "selected";
                    } else {
                        $class = "";
                    }

                    $html .= '
                    <li class="'.esc_attr__($class, 'markethon').'" data-date="'.esc_html__($item['history_date'], 'markethon').'" >
                        <h3 class="text-white iq-fw-8 mb-3">dd'.esc_html__($item['history_content_title'], 'markethon').'</h3>
                        <p class="text-white mb-0">'.esc_html__($item['history_content'], 'markethon').'</p>
                    </li>';
                }    
            $html .= '    
            </ol>
        </div>

    </div>';
    
    echo $html;
 
 ?>