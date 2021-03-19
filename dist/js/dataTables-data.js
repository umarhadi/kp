/*DataTable Init*/

"use strict"; 

$(document).ready(function() {
	$('#tableDash1').DataTable({
		responsive: true,
		autoWidth: true,
		language: { 
			search: "",
			searchPlaceholder: "Cari..",
			lengthMenu: "Tampilkan _MENU_ baris data",
			info: "Menampilkan _END_ dari total _TOTAL_ data",
			infoEmpty: "Data tidak ada",
			paginate: {
				first:   "Awal",
				last:    "Akhir",
				next:    "Selanjutnya",
				previous:"Sebelumnya",
			}
		}
	});
	$('#tableDash2').DataTable({
		responsive: false,
		autoWidth: true,
		lengthChange: false,
		language: { search: "",
		searchPlaceholder: "Cari..",
		
		}
	});
	$('#tableDash3').DataTable({
		responsive: false,
		autoWidth: true,
		lengthChange: false,
		language: { search: "",
		searchPlaceholder: "Cari..",
		
		}
	});
    $('#datable_2').DataTable({ 
		autoWidth: false,
		lengthChange: false,
		"bPaginate": false,
		language: { search: "",searchPlaceholder: "Search" }
	});
	
	/*Export DataTable*/
	$('#datable_3').DataTable( {
		dom: 'Bfrtip',
		responsive: true,
		language: { search: "",searchPlaceholder: "Search" },
		"bPaginate": false,
		"info":     false,
		"bFilter":     false,
		buttons: [
			'copy', 'csv', 'excel', 'pdf', 'print'
		],
		"drawCallback": function () {
			$('.dt-buttons > .btn').addClass('btn-outline-light btn-sm');
		}
	} );
	
	var table = $('#datable_5').DataTable({
		responsive: true,
		language: { 
		search: "" ,
		sLengthMenu: "_MENU_Items",
		},
		"bPaginate": false,
		"info":     false,
		"bFilter":     false,
		});
	$('#datable_5 tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
            table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
    } );
 
    $('#button').click( function () {
        table.row('.selected').remove().draw( false );
    } );
} );