         <ul class="unstyled post-meta">
          <li class="date-color"><?php the_time('jS F Y') ?><i class="icon-pencil pull-right no-color"></i></li>
          <li><?php the_author(); ?><i class="icon-user pull-right"></i></li>
          <li><?php swift_list_cats(3); ?><i class="icon-reorder pull-right"></i></li>
          <li><?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?><i class="icon-comment pull-right"></i></li>
         </ul>