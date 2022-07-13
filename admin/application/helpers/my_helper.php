<?php
/* Button_Modal*/
function button_modal($link, $color, $class, $icon, $text)
{
	echo '<a href="'. $link .'" class="btn btn-sm btn-flat btn-'. $color .'" data-toggle="modal"><i class="fa fa-'. $icon .'"></i> '. $text .'</a>';
}

/* Tabel*/
function table($header, $id)
{
	echo'<table class="table table-striped table-bordered table-hover" id="mydata">
	<thead>
		<tr>
		<th class="text-center">No</th>';
		foreach ($header as $h) {
			echo '<th class="text-center">'. $h .'</th>';
		}
		echo '</tr>
	</thead>
			<tbody id="'. $id .'"></tbody>
	</table>';
}

