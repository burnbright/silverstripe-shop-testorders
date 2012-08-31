# Test Orders (for live sites)

Allow developers and shop owners to place a test orders on live site,
for the purposes of seeing if everything is working.

To place a test order:

 * Visit the orders Admin, and click the 'start test order' link.
 * Proceed with order as normal
 
 Orders placed in test mode will be flagged as test ($order->Test).
 Payments will always use test mode, so actual money does not exchange hands.
 
 To reconfigure payement settings on test orders, you currently need to use a hacky approach
 of decorating order like so:
 
	 <?php
	
	class OrderDecorator extends DataObjectDecorator{

		function onPlaceOrder(){
			
			if($this->owner->Test){
			
				//change available payment types, and settings etc here
				
			}
			
		}
		
	}