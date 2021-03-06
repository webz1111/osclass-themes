<!DOCTYPE html>
<html dir="ltr" lang="<?php echo str_replace('_', '-', osc_current_user_locale()) ; ?>">
    <head>
        <?php osc_current_web_theme_path('head.php') ; ?>
        <meta name="robots" content="noindex, nofollow" />
        <meta name="googlebot" content="noindex, nofollow" />
    </head>
    <body>
        <?php osc_current_web_theme_path('header.php') ; ?>
        <div class="container">
            <div class="contact">
                <?php twitter_show_flash_message() ; ?>
            </div>
            <div class="contact well">
                <form action="<?php echo osc_base_url(true); ?>" method="post" name="contact_form" onsubmit="return doContact();" >
                    <?php ContactForm::primary_input_hidden() ; ?>
                    <?php ContactForm::action_hidden() ; ?>
                    <?php ContactForm::page_hidden() ; ?>
                    <?php if( osc_is_web_user_logged_in() ) { ?>
                        <input type="hidden" name="yourName" value="<?php echo osc_logged_user_name() ; ?>" />
                        <input type="hidden" name="yourEmail" value="<?php echo osc_logged_user_email() ; ?>" />
                    <?php } ?>
                    <fieldset>
                        <legend><?php _e('Contact seller', 'twitter_bootstrap') ; ?></legend>
                        <div class="clearfix">
                            <label><?php _e('Item', 'twitter_bootstrap') ; ?></label>
                            <div class="input">
                                <span class="inline-help padding-top">
                                    <a href="<?php echo osc_item_url(); ?>"><?php echo osc_item_title() ; ?></a>
                                </span>
                            </div>
                        </div>
                        <div class="clearfix">
                            <label><?php _e('Subject', 'twitter_bootstrap') ; ?></label>
                            <div class="input">
                                <span class="inline-help padding-top">
                                    <a href="<?php echo osc_item_url(); ?>"><?php echo osc_item_title() ; ?></a>
                                </span>
                            </div>
                        </div>
                        <?php if( !osc_is_web_user_logged_in() ) { ?>
                        <div class="clearfix">
                            <label for="yourName"><?php _e('Your name', 'twitter_bootstrap') ; ?> *</label>
                            <div class="input">
                                <input class="xlarge" type="text" value="" name="yourName" id="yourName">
                            </div>
                        </div>
                        <div class="clearfix">
                            <label for="yourEmail"><?php _e('Your e-mail', 'twitter_bootstrap') ; ?> *</label>
                            <div class="input">
                                <input class="xlarge" type="text" value="" name="yourEmail" id="yourEmail">
                            </div>
                        </div>
                        <?php } ?>
                        <div class="clearfix">
                            <label for="phoneNumber"><?php _e('Phone number', 'twitter_bootstrap') ; ?> *</label>
                            <div class="input">
                                <input class="xlarge" type="text" value="" name="phoneNumber" id="phoneNumber">
                            </div>
                        </div>
                        <div class="clearfix">
                            <label for="message"><?php _e('Message', 'twitter_bootstrap') ; ?> *</label>
                            <div class="input">
                                <textarea class="xlarge" id="message" name="message" rows="6"></textarea>
                            </div>
                        </div>
                        <div class="clearfix">
                            <?php osc_show_recaptcha(); ?>
                        </div>
                        <div class="actions">
                            <button class="btn" type="submit"><?php _e('Send message', 'twitter_bootstrap') ; ?></button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
        <script type="text/javascript">
            var text_error_required = '<?php _e('This field is required', 'twitter_bootstrap') ; ?>' ;
            var text_valid_email    = '<?php _e('Enter a valid e-mail address', 'twitter_bootstrap') ; ?>' ;
        </script>
        <script type="text/javascript" src="<?php echo osc_current_web_theme_js_url('item_contact.js') ; ?>"></script>
        <?php osc_current_web_theme_path('footer.php') ; ?>
    </body>
</html>