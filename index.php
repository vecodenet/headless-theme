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
  $redirect = Env\env('REDIRECT_URL') ?? null;
  if (!$redirect) {
    wp_die('Redirect not defined, please add a REDIRECT_URL entry in your ENV file.');
  }
  if (! $in_customizer ):
?>
<meta content="0; URL='<?php echo $redirect ?>'" http-equiv="refresh">
<script type="text/javascript">
  window.location = '<?php echo $redirect ?>';
</script>
<?php else: ?>
  <html>
    <style>
      body    { background: #FFF; height: 100%; display: flex; flex-direction: column; margin: 0; }
      section { flex: 1 0 0; text-align: center; display: flex; font-display: column; justify-content: center; align-items: center; }
      img     { max-width: 100%; height: auto; }
    </style>
    <body>
      <section>
        <img src="<?php echo get_template_directory_uri() ?>/logo.svg" width="640" alt="">
      </section>
    </body>
  </html>
<?php endif ?>