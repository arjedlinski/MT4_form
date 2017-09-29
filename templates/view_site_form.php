<?php 

if (!isset($this->submited)){

	echo '<form action="' . esc_url( $_SERVER['REQUEST_URI'] ) . '" method="post">';

	echo '<div class="mt4form">';

	echo '<h2>Start You FREE 30 Day Trial Today!</h2>';

	echo '<div class="left">';

	echo '<span class="small">Full Name</span>';

	if (isset( $error['name'])) {echo 'You have to ';}

	echo '<input class="small" placeholder="Name" type="text" name="mt4[name]" pattern="[a-zA-Z p{L}].{3,}" required="required" value="' . ( isset( $_POST["mt4"]["name"] ) ? esc_attr( $_POST["mt4"]["name"] ) : '' ) . '" size="40" />';

	echo '</div>';

	echo '<div class="left">';

	echo '<span class="small">Email</span>'; 

	if (isset( $error['email'])) {echo 'test';}

	echo '<input class="small" type="email" name="mt4[email]" placeholder="mail@example.com" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required="required" value="' . ( isset( $_POST["mt4"]["email"] ) ? esc_attr( $_POST["mt4"]["email"] ) : '' ) . '" size="40" />';

	echo '</div>';

	echo '<div class="left">';

	echo '<span class="small">Phone number</span>';

	echo '<input class="small" type="text" placeholder="Phone number" name="mt4[phone]" pattern="[0-9 ]+" value="' . ( isset( $_POST["mt4"]["phone"] ) ? esc_attr( $_POST["mt4"]["phone"] ) : '' ) . '" size="40" />';

	echo '</div>';

	echo '<div class="currencyform">';

	echo '<span class="small">Currency</span>';

	echo '<div style="margin-left: 60px;">'; 

	echo '<input id="currency1" type="radio" name="mt4[currency]" value="USD" checked="checked"><label for="currency1">USD</label>

	<input id="currency2" type="radio" name="mt4[currency]" value="EUR" ><label for="currency2">EUR</label>

	<input id="currency3" type="radio" name="mt4[currency]"value="GBP" ><label for="currency3">GBP</label>

	<input id="currency4" type="radio" name="mt4[currency]"value="JPY" ><label for="currency4">JPY</label>

	<input id="currency5" type="radio" name="mt4[currency]"value="CNH" ><label for="currency5">CNH</label>

	<input id="currency6" type="radio" name="mt4[currency]"value="HKD" ><label for="currency6">HKD</label>

	';

	echo '</div>'; 

	echo '</div>';



	echo '<div><input type="submit" name="mt4[submitted]" value="SIGN UP"></div>';

	echo '</div>';

	echo '</form>';

}else

{

	echo "testtttt";

}

?>