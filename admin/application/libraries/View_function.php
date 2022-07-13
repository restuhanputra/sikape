<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	Class View_function
	{
		//Fungsi untuk membuat judul konten
		function create_title($icon, $title){
			echo '<h3 class="title"><i class="glyphicon glyphicon-'.$icon.'"></i> '.$title.'</h3>';
		}
		
		//Fungsi untuk membuat tombol pada bagian atas tabel
		function create_button($color, $icon, $text, $class = "", $action=""){
			echo '<a class="btn btn-flat btn-sm btn-'.$color.' '.$class.' btn-top" onclick="'.$action.'"><i class="fa fa-'.$icon.'"></i> '.$text.'</a>';
		}

		// Tabel
		function create_table($header)
		{
			echo '<table class="table table-striped table-bordered table-hover" width="100%">
			<thead><tr>
			<th style="width: 10px">No</th>';
			foreach ($header as $h)
			{
				echo '<th>'. $h .'</th>';
			}
			echo '</tr></thead>
			<tbody></tbody>
			<tfooter><tr>
			<th style="width: 10px">No</th>';
			foreach ($header as $h)
			{
				echo '<th>'. $h .'</th>';
			}
			echo '</tr></tfooter>
			</table>';
		}
		
	} /* /.class */
