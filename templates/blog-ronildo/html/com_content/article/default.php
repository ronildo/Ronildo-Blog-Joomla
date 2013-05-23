<?php
defined('_JEXEC') or die('Restricted access');

// Encurta URL do Google
include_once (dirname(__FILE__).DS.'/../../../class/googl.php');

$uri			= & JFactory::getURI();
$live_url		= "http://".$uri->_host.$this->article->readmore_link;
$Googl			= new Googl();
$url_encurtada	= $Googl->shorten($live_url);

?>
<article>

<time>
	<?php echo JHTML::_('date', $this->article->created, JText::_('%d %b <span>%Y</span>')); ?>
</time>

<h2 class="componentheading<?php echo $this->params->get('pageclass_sfx'); ?>">
        <?php echo $this->escape($this->params->get('page_title')); ?>
</h2>

<div class="clr"></div>

<div class="moreInfoWrapper">
	<div class="divToggle">
		<div class="botao-chaves"><a id="h_toggle" class="info" href="javascript:void(0)">toggle<span>Compartilhar o artigo</span></a></div>
	</div>

	<div class="posiciona-moreinfo posiciona-article">
		<div class="moreInfo">
			<p class="buttonheading">
			
				<a rel="nofollow" title="Comentários" href="#JOSC_TOP">
					<img alt="Comentários" src="images/M_images/comment.png"/>
				</a>
				
				<a rel="lightbox[external 290 290]" title="Enviar para um amigo" href="<?php echo 'index.php?option=com_mailto&tmpl=component&link='.base64_encode( $live_url ); ?>">
					<img alt="Comentários" src="images/M_images/emailButton.png"/>
				</a>
				<?php
				if ($this->print) :
					echo JHTML::_('icon.print_screen', $this->article, $this->params, $this->access);
					elseif ($this->params->get('show_pdf_icon') || $this->params->get('show_print_icon') || $this->params->get('show_email_icon'))
				: ?>
				<?php /* if ($this->params->get('show_email_icon')) :
						echo JHTML::_('icon.email', $this->article, $this->params, $this->access);
					endif; */
					if ($this->params->get('show_print_icon')) :
						echo JHTML::_('icon.print_popup', $this->article, $this->params, $this->access);
					endif;
					if ($this->params->get('show_pdf_icon')) :
						echo JHTML::_('icon.pdf', $this->article, $this->params, $this->access);
					endif;
				endif;
			?>
				<a rel="nofollow" target="_blank" title="Tweet This!" href="http://twitter.com/home?status=<?php echo $this->article->title." - ".$url_encurtada; ?> (via @ronildo)">
					<img alt="Twiiter" src="images/M_images/twitter-icon.gif"/>
				</a>
				<a share_url="<?php echo $live_url; ?>" rel="nofollow" target="_blank" title="Share on Facebook" name="fb_share" href="http://www.facebook.com/sharer.php?u=<?php echo $live_url; ?>&t=[ Ronildo Costa ] - <?php echo $this->article->title; ?>&src=sp"><img alt="FaceBook" src="images/M_images/facebook-icon.gif"/></a></p>
		</div>
	</div>
</div>


				<!--
				<div id="orkut-button"></div>
				<script type="text/javascript" src="http://www.google.com/jsapi"></script>
				<script type="text/javascript">
					google.load('orkut.share', '1');
					google.setOnLoadCallback(function() {
						new google.orkut.share.Button({
							style:google.orkut.share.Button.STYLE_MINI,
							title: '<?php echo $this->article->title; ?>',
							destination: '<?php echo $live_url; ?>'
						}).draw('orkut-button');
					});
				</script>
				-->

<div class="clr"></div>

<?php echo $this->article->event->beforeDisplayContent; ?>

<?php if (isset ($this->article->toc)) :
	echo $this->article->toc;
endif; ?>

<div class="artigo">
	<?php echo JFilterOutput::ampReplace($this->article->text); ?>
</div>

<?php echo $this->article->event->afterDisplayContent; ?>

</article>