<form id="did_submit"  >
					<input type="hidden" name="action" value="store_did">
						<div class="form-group">
							<label for="wpdid_date">Date</label>
							<input type="date" value="20/10/3023" name="wpdid_date" id="wpdid_date">
						</div>
						<div class="form-group">
							<label for="wpdid_did_owner">Owner</label>
							<select class="form-control" name="wp_did_owner[]" id="wp_did_owner" multiple="multiple">
								 <?php 
								  foreach ( $results as $key => $result ) {

								 		 printf( '<option value="%1$s">%1$s( %2$s )</option>', $result->nid, $result->name );
									}
								   ?>
							</select>
						</div>
						<div class="form-group">
							<label for="wpdid_did_buyer">Bayer</label>
							<select class="form-control" name="wp_did_buyer[]" id="wpdid_did_buyer" multiple="multiple">

							   <option>One</option>
							  <option>Two</option>
							  <option>Three</option>
							</select>
						</div>
						<div class="form-group">
							<label for="wpdid_did_no ml-3">Did No</label>
							<input type="number" min="0" name="wpdid_did_no" id="wpdid_did_no">

							<label for="wpdid_did_location">Location</label>
							<select name="wpdid_did_location" id="wpdid_did_location">
								<option>Rampur</option>
								<option>Bamni</option>
							</select>
						</div>
						<div class="form-group">
							<label for="wpdid_did_price">Did Price</label>
							<input type="number" min="0" name="wpdid_did_price" id="wpdid_did_price">

							<label for="wpdid_total">Total Land</label>
							<input type="number" min="0" name="wpdid_total" id="wpdid_total">
						</div>
					<button id="wpdid_submit"  type="submit" value="Submit" class="btn btn-primary">Submit</button>
				</form>