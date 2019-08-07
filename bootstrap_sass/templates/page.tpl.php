<?php
/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template in this directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see bootstrap_preprocess_page()
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see bootstrap_process_page()
 * @see template_process()
 * @see html.tpl.php
 *
 * @ingroup templates
 */
 $breadcrumb_array = drupal_get_breadcrumb();
?>
<div class="wrapper">
  <header role="banner" id="page-header" class="header-wrapper container-fluid">
    <div class="row">
      <div id="logo" class="logo col-md-2 col-sm-12">
        <a class="logo navbar-btn pull-left" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>">
          <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
        </a>
      </div>
      <div class="header-body col-md-10">
        <div class="header-body-top row">
          <div id="header-explore" class="col-md-6">
            <?php
               $block =block_load('block',252);
               $output = drupal_render(_block_get_renderable_array(_block_render_blocks(array($block))));
               print $output;
            ?>
          </div>
          <div id="header-menu" class="col-md-6 pull-right">
            <?php
            $menu = menu_navigation_links('menu-header-menu');
            print theme('links__menu_header_menu', array('links' => $menu));
            ?>
          </div>
        </div>
        <div class="header-body-bottom row">
          <div id="branding" class="sitename col-md-8 row">
            <div id="logo-sm" class="logo-sm">
              <a class="logo navbar-btn pull-left" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>">
                <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
              </a>
            </div>
            <div id="sitename" class="sitename-text">
              <a class="" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>"><h1 class=""><?php print $site_name; ?></h1></a>
            </div>
          </div>
          <div class="block-search col-md-4">
            <?php global $search_form; print render(drupal_get_form('search_form')); ?>
          </div>
        </div>
      </div>
    </div>
  </header> <!-- /#page-header -->

<div class="navbar-wrapper">
  <!-- <div id="" class="<?php print $navbar_classes; ?>"> -->
  <div class="navbar navbar-inverse container-fluid">
    <div id="main-menu">
      <div class="content">
        <ul class="menu">
          <?php
            $full_menu_tree = menu_tree_all_data("main-menu");

            $a = 1;
            foreach($full_menu_tree as $main_array) {
              if (!$main_array['link']['hidden']) {
                echo '<li class="menuitem' . $a++ . '">';
                $link_alias = drupal_get_path_alias($main_array['link']['link_path']);
                if($main_array['link']['link_title'] != "Home") {
                  echo '<a href="/'.$link_alias.'">'.$main_array['link']['link_title'].'</a>';
                }
                if($main_array['link']['has_children'] == 1) {
                  echo "<ul>";
                  foreach ($main_array['below'] as $sub_menu_array) {
                    if (!$sub_menu_array['link']['hidden']) {
                      echo '<li>';
                      $link_alias = drupal_get_path_alias($sub_menu_array['link']['link_path']);
                      echo '<a href="/'.$link_alias.'">'.$sub_menu_array['link']['link_title'].'</a>';
                      echo "</li>";
                    }
                  }
                  echo "</ul>";
                }
                echo "</li>";
              }
            }
          ?>
        </ul>
      </div>
    </div> <!-- end main-menu -->
    <?php if ($main_menu || $secondary_menu): ?>
      <nav class="navigation">
        <?php print theme('links__system_main_menu', array('links' => $main_menu, 'attributes' => array('id' => 'main-menu', 'class' => array('links', 'inline', 'clearfix', 'main-menu')), 'heading' => array('text' => t('Main menu'),'level' => 'h2','class' => array('element-invisible')))); ?>
        <?php print theme('links__system_secondary_menu', array('links' => $secondary_menu, 'attributes' => array('id' => 'secondary-menu', 'class' => array('links', 'inline', 'clearfix', 'secondary-menu')), 'heading' => array('text' => t('Secondary menu'),'level' => 'h2','class' => array('element-invisible')))); ?>
      </nav>
    <?php endif; ?>
    <?php print $content; ?>

    <!--CUSTOM MOBILE MENU-->
    <form method="" action="" id="mobile-menu-form">
    	<div class="label-wrapper">
			  <label for="checkMenu" id="mobile-menu-tab"><span>&equiv;</span> Menu</label>
		  </div>
		  <input type="checkbox" id="checkMenu" />
	    <ul id="mobile-menu">
        <?php
          $full_menu_tree = menu_tree_all_data("main-menu");

          foreach($full_menu_tree as $main_array) {
            if (!$main_array['link']['hidden']) {
              echo '<li>';
              $link_alias = drupal_get_path_alias($main_array['link']['link_path']);
              if($main_array['link']['link_title'] != "Home") {
                echo '<a href="/'.$link_alias.'">'.$main_array['link']['link_title'].'</a>';
              }
              if($main_array['link']['has_children'] == 1) {
                echo "<ul>";
                foreach ($main_array['below'] as $sub_menu_array) {
                  if (!$sub_menu_array['link']['hidden']) {
                    echo '<li>';
                    $link_alias = drupal_get_path_alias($sub_menu_array['link']['link_path']);
                    echo '<a href="/'.$link_alias.'">'.$sub_menu_array['link']['link_title'].'</a>';
                    echo "</li>";
                  }
                }
                echo "</ul>";
              }
              echo "</li>";
            }
          }
        ?>
		  </ul>
		  <input type="submit" value="submit" id="mobileSubmit" name="submit" />
	  </form>
  </div>
</div>

<?php if (!empty($page['hero'])): ?>
  <div class="hero-wrapper">
    <div class="container">
      <?php print render($page['hero']); ?>
    </div>

  </div>
<?php endif; ?>

<div class="main-container <?php print $container_class; ?>">



  <div class="row">

    <?php if (!empty($page['sidebar_first'])): ?>
      <aside class="col-sm-3" role="complementary">
        <?php print render($page['sidebar_first']); ?>
      </aside>  <!-- /#sidebar-first -->
    <?php endif; ?>

    <section<?php print $content_column_class; ?>>
      <?php if (!empty($page['highlighted'])): ?>
        <div class="highlighted jumbotron"><?php print render($page['highlighted']); ?></div>
      <?php endif; ?>
      <?php if (!empty($breadcrumb)): print $breadcrumb; endif;?>
      <?php //if (!empty($breadcrumb)): print $breadcrumb_array[0]; endif;?>
      <a id="main-content"></a>
      <?php print render($title_prefix); ?>
      <?php if (!empty($title)): ?>
        <h1 class="page-header"><?php print $title; ?></h1>
      <?php endif; ?>
      <?php print render($title_suffix); ?>
      <?php print $messages; ?>
      <?php if (!empty($tabs)): ?>
        <?php print render($tabs); ?>
      <?php endif; ?>
      <?php if (!empty($page['help'])): ?>
        <?php print render($page['help']); ?>
      <?php endif; ?>
      <?php if (!empty($action_links)): ?>
        <ul class="action-links"><?php print render($action_links); ?></ul>
      <?php endif; ?>
      <?php print render($page['content']); ?>
      <?php if (!empty($page['content_beta'])): ?>
        <div class="content-beta-wrapper content-section row">
          <div class="content-beta-inner content-inner <?php print $container_class; ?>">
            <?php print render($page['content_beta']); ?>
          </div>
        </div>
      <?php endif; ?>
      <?php if (!empty($page['content_gamma'])): ?>
        <div class="content-gamma-wrapper content-section row">
          <div class="content-gamma-inner content-inner <?php print $container_class; ?>">
            <?php print render($page['content_gamma']); ?>
          </div>
        </div>
      <?php endif; ?>
      <?php if (!empty($page['content_omega'])): ?>
        <div class="content-omega-wrapper content-section row">
          <div class="content-omega-inner content-inner <?php print $container_class; ?>">
            <?php print render($page['content_omega']); ?>
          </div>
        </div>
      <?php endif; ?>
    </section>

    <?php if (!empty($page['sidebar_second'])): ?>
      <aside class="col-sm-3" role="complementary">
        <?php print render($page['sidebar_second']); ?>
      </aside>  <!-- /#sidebar-second -->
    <?php endif; ?>

  </div>
</div>

</div> <!-- End wrapper class -->
<?php if (!empty($page['footer_pre'])): ?>
  <div class="footer_pre">
    <div class="<?php print $container_class; ?>"><?php print render($page['footer_pre']); ?></div>
  </div>
<?php endif; ?>
<footer class="footer <?php print $container_class; ?>">
  <?php if (!empty($page['footer'])): ?>
    <?php print render($page['footer']); ?>
  <?php endif; ?>
  <?php if (!empty($page['footer_beta'])): ?>
    <?php print render($page['footer_beta']); ?>
  <?php endif; ?>
  <?php if (!empty($page['footer_gamma'])): ?>
    <?php print render($page['footer_gamma']); ?>
  <?php endif; ?>
  <?php if (!empty($page['footer_omega'])): ?>
    <?php print render($page['footer_omega']); ?>
  <?php endif; ?>
</footer>
