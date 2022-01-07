<?php

/**
 * Footer Contact Block
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'seigal-contact-block-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'seigal-contact-block';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

$seigal_contact_block = get_field('seigal_contact_block');
$social_media = get_field('social_media', 'options');
$address = get_field('address', 'options');
$phone = get_field('phone', 'options');
$email = get_field('email', 'options');

mapi_write_log($address);

if($seigal_contact_block) :
echo '<div id="' . esc_attr($id) . '" class="' . esc_attr($className) . '">';
  echo '<div class="container">';
    echo '<div class="row">';


      echo '<div class="col-12 col-md-6">';
        echo '<div class="form-container">';
          gravity_form( $seigal_contact_block['form'], true, true, false, null, true, 999, true );
        echo '</div>';
      echo '</div>';

      echo '<div class="col-12 col-md-6 my-auto">';
        echo '<div class="contact-container">';
          if($social_media) :
            echo '<div class="contact-section social-media">';
              foreach ($social_media as $key => $icon) :
                echo '<a href="' . $icon['url'] . '" class="me-1" target="_blank"><i class="' . $icon['icon']. '"></i></a>';
              endforeach;
            echo '</div>';
          endif;
          if($address) :
            echo '<div class="contact-section address">';
              echo '<span class="label">Mailing Address</span>';
              echo $address['formatted_address'];
            echo '</div>';
          endif;
          if($phone) :
            echo '<div class="contact-section phone">';
              echo '<span class="label">Telephone</span>';
              echo '<a href="tel:' . $phone . '">' . mapi_format_phone($phone) . '</a>';
            echo '</div>';
          endif;
          if($email) :
            echo '<div class="contact-section email">';
              echo '<span class="label">Email</span>';
              echo '<a href="mailto:' . $email . '">' . $email . '</a>';
            echo '</div>';
          endif;
        echo '</div>';
      echo '</div>';



    echo '</div>';
  echo '</div>';
echo '</div>';
endif;
