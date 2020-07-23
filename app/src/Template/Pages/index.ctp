<div class="container-xl">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>Manage <b>Countries</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="#addCountryModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Country</span></a>					
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>Id</th>
						<th>Country Code</th>
                                                <th>Name</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
                                    <?php foreach( $countries as $country ){?>
					<tr>
						<td><?php echo $country["id"];?></td>
						<td><?php echo $country["TwoCharCountryCode"];?></td>
                                                <td><?php echo $country["CountryName"];?></td>
						<td>    
							<a onclick="openView('viewCountryModal', <?php echo "'".trim($country["TwoCharCountryCode"])."'"?>);" class="delete" data-toggle="modal"><i class="material-icons zoom_in">&#xe8ff;</i></a>
							<a href="#editCountryModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
							<a href="#deleteCountryModal" class="delete code-delete" data-toggle="modal" data-id="<?php echo $country["id"];?>"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
			<div class="clearfix">
				    <?php
                                    echo "<div class='center'><ul class='pagination' style='margin:20px auto;'>";
                                    echo $this->Paginator->prev('< ' . __('previous'), array('tag' => 'li', 'currentTag' => 'a', 'currentClass' => 'disabled'), null, array('class' => 'prev disabled'));
                                    echo $this->Paginator->numbers(array('separator' => '','tag' => 'li', 'currentTag' => 'a', 'currentClass' => 'active')); 
                                    echo $this->Paginator->next(__('next').' >', array('tag' => 'li', 'currentTag' => 'a', 'currentClass' => 'disabled'), null, array('class' => 'next disabled'));
                                    echo "</div></ul>";
                                ?>

			</div>
		</div>
	</div>        
</div>
<!-- View Modal HTML -->

<div id="viewCountryModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content" style="width:190%">
			<form method="post" id="view_form" action="add">
				<div class="modal-header">						
					<h4 class="modal-title">Country</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body" id="viewCountry">					
								
				</div>
				
			</form>
		</div>
	</div>
</div>
<!-- Add Modal HTML -->
<div id="addCountryModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="post" id="add_form" action="add">
				<div class="modal-header">						
					<h4 class="modal-title">Add Country</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<div class="form-group">
						<label>Name</label>
						<input maxlength="50" type="text" name="country_name" id="country_name" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Code</label>
						<input type="text" maxlength="2" name="country_code" id="country_code" class="form-control" required>
					</div>				
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-success" value="Add">
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Edit Modal HTML -->
<div id="editCountryModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form>
				<div class="modal-header">						
					<h4 class="modal-title">Edit Country</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<div class="form-group">
						<label>Name</label>
						<input type="text" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Code</label>
						<input type="text" class="form-control" required>
					</div>				
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-info" value="Save">
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Delete Modal HTML -->
<div id="deleteCountryModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="post" id="delete_form" action="deleteform">
				<div class="modal-header">						
					<h4 class="modal-title">Delete Country</h4>
					<button type="button" class="close close_delete" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<p>Are you sure you want to delete these Records?</p>
					<p class="text-warning"><small>This action cannot be undone.</small></p>
                                        <input type="hidden" id="countryId" name="countryId" value="104" />     
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-danger" value="Delete">
				</div>
			</form>
		</div>
	</div>
</div>