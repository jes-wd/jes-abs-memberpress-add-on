<?php

//ADD A SUPPORT TAB TO THE NAV MENU
function mepr_add_some_tabs($user) {
  $support_active = (isset($_GET['action']) && $_GET['action'] == 'premium-support')?'mepr-active-nav-tab':'';
  ?>
    <span class="mepr-nav-item premium-support <?php echo $support_active; ?>">
      <a href="/account/">Back to Account</a>
    </span>
  <?php
}
add_action('mepr_account_nav', 'mepr_add_some_tabs');

//YOU CAN DELETE EVERYTHING BELOW THIS LINE -- IF YOU PLAN TO REDIRECT
//THE USER TO A DIFFERENT PAGE INSTEAD OF KEEPING THEM ON THE SAME PAGE
//ADD THE CONTENT FOR THE NEW SUPPORT TAB ABOVE
function mepr_add_tabs_content($action) {
  if($action == 'premium-support'): //Update this 'premium-support' to match what you put above (?action=premium-support)
  ?>
    <div id="custom-support-form">
      <form action="" method="post">
        <label for="subject">Enter Subject:</label><br/>
        <input type="text" name="subject" id="subject" />
        
        <br/><br/>
        
        <label for="content">Enter Content:</label><br/>
        <input type="text" name="content" id="content" />
        
        <br/><br/>
        
        <input type="submit" name="premium-support-submit" value="Submit" />
      </form>
    </div>
  <?php
  endif;
}
add_action('mepr_account_nav_content', 'mepr_add_tabs_content');