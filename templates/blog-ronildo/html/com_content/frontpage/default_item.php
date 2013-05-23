<?php // @version $Id: default_item.php 11386 2009-01-04 02:34:35Z ian $
defined('_JEXEC') or die('Restricted access');


$uri	= & JFactory::getURI();
$live_url	= "http://".$uri->_host.$this->item->readmore_link;
/*
$bitly = new Bitly('ronildo', 'R_36201127965156a5cb78407ad71cd53c');
*/

?>
<time>
	<?php echo JHTML::_('date', $this->item->created, JText::_('%d %b <span>%Y</span>')); ?>
</time>

<h2 class="contentheading<?php echo $this->item->params->get('pageclass_sfx'); ?>">
	<?php if ($this->item->params->get('link_titles') && $this->item->readmore_link != '') : ?>
		<a href="<?php echo $this->item->readmore_link; ?>" class="contentpagetitle<?php echo $this->item->params->get('pageclass_sfx'); ?>">
			<?php echo $this->escape($this->item->title); ?></a>
	<?php else :
		echo $this->escape($this->item->title);
	endif; ?>
</h2>

<div class="clr"></div>

<div class="moreInfoWrapper">
	<div class="divToggle">
		<div class="botao-chaves"><a id="h_toggle" class="info" href="javascript:void(0)">toggle<span>Compartilhar o artigo</span></a></div>
	</div>

	<div class="posiciona-moreinfo posiciona-frontpage">
		<div class="moreInfo">
			<p class="buttonheading">
				<a rel="nofollow" title="Comentários" href="<?php echo $this->item->readmore_link; ?>#JOSC_TOP">
					<img alt="Comentários" src="images/M_images/comment.png"/>
				</a>
				
				<a rel="lightbox[external 290 290]" title="Enviar para um amigo" href="<?php echo 'index.php?option=com_mailto&tmpl=component&link='.base64_encode( $live_url ); ?>">
					<img alt="Comentários" src="images/M_images/emailButton.png"/>
				</a>
				
				<img src="<?php echo $this->baseurl ?>/templates/<?php echo $mainframe->getTemplate(); ?>/images/trans.gif" alt="<?php echo JText::_('attention open in a new window'); ?>" />
				<?php if ($this->item->params->get('show_pdf_icon')) :
					echo JHTML::_('icon.pdf', $this->item, $this->item->params, $this->access);
				endif;
				if ($this->item->params->get('show_print_icon')) :
					echo JHTML::_('icon.print_popup', $this->item, $this->item->params, $this->access);
				endif;
				/*
				if ($this->item->params->get('show_email_icon')) :
					echo JHTML::_('icon.email', $this->item, $this->item->params, $this->access);
				endif; */ ?>
				<!-- a rel="nofollow" title="Tweet This!" href="http://twitter.com/home?status=<?php //echo $this->item->title." - ".$bitly->shorten($live_url); ?> (via @ronildo)">
					<img alt="Twiiter" src="images/M_images/twitter-icon.gif"/>
				</a -->
				<a share_url="<?php echo $live_url; ?>" rel="nofollow" target="_blank" name="fb_share" href="http://www.facebook.com/sharer.php?u=<?php echo $live_url; ?>&t=[ Ronildo Costa ] - <?php echo $this->item->title; ?>&src=sp">
					<img alt="Twiiter" src="images/M_images/facebook-icon.gif"/>
				</a>
				<!-- 
				<div id="orkut-button"></div>
				<script type="text/javascript" src="http://www.google.com/jsapi"></script>
				<script type="text/javascript">
					google.load('orkut.share', '1');
					google.setOnLoadCallback(function() {
						new google.orkut.share.Button({
							style:google.orkut.share.Button.STYLE_MINI,
							title: '<?php echo $this->item->title; ?>',
							destination: '<?php echo $live_url; ?>'
						}).draw('orkut-button');
					});
				</script>
				-->
			</p>
		</div>
	</div>
</div>

<?php echo $this->article->event->beforeDisplayContent; ?>

<?php if (isset ($this->article->toc)) :
	echo $this->article->toc;
endif; ?>

<div class="artigo">
	<?php echo JFilterOutput::ampReplace($this->item->text); ?>
</div>

<?php echo $this->article->event->afterDisplayContent; ?>