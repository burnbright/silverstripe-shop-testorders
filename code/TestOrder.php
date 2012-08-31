<?php
class TestOrder extends DataObjectDecorator{
	
	function extraStatics(){
		return array(
			'db' => array(
				'Test' => 'Boolean'
			)
		);
	}
	
	function setTest($test){
		if(Permission::check("ADMIN") || Director::isDev() || Director::isTest()){
			$this->owner->setField("Test", $test);
		}
	}
	
	function onPlaceOrder(){
		//set payment types & settings
	}
	
}

class TestOrdersAdmin extends Extension{
	
	static $allowed_actions = array(
		'starttestorder'
	);
	
	function starttestorder(){
		
		ShoppingCart::singleton()->add(null); //hack to start an order
		
		$order = ShoppingCart::singleton()->current();
		$order->Test = true;
		$order->write();
		
		Director::redirect(Director::baseURL());
	}
	
}