<div class="form-group">
<label>Name</label>
<input type="text" maxlength="50" name="country_name" id="country_name" value="<?php echo $country['CountryName'];?>" class="form-control" required>
</div>
<div class="form-group">
<label>Code</label>
<input type="text" maxlength="2" name="country_code" id="country_code" value="<?php echo $country['TwoCharCountryCode'];?>" class="form-control" required>
</div>	
<input type="hidden" name="country_id" id="country_id" value="<?php echo $country['id'];?>">
				