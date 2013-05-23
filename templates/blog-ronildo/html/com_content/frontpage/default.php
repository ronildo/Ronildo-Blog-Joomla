<?php // @version $Id: default.php 10498 2008-07-04 00:05:36Z ian $
defined('_JEXEC') or die('Restricted access');
include_once (dirname(__FILE__).DS.'/../../../class/bitly.php');
?>

<?php if ($this->params->get('show_page_title',1)) : ?>
<h1 class="componentheading<?php echo $this->params->get('pageclass_sfx'); ?>">
	<?php echo $this->escape($this->params->get('page_title')); ?>
</h1>
<?php endif; ?>

<article>
	<?php $i = $this->pagination->limitstart;
	$rowcount = $this->params->def('num_leading_articles', 1);
	for ($y = 0; $y < $rowcount && $i < $this->total; $y++, $i++) : ?>
			<?php $this->item =& $this->getItem($i, $this->params);
						
            if ($i == 1)
            {
              echo "
                <div class='adsense-conteudo adsense-1'>
                  <script type=\"text/javascript\"><!--
                    google_ad_client = \"ca-pub-6689205736841240\";
                    /* Anuncio 1 do conteœdo */
                    google_ad_slot = \"2347787424\";
                    google_ad_width = 468;
                    google_ad_height = 15;
                    //-->
                    </script>
                    <script type=\"text/javascript\"
                    src=\"http://pagead2.googlesyndication.com/pagead/show_ads.js\">
                  </script>
                </div>
              ";
            }
            if ($i == 2)
            {
              echo "
                    <div class='adsense-conteudo adsense-2'>
                      <script type=\"text/javascript\"><!--
                        google_ad_client = \"ca-pub-6689205736841240\";
                        /* Anœncio 2 do conteœdo */
                        google_ad_slot = \"2792132600\";
                        google_ad_width = 468;
                        google_ad_height = 15;
                        //-->
                        </script>
                        <script type=\"text/javascript\"
                        src=\"http://pagead2.googlesyndication.com/pagead/show_ads.js\">
                      </script>
                    </div>
                   ";
            }
            
			echo $this->loadTemplate('item'); ?>
			
	<?php endfor; ?>

	<?php $introcount = $this->params->def('num_intro_articles', 4);
	if ($introcount) :
		$colcount = $this->params->def('num_columns', 2);
		if ($colcount == 0) :
			$colcount = 1;
		endif;
		$rowcount = (int) $introcount / $colcount;
		$ii = 0;
		for ($y = 0; $y < $rowcount && $i < $this->total; $y++) : ?>
			<div class="article_row<?php echo $this->params->get('pageclass_sfx'); ?>">
				<?php for ($z = 0; $z < $colcount && $ii < $introcount && $i < $this->total; $z++, $i++, $ii++) : ?>
					<div class="article_column column<?php echo $z + 1; ?> cols<?php echo $colcount; ?>" >
						<?php $this->item =& $this->getItem($i, $this->params);
						echo $this->loadTemplate('item'); ?>
					</div>
					<span class="article_separator">&nbsp;</span>
				<?php endfor; ?>
				<span class="row_separator<?php echo $this->params->get('pageclass_sfx'); ?>">&nbsp;</span>
			</div>
		<?php endfor;
	endif; ?>

	<?php $numlinks = $this->params->def('num_links', 4);
	if ($numlinks && $i < $this->total) : ?>
	<div class="blog_more<?php echo $this->params->get('pageclass_sfx'); ?>">
		<?php $this->links = array_slice($this->items, $i - $this->pagination->limitstart, $i - $this->pagination->limitstart + $numlinks);
		echo $this->loadTemplate('links'); ?>
	</div>
	<?php endif; ?>

	<?php if ($this->params->def('show_pagination', 2) == 1  || ($this->params->get('show_pagination') == 2 && $this->pagination->get('pages.total') > 1)) : ?>
		<?php if( $this->pagination->get('pages.total') > 1 ) : ?>
		<p class="counter">
			<?php echo $this->pagination->getPagesCounter(); ?>
		</p>
		<?php endif; ?>
		<?php if ($this->params->def('show_pagination_results', 1)) : ?>
			<?php echo $this->pagination->getPagesLinks(); ?>
		<?php endif; ?>
	<?php endif; ?>
</article>
