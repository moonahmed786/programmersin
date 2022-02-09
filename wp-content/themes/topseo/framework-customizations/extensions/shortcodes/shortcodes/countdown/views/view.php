<?php if (!defined('FW')) die('Forbidden');

/**
 * @var $atts The shortcode attributes
 */

$datetime = $atts['datetime'];
$day_text = $atts['day_text'];
$bg_day_text = $atts['bg_day_text'];
$hou_text = $atts['hou_text'];
$bg_hou_text = $atts['bg_hou_text'];
$min_text = $atts['min_text'];
$bg_min_text = $atts['bg_min_text'];
$sec_text = $atts['sec_text'];
$bg_sec_text = $atts['bg_sec_text'];

?>
<div class="topseo-countdown" data-date="<?php echo esc_attr($datetime); ?>" data-day-text="<?php echo esc_attr($day_text); ?>" data-hour-text="<?php echo esc_attr($hou_text); ?>" data-min-text="<?php echo esc_attr($min_text); ?>" data-sec-text="<?php echo esc_attr($sec_text); ?>"></div>
<script>

    jQuery(document).ready(function(JQuery){
        jQuery('.topseo-countdown').each(function() {
            var $thisCountDown = jQuery(this);
            var dayText = ($thisCountDown.data('day-text') == undefined) ? 'days' : $thisCountDown.data('day-text');
            var hourText = ($thisCountDown.data('hour-text') == undefined) ? 'hours' : $thisCountDown.data('hour-text');
            var minText = ($thisCountDown.data('min-text') == undefined) ? 'minutes' : $thisCountDown.data('min-text');
            var secText = ($thisCountDown.data('sec-text') == undefined) ? 'secconds' : $thisCountDown.data('sec-text');
            $thisCountDown.countdown({
                date: jQuery(this).data('date'),
                refresh: 1000,
                render: function(data) {
                    jQuery(this.el).html(
                        "<div class='ts-countdown-block' style='background-color:<?php echo esc_attr($bg_day_text); ?>'><span class='value'>" + this.leadingZeros(((data.years > 0) ? data.years * 365 : data.days) , 3) + " </span><span class='indicator'>" + dayText + "</span></div>"+
                        "<div class='ts-countdown-block' style='background-color:<?php echo esc_attr($bg_hou_text); ?>'><span class='value'>" + this.leadingZeros(data.hours, 2) + " </span><span class='indicator'>" + hourText + "</span></div>"+
                        "<div class='ts-countdown-block' style='background-color:<?php echo esc_attr($bg_min_text); ?>'><span class='value'>" + this.leadingZeros(data.min, 2) + " </span><span class='indicator'>" + minText + "</span></div>"+
                        "<div class='ts-countdown-block' style='background-color:<?php echo esc_attr($bg_sec_text); ?>'><span class='value'>" + this.leadingZeros(data.sec, 2) + " </span><span class='indicator'>" + secText + "</span></div>");
                }
            });
        })
    });
</script>
