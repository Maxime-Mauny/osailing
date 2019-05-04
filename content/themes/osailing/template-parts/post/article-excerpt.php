<section class="articles" id="articles">
<article class="article">
    <img src="https://source.unsplash.com/800x600/?people" alt="" class="article__img">
    <div class="article__content">
      <h2 class="article__content__title">
      <?php the_title(); ?>
      </h2>
      <p class="article__content__text">
      <?php the_excerpt(); ?>
      </p>
      <a href="<?php the_permalink(); ?>" class="button">Lire la suite</a>
    </div>
</article>
</section>