$(function(){
	$('#tabla-insumos').bootstrapTable({
		url: baseurl+'/buscar/filtrarinsumos',
		height: 300,
		search: true,
		sidePagination: 'server',
		pagination: true
	});

	$('#tabla-tipos-insumos').bootstrapTable({
		url: baseurl+'/buscar/filtrartipoinsumo',
		height: 300,
		search: true,
		sidePagination: 'server',
		pagination: true
	});
	
	$('#tabla-tipos-razas').bootstrapTable({
		url: baseurl+'/buscar/filtrartiporaza',
		height: 300,
		search: true,
		sidePagination: 'server',
		pagination: true
	});

	$('#tabla-unidades').bootstrapTable({
		url: baseurl+'/buscar/filtrarunidades',
		height: 300,
		search: true,
		sidePagination: 'server',
		pagination: true
	});

	$('#tabla-razas').bootstrapTable({
		url: baseurl+'/buscar/filtrarrazas',
		height: 300,
		search: true,
		sidePagination: 'server',
		pagination: true
	});

	$('#tabla-proveedor').bootstrapTable({
		url: baseurl+'/buscar/filtrarproveedor',
		height: 300,
		search: true,
		sidePagination: 'server',
		pagination: true
	});
});