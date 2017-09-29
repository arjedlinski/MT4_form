<option value="">Select</option>
<option <?php if($this->data['leverage'] == '50') echo 'selected="selected"'; ?> value="50">1:50</option>
<option <?php if($this->data['leverage'] == '100') echo 'selected="selected"'; ?> value="100">1:100</option>
<option <?php if($this->data['leverage'] == '150') echo 'selected="selected"'; ?> value="150">1:150</option>
<option <?php if($this->data['leverage'] == '200') echo 'selected="selected"'; ?> value="200">1:200</option>