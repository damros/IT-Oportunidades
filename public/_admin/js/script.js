(function ($) {
	"use strict";

	$(document).ready(function () {
		$("table.dttable").DataTable({
			"dom": 'Bfrtip',
			"buttons": [
				{
					extend: 'print',
					exportOptions: {
						columns: '.printable,.exportable'
					}

				},
				{
					extend: 'pdf',
					exportOptions: {
						columns: '.printable,.exportable'
					}
				},
				{
					extend: 'excel',
					exportOptions: {
						columns: '.exportable'
					}
				}
			],
			"language": {
				"url": "/_admin/plugins/datatables/datatables_es_es.lang"
			},
			"bSort": true
		});
	});
	
		
})(this.jQuery);


function confirmDelete( $form ) {

	if ( ! confirm("Esta seguro que desea eliminar el registro?")) {
		return;
	};

	//$form.block({message: null});

	return true;
}