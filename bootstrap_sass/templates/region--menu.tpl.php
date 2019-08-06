<div<?php print $attributes; ?>>
  <div<?php print $content_attributes; ?>>
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
