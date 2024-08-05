<?php

  declare(strict_types = 1);

  /**
   * Headless
   * Headless theme, for headless WordPress instances.
   * @author Vecode
   * @copyright Copyright (c) 2023 Vecode. All rights reserved.
   */

  global $wp_customize;

  $in_customizer = isset( $wp_customize );
  $redirect = get_theme_mod('headless_redirect_url', null);
  if (!$redirect) {
    wp_die('Redirect not defined, please set the redirect URL in the theme customizer.');
  }
  if ( $in_customizer || is_user_logged_in() ):
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Headless</title>
    <link rel="icon" href="<?php echo get_template_directory_uri() ?>/favicon.svg">
    <style>
      html         { height: 100vh; }
      body         { background: #FFF; height: 100%; display: flex; flex-direction: column; margin: 0; font-family: system-ui, sans-serif; font-weight: normal; }
      section      { flex: 1 0 0; text-align: center; display: flex; justify-content: center; align-items: center; }
      img          { max-width: 100%; height: auto; }
      a            { text-decoration: none; color: #222; transition: all 350ms; }
      a span       { position: relative; transition: all 350ms ease-out; display: inline-block; }
      a:hover      { text-decoration: none; color: #1976D2; }
      a:hover span { transform: translateX(0.25rem); }
    </style>
  </head>
  <body>
    <section>
      <div>
        <img src="<?php echo get_template_directory_uri() ?>/logo.svg" width="640" alt="">
        <?php if (! $in_customizer ): ?>
          <p><a href="<?php echo admin_url() ?>"> <?php _e('Go to the dashboard') ?> <span>&rarr;</span></a></p>
        <?php endif ?>
      </div>
    </section>
  </body>
</html>
<?php else: ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta content="0; URL='<?php echo $redirect ?>'" http-equiv="refresh">
    <script type="text/javascript">
      window.location = '<?php echo $redirect ?>';
    </script>
  </head>
</html>
<?php endif; ?>
