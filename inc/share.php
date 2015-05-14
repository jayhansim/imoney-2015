<div class="post__share">
  <div class="share__total">Share this!</div>
  <div class="share__channels">
  	<ul>
  		<li class="share__fb">
  			<a href="//www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
  				<i class="icon icon__share icon__share--fb"></i>
  				Share <span></span>
  				</a>
  		</li><!--
  		--><li class="share__tw">
  			<a href="https://twitter.com/share?text=<?php the_title(); ?>&via=iMoneyMY&url=<?php the_permalink(); ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
  				<i class="icon icon__share icon__share--tw"></i>
  				Tweet <span></span>
  			</a>
  		</li><!--
  		--><li class="share__email">
  			<a href="mailto:?subject=<?php the_title(); ?>&amp;body=Check this article on iMoney <?php the_permalink(); ?>">
  				<i class="icon icon__share icon__share--mail"></i>
  				Email
  			</a>
  		</li><!--
  		--><li class="share__whatsapp">
  			<a href="whatsapp://send?text=Read this article on iMoney: <?php the_title(); ?> - <?php the_permalink(); ?>">
  				<i class="icon icon__share icon__share--wa"></i>
  				WhatsApp
  			</a>
  		</li>
  	</ul>
  </div>
</div>