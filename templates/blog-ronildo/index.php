<?php
defined('_JEXEC') or die('Restricted access');
include_once (dirname(__FILE__).DS.'/vars.php');
?>

<?php echo '<?xml version="1.0" encoding="utf-8"?'.'>'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>" >
<head>
<?php
	$user =& JFactory::getUser();
	if ($user->get('guest') == 1) {
		$headerstuff = $this->getHeadData();
	$headerstuff['scripts'] = array();
	$this->setHeadData($headerstuff); }
?>
<jdoc:include type="head" />
	<link rel="icon" href="http://www.ronildo.com.br/blog/favicon.png" />
	<link rel="shortcut icon" href="http://www.ronildo.com.br/blog/favicon.png" />

	<link href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/template.css" rel="stylesheet" type="text/css" />
	
	<!--[if IE]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
	<!--[if lte IE 6]>
		<link href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/ieonly.css" rel="stylesheet" type="text/css" />
		<script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/javascript/DD_belatedPNG_0.0.7a-min.js"></script>
		<script>
		  DD_belatedPNG.fix('li, img, div, p, h1');
		</script>
	<![endif]-->
	
	<!--[if IE 7]>
		<link href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/ie7only.css" rel="stylesheet" type="text/css" />
	<![endif]-->
	
	
	<script type="text/javascript">
	
	 var _gaq = _gaq || [];
	 _gaq.push(['_setAccount', 'UA-354445-4']);
	 _gaq.push(['_trackPageview']);
	_gaq.push(['_trackPageLoadTime']);
	
	 (function() {
	   var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	   ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	   var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	 })();
	
	</script>
	
</head>
<body>

	<!-- Uma Div geral que uso em todos os projetos -->
	<div class="all clearfix">
		
		<!-- Div que centraliza todo o conteúdo -->
		<div class="centraliza">
			
			<!-- Começo do topo -->
			<section id="topo">
				<header>
					<h1><a href="index.php" title="<?php echo $mainframe->getCfg('sitename');?>"><?php echo $mainframe->getCfg('sitename');?></a></h1>
					<jdoc:include type="modules" name="busca" style="xhtml" />
					<nav role="main-navigation"><jdoc:include type="modules" name="menu" style="xhtml" /></nav>
				</header>
			</section>
			<!-- Fim do Topo -->
			
			<!-- Começo do Banner -->
			<section id="ads">
				<div class="banner-menor"><jdoc:include type="modules" name="banner-menor" style="raw" /></div>
				<jdoc:include type="modules" name="banner" style="raw" />
			</section>
			<!-- Fim do Banner -->
			
			<jdoc:include type="message" />
			
			<!-- Div somente para fazer Faux Columns -->
			<div class="fundo-branco clearfix">
				
				<!-- Começo da coluna principal -->
				<section id="conteudo" role="main">
					<jdoc:include type="component" />
				</section>
				<!-- Fim da coluna principal -->
				
				<!-- Começo da coluna lateral -->
				<section id="lateral" role="complementary">
					<jdoc:include type="modules" name="right" style="xhtml" />
				</section>
				<!-- Fim da coluna lateral -->
			
			</div>
			<!-- Fim da Div para fazer Faux Columns -->
 
		</div>
		<!-- Fim da Div que centraliza tudo -->
		
	</div>
	<!-- Fim da DIV geral -->
	
	<!-- Rodapé -->
	<footer id="rodape">
		<address><jdoc:include type="modules" name="footer" style="raw" /></address>
	</footer>
	<!-- FIM Rodapé -->

<script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/javascript/moo.rd_1.3.2_mootools_1.2.js"></script>

<script type="text/javascript">
window.addEvent('domready',function(){
 $$( '.moreInfoWrapper' ).each(function(item){
  var thisSlider = new Fx.Slide( item.getElement( '.moreInfo' ), { duration: 500, mode: 'horizontal' } );
  thisSlider.hide();
  item.getElement( '.divToggle' ).addEvent( 'click', function(){ thisSlider.toggle(); } );
 } );
} );

if( $('system-message') ){
	setTimeout(function(){
		var myFx = new Fx.Tween($('system-message'));
		myFx.start('opacity',1,0);
		myFx.start('height',45,0);
		$('system-message').style.display = 'none';
	}, 5000);
}

</script>
</body>
</html>
