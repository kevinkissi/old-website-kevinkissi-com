<?php

			$color		= kevinkissi_opt('contact_blog_color');

			$img		= kevinkissi_opt('contact_blog_img', false, 'url');

			$repeat		= kevinkissi_opt('contact_blog_repeat');

			$parallax	= kevinkissi_opt('contact_blog_parallax');

			$cover		= kevinkissi_opt('contact_blog_cover');

			$bg_repeat  = '';

			if( $repeat == 1 || $repeat == true){

				$bg_repeat = 'background-repeat:no-repeat;';

			}else $bg_repeat = 'background-repeat:repeat;';



			$bg_cover = '';

			if( $cover == 1 || $cover == true){

				$bg_cover = 'background-size:cover;';

			}else $bg_cover = '';

			$bg_img = '';

			if( $img ){

				$bg_img = 'background-image:url('.$img.');';

			}else $bg_img = '';

			$img		= ( ! empty ( $img ) ) 		? ''.$bg_img.'' : '';

			$color		= ( ! empty ( $color ) )  	? 'background-color:'. $color .';' : '';

			$repeat		= ( ! empty ( $repeat ) ) 	? ''. $bg_repeat .'' : '';

			$cover		= ( ! empty ( $cover ) ) 	? ''. $bg_cover .'' : '';

			$parallax 	= ( ! empty ( $parallax ) ) ? 'background-attachment: fixed;': '';

			/** Style Container */

			$style = (

				! empty( $img ) ||

				! empty( $color ) ||

				! empty( $repeat ) ||

				! empty( $cover ) ||

				! empty( $parallax ) ) ?

					sprintf( '%s %s %s %s %s', $img, $color, $repeat, $cover, $parallax ) : '';

			$css = '';

			if ( ! empty( $style ) ) {

				$css = 'style="'. $style .'" ';

			}

        ?>

    	<div class="container">

            <div class="row">

				<?php

                    $color_title		= kevinkissi_opt('contact_blog_title_color');

                    $color_sub_title	= kevinkissi_opt('contact_blog_subtitle_color');

                    $color_title		= ( ! empty ( $color_title ) ) 		? 'color:'. $color_title .';' : '';

                    $color_sub_title	= ( ! empty ( $color_sub_title ) )  ? 'color:'. $color_sub_title .';' : '';

                    /** Style Container */

                    $title_color = (

                        ! empty( $color_title ) ) ?

                            sprintf( '%s', $color_title) : '';

                    $css_title_color = '';

                    if ( ! empty( $title_color ) ) {

                        $css_title_color = 'style="'. $title_color .'" ';

                    }



                    $sub_title_color = (

                        ! empty( $color_sub_title ) ) ?

                            sprintf( '%s', $color_sub_title) : '';

                    $css_sub_title_color = '';

                    if ( ! empty( $sub_title_color ) ) {

                        $css_sub_title_color = 'style="'. $sub_title_color .'" ';

                    }

                ?>


				<div class="list-contact-wrapper">

                    <?php if(kevinkissi_opt('phone_contact') != '') {?>
<!--<div class="col-sm-6 ">-->

                    <div class="col-md-3 col-md-offset-3 ">
                        <!--<div class="col-sm-6 ">-->

                        <div class="contact-wrapper">

                            <span class="icon" ><i class="fa fa-phone"></i></span>

                            <p>Voicemail: <?php echo nl2br(kevinkissi_opt('phone_contact')); ?></p>

                        </div>

                    </div>

                    <?php } ?>

                    <?php if(kevinkissi_opt('email_contact') != '') {?>

                   <div class="col-md-3">
                       <!--<div class="col-sm-6 ">-->

                        <div class="contact-wrapper">

                            <span class="icon"><i class="fa fa-envelope"></i></span>

                            <p>Email: <?php echo nl2br(kevinkissi_opt('email_contact')); ?></p>

                        </div>

                   </div>
                   
                     <!--</div>-->

                    <?php } ?>

                </div>

                <div class="clearfix"></div>

                <?php if(kevinkissi_opt('contact_form') != '') {?>

                <div class="contact-form-wrapper">

                	<h2 class="contact-title"><?php echo __('Get In Touch', 'kevinkissi')?></h2>

                	<?php echo do_shortcode( kevinkissi_opt('contact_form') ); ?>

                </div>

                <?php } ?>

</div>
</div>
