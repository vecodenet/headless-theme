<?php

declare(strict_types = 1);

/**
 * Headless
 * Headless theme, for headless WordPress instances.
 * @author Vecode
 * @copyright Copyright (c) 2023 Vecode. All rights reserved.
 */

# Disable ReST API
add_filter( 'rest_authentication_errors', function($access) {
  $disable = get_theme_mod('headless_disable_rest', true);
  if ($disable) {
    return new WP_Error('rest_disabled', __('The WordPress REST API has been disabled.'), [
      'status' => rest_authorization_required_code()
    ]);
  }
});

# Customizer
add_action( 'customize_register', function($wp_customize) {
  $wp_customize->add_section( 'headless_options' , [
    'title'      => __('Options'),
    'priority'   => 30,
  ]);
  $wp_customize->add_setting( 'headless_disable_rest' , [
    'default'    => true,
    'transport'  => 'refresh',
  ]);
  $wp_customize->add_control('headless_disable_rest', [
    'label'      => __('ReST API'),
    'section'    => 'headless_options',
    'settings'   => 'headless_disable_rest',
    'type'       => 'radio',
    'choices' => [
      true  => __('Disabled'),
      false => __('Enabled'),
    ],
  ]);
});