<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	Class Form_function
	{
		// utk buka modal & form
		function open_form($modal_id, $action, $modal_label)
		{
			echo '<div class="modal fade" id="'.$modal_id.'">		
				<div class="modal-dialog">
				<form class="form-horizontal" enctype="multipart/form-data" onsubmit="'. $action .'">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span></button>
						</div>
					</div>
					<h4 class="modal-title"><b>'. $modal_label .'</b></h4>
					<div class="modal-body">';
		}

		// input
		function create_textbox($label, $name, $type="text", $class='', $atrr='')
		{
			echo '<div class="form-group row">
					<label for="'. $name .'" class="col-sm-4 control-label">'. $label .'</label>
					
					<div class="col-sm-8">
						<input type= "'. $type .'" class="form-control '. $class .'" id="'. $name .'" placeholder= "'. $label .'" '. $attr .'>
					</div>
				</div>';

		}

		// textarea
		function create_textarea($label, $name, $class='', $attr='')
		{
			echo '<div class="form-group row">
					<label for="'. $name .'" class="col-sm-4 control-label">'. $label .'</label>

					<div class="col-sm-8">
						<textarea class="form-control '. $class .'" rows="5" id="'. $name .'" placeholder="'. $label .'" '. $attr .'></textarea>
					</div>
				</div>';
		}

		// combobox / selectbox
		function create_combobox($label, $name, $class, $attr, $list)
		{
			echo '<div class="form-group row">
					<label for="'. $label .'" class="col-sm-4 control-label">'. $name.'</label>

					<div class="col-sm-8">
						<select name="a_status" id="'. $label .'" class="form-control '. $class .'" '. $attr .'>
							<option value="">-- PILIH --</option>';
							
							foreach ($list as $ls) 
							{
								echo '<option value="'. $ls[0] .'">'.$ls[1].'</option>';
							}

					echo '</select>
					</div>
				</div>';
		}

		// utk tutup form dan modal
		function close_form($name, $label)
		{
			echo '</div> 
						<div class="modal-footer">
							<button type="button" class="btn btn-default btn-flat" data-dismiss="modal"> Close</button>

							<button type="submit" class="btn btn-success btn-flat" name="'. $name .'"> '. $label .'</button>
						</div> 

					</div>
				</div> 
			</div>';
		}

	} /* /.class */
