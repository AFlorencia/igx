<?php
/**
* @package   T3 Blank
* @copyright Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
* @license   GNU General Public License version 2 or later; see LICENSE.txt
*/

defined('_JEXEC') or die;

if (is_array($this->getParam('skip_component_content')) && 
        in_array(JFactory::getApplication()->input->getInt('Itemid'), $this->getParam('skip_component_content'))) 
return;
?>

<?php
/**
* Mainbody 3 columns, content center.
*/

$leftCol = $this->params->get('leftcol');	
$showleftcol = $leftCol->showleftcol;
$xsleftcol =  $leftCol->xs;
$mdleftcol =  $leftCol->md;
$lgleftcol =  $leftCol->lg;
$leftmodules = $leftCol->leftmodules;	
$leftspotshow = $leftCol->spot;

$rightCol = $this->params->get('rightcol');	
$showrightcol = $rightCol->showrightcol;
$xsrightcol =  $rightCol->xs;
$mdrightcol =  $rightCol->md;
$lgrightcol =  $rightCol->lg;
$rightmodules = $rightCol->rightmodules;		
$rightspotshow = $rightCol->spot;
//var_dump($leftCol);

$xscmp =  intval(12 - ($xsleftcol + $xsrightcol));
$mcmp =   12 - ($mdleftcol + $mdrightcol);
$lgcmp =  12 - ($lgleftcol + $lgrightcol);

$cmp = $this->params->get('topcmp');	
$topcmp = $cmp->topmodules;
//$compspotshow = $cmp->spot;
?>
<div id="t3-mainbody" class="container t3-mainbody">
<div class="row">
<?php if($showleftcol==='1') { ?> 
 
    <!-- SIDEBAR left -->    
    <div class="t3-sidebar t3-sidebar-1 col-xs-<?php echo $xsleftcol; ?> col-md-<?php echo $mdleftcol; ?> col-lg-<?php echo $lgleftcol; ?>">
        <?php      
    if($leftmodules){
    $leftMods = explode(',', $leftmodules);
    foreach($leftMods as $ml){    ?>

        <?php  echo '	<jdoc:include type="modules" name="'.$ml.'" style="T3Xhtml" />';   ?>
        <?php } 
    }?>
	
	<?php 	if(isset($leftCol->spot)){ ?>
		
				<?php for($h=0; $h<$leftCol->spot; $h++){				
					

	 echo'<div class="leftspot-'.$h.'">';
		 $this->spotlight('leftspot-'.$h, 'leftspot-'.$h);
	 echo'</div>';
		
		 }  ?>
		
	<?php } ?>
  
    </div>
    
  <!--end sidebar left-->
    <?php  } ?>

<!-- MAIN CONTENT -->

<div id="t3-content" class="t3-content col-xs-<?php echo $xscmp; ?> col-md-<?php echo $mcmp; ?> col-lg-<?php echo $lgcmp; ?>">
    

     <?php      
    if($topcmp){
    $toptMods = explode(',', $topcmp);
    foreach($toptMods as $tm){    ?>

        <?php  echo '	<jdoc:include type="modules" name="'.$tm.'" style="T3Xhtml" />';   ?>
    <?php }  } ?>
<?php if($this->hasMessage()) : ?>
<jdoc:include type="message" />
<?php endif ?>
<jdoc:include type="component" />
     <?php      
    if($cmp->bottommodules){
    $btMods = explode(',', $cmp->bottommodules);
    foreach($btMods as $bm){    ?>

        <?php  echo '	<jdoc:include type="modules" name="'.$bm.'" style="T3Xhtml" />';   ?>
    <?php }  } ?>
	
</div>
<!-- //MAIN CONTENT -->


<?php if($showrightcol==='1') { ?> 

    <!-- SIDEBAR right -->    
    <div class="t3-sidebar t3-sidebar-1 col-xs-<?php echo $xsrightcol; ?> col-md-<?php echo $mdrightcol; ?> col-lg-<?php echo $lgrightcol; ?>">
        <?php      
    if($rightmodules){
    $rightMods = explode(',', $rightmodules);
    foreach($rightMods as $mr){    ?>

        <?php  echo '	<jdoc:include type="modules" name="'.$mr.'" style="T3Xhtml" />';   ?>
    <?php }  } ?>
    
	
	<?php 	if(isset($rightCol->spot)){ ?>
		
				<?php for($k=0; $k<$rightCol->spot; $k++){				
					

	 echo'<div class="rightspot-'.$k.'">';
		 $this->spotlight('rightspot-'.$k, 'rightspot-'.$k);
	 echo'</div>';
		
		 }  ?>
		
	<?php } ?>
    </div>
  <!--end sidebar right-->
    <?php  } ?>

</div>
</div> 
