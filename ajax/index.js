$(document).ready(function()
{ 
	$(function() {
		        			$('.mdb-select').multiselect('destroy');
        					$('.mdb-select').multiselect({
						        includeSelectAllOption: true,
						        selectAllValue: 'select-all-value'
						      });
						});
	var url_xulydataindex= '/ajax/xulydataindex.php';
	$('#fdatabasename').change(function() {
		$('#status').html('<div class="spinner-border text-danger" role="status"><span class="sr-only">Loading...</span></div>');
		var databasename = $.trim($('#fdatabasename').val());
		var datasend='fdatabasename='+databasename;
		$('#status').html('Đã chọn CSDL: '+databasename);
		$('#query_databasename').val(databasename);
		$.ajax({
		        type: 'POST',
		        url: url_xulydataindex,
		        data:datasend,
		        success : function(data){
		        	data = $.trim(String(data));
		        	if (data!=0) {
		        		$('#ftablename').html(data);
		        		$('#query_tablename').html(data);
		        		document.getElementById("btnquery").disabled = false;
		        	}else{
		        		alert('Lỗi chọn Database');
		        	}
		        }
		      });
		      return false;
	});
	$('#fdatabasename').change(function() {
		document.getElementById("query_selectsao").disabled = false;
		document.getElementById("query_select").disabled = false;
		document.getElementById("query_insert").disabled = false;
		document.getElementById("query_update").disabled = false;
		document.getElementById("query_delete").disabled = false;
		document.getElementById("query_clear").disabled = false;
	});
	$('#query_selectsao').click(function() {
		 var databasename = $.trim($('#fdatabasename').val());
		 var tablename = $.trim($('#query_tablename').val());
		 var datasend='q_db='+databasename+'&q_tb='+tablename+'&q_fun=selectsao';
		$.ajax({
		        type: 'POST',
		        url: url_xulydataindex,
		        data:datasend,
		        success : function(data){
		        	data = $.trim(String(data));
		        	if (data!=0) {
		        		$('#query_body').val(data);
		        	}else{
		        		alert('Lỗi chọn Database');
		        	}
		        }
		});
		return false;
	});
	$('#query_select').click(function() {
		 var databasename = $.trim($('#fdatabasename').val());
		 var tablename = $.trim($('#query_tablename').val());
		 var datasend='q_db='+databasename+'&q_tb='+tablename+'&q_fun=select';
		$.ajax({
		        type: 'POST',
		        url: url_xulydataindex,
		        data:datasend,
		        success : function(data){
		        	data = $.trim(String(data));
		        	if (data!=0) {
		        		$('#query_body').val(data);
		        	}else{
		        		alert('Lỗi chọn Database');
		        	}
		        }
		});
		return false;
	});
	$('#query_insert').click(function() {
		 var databasename = $.trim($('#fdatabasename').val());
		 var tablename = $.trim($('#query_tablename').val());
		 var datasend='q_db='+databasename+'&q_tb='+tablename+'&q_fun=insert';
		$.ajax({
		        type: 'POST',
		        url: url_xulydataindex,
		        data:datasend,
		        success : function(data){
		        	data = $.trim(String(data));
		        	if (data!=0) {
		        		$('#query_body').val(data);
		        	}else{
		        		alert('Lỗi chọn Database');
		        	}
		        }
		});
		return false;
	});
	$('#query_update').click(function() {
		 var databasename = $.trim($('#fdatabasename').val());
		 var tablename = $.trim($('#query_tablename').val());
		 var datasend='q_db='+databasename+'&q_tb='+tablename+'&q_fun=update';
		$.ajax({
		        type: 'POST',
		        url: url_xulydataindex,
		        data:datasend,
		        success : function(data){
		        	data = $.trim(String(data));
		        	if (data!=0) {
		        		$('#query_body').val(data);
		        	}else{
		        		alert('Lỗi chọn Database');
		        	}
		        }
		});
		return false;
	});
	$('#query_delete').click(function() {
		 var databasename = $.trim($('#fdatabasename').val());
		 var tablename = $.trim($('#query_tablename').val());
		 var datasend='q_db='+databasename+'&q_tb='+tablename+'&q_fun=delete';
		$.ajax({
		        type: 'POST',
		        url: url_xulydataindex,
		        data:datasend,
		        success : function(data){
		        	data = $.trim(String(data));
		        	if (data!=0) {
		        		$('#query_body').val(data);
		        	}else{
		        		alert('Lỗi chọn Database');
		        	}
		        }
		});
		return false;
	});
	$('#query_clear').click(function() {
		$('#query_body').val('');
	});
	$('#query_runquery').click(function() {
		
		var query = $.trim(form_body_query.query_body.value);
		if (query!='') {
			$('#query_status').html('<div class="spinner-border text-danger" role="status"><span class="sr-only">Loading...</span></div>');
			var datasend='q_run='+query;
			$.ajax({
			        type: 'POST',
			        url: url_xulydataindex,
			        data:datasend,
			        success : function(data){
			        	data = $.trim(String(data));
			        	if (data==0) {
			        		$('#query_result').html('Error: runMysql() in classcsdl');
			        	}else if (data==1) {
			        		$('#query_result').html('Run SQL complete');
			        	}else if(data ==2){
			        		$('#query_result').html('Error: NapSQL() in classcsdl');
			        	}else{
			        		$('#query_result').html('');
							var arrdata=data.split('^');
							var arrtieude = arrdata[0].split('@');
				         	var arr_noidungs = arrdata[1].split("@");
				         	const setup_columns = [];var d='';
				         	var column_id_name = arrtieude[0];var arr_tieude=[];
				         	for (var i = 0; i < arrtieude.length-1; i++) {
				         		//var a_z = atoz[i];
				         		var tieude = arrtieude[i];
				         		arr_tieude.push(tieude);
				         		if (i==0) {
				         			var c = {width: 100,editable:false, id: i, header: [{text: tieude},{ content: "inputFilter" }]};
				         		}else{
				         			var c = {width: 150, id: i, header: [{text: tieude},{ content: "inputFilter" },{ content: "selectFilter" }]};
				         		}
				         		
				         		setup_columns.push(c);
				         	}
				         	var data_noidung=[];var totalrecord = 0;
				         	for (var i = 0; i < arr_noidungs.length-1; i++) {
				         		var noidungs = arr_noidungs[i];
				         		var arr_phantu = noidungs.split("|");
				         		var arr_tam=[];
				         		arr_tam['id']=arr_phantu[0];
				         		for (var j = 0; j < arr_phantu.length-1; j++) {
				         			var phantu = arr_phantu[j];//alert(phantu);//$('#teststatus').html(phantu);
				         			//var az =atoz[j];
				         			arr_tam[j]=phantu;
				         		}
				         		data_noidung.push(arr_tam);
				         		totalrecord++;
				         	}

							var grid_query = new dhx.Grid("query_result", {
							    columns: setup_columns,
							    data: data_noidung,
							    multiselection:true,
							    selection: "complex",
							    keyNavigation: true,
							    resizable: true,
							});
							$('#query_status').html('Done');
			        	}
			        }
			});
			return false;
		}else{
			$('#query_status').html('Query trống');
		}
	});
	$('#ftablename').change(function() {
		$('#status').html('<div class="spinner-border text-danger" role="status"><span class="sr-only">Loading...</span></div>');
		var tablename = $.trim($('#ftablename').val());
		var databasename = $.trim($('#fdatabasename').val());
		var datasend='fdatabasename='+databasename+'&ftablename='+tablename;
		$('#status').html('Đã chọn CSDL: '+databasename+', Bảng: '+tablename);
		$.ajax({
		        type: 'POST',
		        url: url_xulydataindex,
		        data:datasend,
		        success : function(datas){
		        	datas = $.trim(String(datas));
		        	if (datas!=0) {
		        		$('#fcolumnname').html(datas);
		        		$(function() {
		        			$('.mdb-select').multiselect('destroy');
        					$('.mdb-select').multiselect({
						        includeSelectAllOption: true,
						        selectAllValue: 'select-all-value'
						      });
						});
						document.getElementById("btnapdung").disabled = false;
		        	}else{
		        		alert('Lỗi chọn Table');
		        	}
		        }
		      });
		      return false;
	});
	$('#btnapdung').click(function() {
	    var selects  = $('.mdb-select').val();
	    var tablename = $.trim($('#ftablename').val());
	    var databasename = $.trim($('#fdatabasename').val());
	    $('#status').html('<div class="spinner-border text-danger" role="status"><span class="sr-only">Loading...</span></div>');
	    if (tablename!="") {
	    	if (selects==null) {
	    		select = '*';
	    	}else{
	    		select=selects;
	    }
	    var datasend = 'select='+select+'&from='+tablename+'&db='+databasename;
	    $.ajax({
		    type: 'POST',
		    url: url_xulydataindex,
		    data:datasend,
		    success : function(data){
		       	data = $.trim(String(data));//alert(data);
		        if (data!=0) {
		        	$('#spreadsheet_container').html('');
					var arrdata=data.split('^');
					var arrtieude = arrdata[0].split('@');
		         	var arr_noidungs = arrdata[1].split("@");
		         	const setup_columns = [];var d='';
		         	var column_id_name = arrtieude[0];var arr_tieude=[];
		         	for (var i = 0; i < arrtieude.length-1; i++) {
		         		//var a_z = atoz[i];
		         		var tieude = arrtieude[i];
		         		arr_tieude.push(tieude);
		         		if (i==0) {
		         			var c = {width: 100,editable:false, id: i, header: [{text: tieude},{ content: "inputFilter" }]};
		         		}else{
		         			var c = {width: 150, id: i, header: [{text: tieude},{ content: "inputFilter" },{ content: "selectFilter" }]};
		         		}
		         		
		         		setup_columns.push(c);
		         	}
		         	var data_noidung=[];var totalrecord = 0;
		         	for (var i = 0; i < arr_noidungs.length-1; i++) {
		         		var noidungs = arr_noidungs[i];
		         		var arr_phantu = noidungs.split("|");
		         		var arr_tam=[];
		         		arr_tam['id']=arr_phantu[0];
		         		for (var j = 0; j < arr_phantu.length-1; j++) {
		         			var phantu = arr_phantu[j];//alert(phantu);//$('#teststatus').html(phantu);
		         			//var az =atoz[j];
		         			arr_tam[j]=phantu;
		         		}
		         		data_noidung.push(arr_tam);
		         		totalrecord++;
		         	}
					var grid = new dhx.Grid("spreadsheet_container", {
					    columns: setup_columns,
					    data: data_noidung,
					    selection: "cell",
					    editable: true, 
					    keyNavigation: true,
					    resizable: true
					});
					
					$('#totalrecord').html('Total record: '+totalrecord);
					$('#status').html('Tải xong');
					$('#btnapdung').val('Tải lại data');
					grid.events.on("AfterEditEnd", function(value,row,column){
						$('#status').html('<div class="spinner-border text-danger" role="status"><span class="sr-only">Loading...</span></div>');
					    var vl = value;
					    var id = row['id'];
					    var cot = column['header'][0]['text'];
					    var datasend = 'c_db='+databasename+'&c_tb='+tablename+'&c_col='+cot+'&c_id='+id+'&c_vl='+vl+'&c_idn='+column_id_name;
					    $.ajax({
					        type: 'POST',
					        url: url_xulydataindex,
					        data:datasend,
					        success : function(data){
					        	data = $.trim(String(data));
					        	$('#status').html(data);					        	
					        }
					    });
					    return false;
					});
		        }else{
		        	alert('Lỗi chọn Database');
		        	}
		        }
		    });
		   return false;
	    }else{
	    	alert('Vui lòng chọn table');
	    }
	});
	
});