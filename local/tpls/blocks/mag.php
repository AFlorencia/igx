<?php  
	$item = $this->params->get('contacto');	
	
$maxcolsrow = $this->params->('maxcolumnsqty');
	
?>
<div class="mag-container container">
	<div class="row">
	<?php 
	$i = 0;
	if($item){
	foreach ( $item as $col ) {
	
			if(isset($col->wraprow)&&($col->wraprow==='1')){echo '<div class="col-xs-'.$maxcolsrow.'"><div class="row">';}
		?>
		<div class="<?php echo $col->column;?> col-xs-<?php echo $col->xs;?> col-md-<?php echo $col->md;?> col-lg-<?php echo $col->lg;?> ">
			<!--<?php echo $col->column;?>-->
		<?php for($j=0; $j<$col->spot; $j++){
						
					
	if ($this->checkSpotlight($col->column.'-'.$j, $col->column.'-'.$j)) : 
	 echo'<div class="'.$col->column.'-'.$j.'">';
		 $this->spotlight($col->column.'-'.$j, $col->column.'-'.$j);
	 echo'</div>';
		 endif;
		 } 
		 ?>
		 	<!--END <?php echo $col->column;?>-->
		</div>
		
		
	<?php
if(isset($col->wraprow)&&($col->wraprow==='1')){echo '</div></div>';}
		$i++;
		}
		
	}?>
</div></div>