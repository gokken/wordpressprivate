<?php
/*
Plugin Name: Show Text
Plugin URI: http://www.example.com/plugin
Description: テキストを表示するだけのプラグイン
Author: kensuke goto
Version: 0.1
Author URI: http://www.example.com
*/

class ShowText {
  function __construct() {
    add_action('admin_menu', array($this, 'add_pages'));
    add_action( 'wp_enqueue_style', 'add_css_files' );
  }
  function add_css_files() {
      // サイト共通のCSSの読み込み
      wp_enqueue_style( 'base', get_template_directory_uri() . '/css/base.css', "", '20161128' );
  }
  function add_pages() {
    add_menu_page('テキスト設定','テキスト設定',  'level_8', __FILE__, array($this,'show_text_option_page'), '', 26);
  }

  function show_text_option_page() {
  //$_POST['showtext_options'])があったら保存
  var_dump($_POST['showtext_options']);
  if ( isset($_POST['showtext_options'])) {
      check_admin_referer('shoptions');
      $opt = $_POST['showtext_options'];
      update_option('showtext_options', $opt);
      ?>
      <div class="updated fade">
        <p>
          <strong>
            <?php _e('Options saved.'); ?></strong></p></div><?php
  }
  ?>
  <div class="wrap">
  <div id="icon-options-general" class="icon32"><br /></div><h2>テキスト設定</h2>
      <form action="" method="post">
          <?php
          wp_nonce_field('shoptions');
          $opt = get_option('showtext_options');
          $show_text = isset($opt['text']) ? $opt['text']: null;
          var_dump($show_text);
          ?>
          <table class="form-table">
                <tr valign="top">
                    <th scope="row"><label for="inputtext">テキスト</label></th>
                    <td><input name="showtext_options[text]" type="text" id="inputtext" value="<?php  echo $show_text ?>" class="regular-text" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row"><label for="inputtext">テキスト</label></th>
                    <td><input name="showtext_options[text]" type="text" id="inputtext" value="<?php  echo $show_text ?>" class="regular-text" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row"><label for="inputtext">テキスト</label></th>
                    <td><input name="showtext_options[text]" type="text" id="inputtext" value="<?php  echo $show_text ?>" class="regular-text" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row"><label for="inputtext">テキスト</label></th>
                    <td><input name="showtext_options[text]" type="text" id="inputtext" value="<?php  echo $show_text ?>" class="regular-text" /></td>
                </tr>
          </table>
          <p class="submit"><input type="submit" name="Submit" class="button-primary" value="変更を保存" /></p>
      </form>
  <!-- /.wrap --></div>
  <?php
  }
}
$showtext = new ShowText;
