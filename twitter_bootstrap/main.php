<!DOCTYPE html>
<html dir="ltr" lang="<?php echo str_replace('_', '-', osc_current_user_locale()); ?>">
    <head>
        <?php osc_current_web_theme_path('head.php') ; ?>
        <meta name="robots" content="index, follow" />
        <meta name="googlebot" content="index, follow" />
    </head>
    <body>
        <?php osc_current_web_theme_path('header.php') ; ?>
        <?php osc_current_web_theme_path('inc.search.php') ; ?>
        <div class="container margin-top-10">
            <?php twitter_show_flash_message() ; ?>
        </div>
        <!-- content -->
        <div class="container container-fluid latest_ads">
            <div class="sidebar">
                <div class="row">
                    <div class="span4 columns">
                        <h3><?php _e('Pages', 'twitter_bootstrap') ; ?></h3>
                        <ul class="unstyled">
                            <?php while( osc_has_static_pages() ) { ?>
                            <li><a href="<?php echo osc_static_page_url() ; ?>"><?php echo osc_static_page_title() ; ?></a></li>
                            <?php } ?>
                            <li><a href="<?php echo osc_contact_url(); ?>"><?php _e('Contact', 'twitter_bootstrap') ; ?></a></li>
                        </ul>
                    </div>
                </div>
                <?php if ( !View::newInstance()->_exists('list_contries') ) {
                            View::newInstance()->_exportVariableToView('list_regions', Search::newInstance()->listRegions('%%%%', '>=', 'region_name ASC') ) ; 
                      }

                      if( osc_count_list_regions() ) { ?>
                <div class="row">
                    <div class="span4 columns">
                        <h3><?php _e('Regions', 'twitter_bootstrap') ; ?></h3>
                        <ul class="unstyled">
                            <?php while( osc_has_list_regions() ) { ?>
                            <li>
                                <a href="<?php echo osc_search_url( array( 'sRegion' => osc_list_region_name() ) ) ; ?>"><?php echo osc_list_region_name() ; ?></a> (<?php echo osc_list_region_items() ; ?>)
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <?php } ?>
            </div>
            <div class="content">
                <h1><?php _e('Latest Items', 'twitter_bootstrap') ; ?></h1>
                <?php if( osc_count_latest_items() == 0) { ?>
                <p>
                    <?php _e('No Latest Items', 'twitter_bootstrap') ; ?>
                </p>
                <?php } else { ?>
                    <?php while ( osc_has_latest_items() ) { ?>
                    <div class="line">
                        <div class="photo">
                            <?php if( osc_count_item_resources() ) { ?>
                            <a href="<?php echo osc_item_url() ; ?>">
                                <img src="<?php echo osc_resource_thumbnail_url() ; ?>" width="100px" height="75px" title="<?php echo osc_item_title(); ?>" alt="<?php echo osc_item_title(); ?>" />
                            </a>
                            <?php } else { ?>
                            <img src="<?php echo osc_current_web_theme_url('images/no_photo.gif') ; ?>" alt="" title=""/>
                            <?php } ?>
                        </div>
                        <div class="description">
                            <h2><?php if( osc_price_enabled_at_items() ) { ?> <small><strong><?php echo osc_item_formated_price() ; ?></strong></small> &middot; <?php } ?><a href="<?php echo osc_item_url() ; ?>"><?php echo osc_item_title(); ?></a></h2>
                            <p class="gray"><?php printf(__('<strong>Publish date</strong>: %s', 'twitter_bootstrap'), osc_format_date( osc_item_pub_date() ) ) ; ?></p>
                            <?php
                                $location = array() ;
                                if( osc_item_country() != '' ) {
                                    $location[] = sprintf( __('<strong>Country</strong>: %s', 'twitter_bootstrap'), osc_item_country() ) ;
                                }
                                if( osc_item_region() != '' ) {
                                    $location[] = sprintf( __('<strong>Region</strong>: %s', 'twitter_bootstrap'), osc_item_region() ) ;
                                }
                                if( osc_item_city() != '' ) {
                                    $location[] = sprintf( __('<strong>City</strong>: %s', 'twitter_bootstrap'), osc_item_city() ) ;
                                }
                                if( count($location) > 0) {
                            ?>
                            <p class="gray"><?php echo implode(' &middot; ', $location) ; ?></p>
                            <?php } ?>
                            <p><?php echo osc_highlight( strip_tags( osc_item_description() ) ) ; ?></p>
                        </div>
                    </div>
                    <?php } ?>
                    <?php if( osc_count_latest_items() == osc_max_latest_items() ) { ?>
                    <div class="row show-all-ads">
                        <div class="span12 columns">
                            <a href="<?php echo osc_search_show_all_url();?>"><strong><?php _e("See all offers", 'twitter_bootstrap') ; ?> &raquo;</strong></a>
                        </div>
                    </div>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
        <?php osc_current_web_theme_path('footer.php') ; ?>
    </body>
</html>