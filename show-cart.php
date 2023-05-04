<?php
	require_once("cls/cart.php");
	require 'layouts/header.php';
?>

<section class="section clearfix pv-45">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="">
                    <div class="row">
                        <div class="col-lg-12">
                        	<?php
                        		$cart = new cart();
                        		$products = $cart->getCart();
                        	?>
                        	<table cellpadding="5" cellspacing="0" border="0">
                        		<tr>
                        			<td align="left" width="200"><b>Product</b></td>
                        			<td align="left" width="200"><b>Count</b></td>
                        			<td align="left" width="200"><b>Total</b></td>
                        			<td align="left" width="200"><b>Action</b></td>
                        		</tr>
                        		<?php
                        			foreach($products as $product){
                        		?>
                        			<tr>
                        				<td align="left">
                                            <a href="product-details.php?id=<?php echo $product->id; ?>">                            
                                                <?php print $product->name; ?>
                                            </a>
                                        </td>
                        				<td align="left"><?php print $product->count; ?></td>
                        				<td align="left">Tk <?php print $product->total; ?></td>
                        				<td align="left">
                        					<span style="cursor:pointer;color: #09afdf;" class="removeFromCart" 
                        					data-id="<?php print $product->id; ?>">remove one element</span>
                        				</td>
                        			</tr>
                        		<?php 
                        			}
                        		?>
                        	</table>
                        	<br /><a href="shop.php" title="go back to products">Go back to products</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        	<a href="javascript:void(0);" class="emptyCart" title="empty cart">Empty cart</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php require 'layouts/footer.php'; ?>