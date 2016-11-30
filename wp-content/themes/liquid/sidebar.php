           <div class="col-md-4 sidebar">
             <div class="widgets">
                <?php if(! dynamic_sidebar('sidebar')){ ?>
                 <!-- no widget -->
                 <div class="cats">
                  <?php get_search_form(); ?>
                  <h4><?php esc_html_e( 'Categories', 'liquid' ); ?></h4>
                  <ul class="list-unstyled">
                    <?php wp_list_categories(); ?>
                  </ul>
                 </div>
                 <div class="tags">
                  <h4><?php esc_html_e( 'Tags', 'liquid' ); ?></h4>
                  <ul class="list-unstyled">
                    <?php
                    $args = array(
                        'taxonomy' => 'post_tag',
                        'title_li' => ''
                    );
                    wp_list_categories( $args );
                    ?>
                  </ul>
                 </div>
                <?php } ?>
             </div>
           </div>