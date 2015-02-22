<?php get_header(); ?>
            <!-- main -->
            <div id="main">
                <div class="headline">
                    <h1 class="headline_title"><?php echo get_the_title(); ?></h1>
                    <?php if(function_exists("wp_social_bookmarking_light_output_e")){wp_social_bookmarking_light_output_e(null, get_permalink(), the_title("", "", false));}?>
                </div>
            <?php 
            if (have_posts()) : // WordPress ループ
                while (have_posts()) : the_post(); // 繰り返し処理開始 ?>
                    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                    <!-- ここに謎に表示されるソーシャルボタンたちを消したい -->

                    <?php the_content(); ?>

                    <?php 
                    $args = array(
                        'before' => '<div class="page-link">',
                        'after' => '</div>',
                        'link_before' => '<span>',
                        'link_after' => '</span>',
                    );
                    wp_link_pages($args); ?>

                    </div>
                <?php 
                endwhile; // 繰り返し処理終了		
                else : // ここから記事が見つからなかった場合の処理 ?>
                <div class="post">
                    <h2>記事はありません</h2>
                    <p>お探しの記事は見つかりませんでした。</p>
                </div>
                <?php
                endif;
                ?>
            </div>
            <!-- /main -->
<?php get_footer(); ?>
