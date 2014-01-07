<head>
	<meta content="text/html;charset=utf-8" http-equiv="Content-Type">
	<meta content="utf-8" http-equiv="encoding">
	<title><?php echo "UPLB Vehicle Traffic Management System - ".$pageTitle; ?></title>
	
	<!-- css -->
	<link rel="stylesheet" type="text/css" href="<?php echo $root; ?>assets/styles/view.css" />
	
	<!-- other styles -->
	<style>
		<?php echo ".".$currentMenu."M"; ?>{
			color: #CCAC00 !important;
			font-weight: bold;
		}
	</style>
	
	<!-- jQuery -->
	<script type='text/javascript' src='<?php echo $root; ?>assets/js/jquery-1.8.3.js'></script>
	<script type='text/javascript' src='<?php echo $root; ?>assets/js/jquery-ui-1.9.2.custom/js/jquery-ui-1.9.2.custom.min.js'></script>
	<link rel="stylesheet" type="text/css" href="<?php echo $root; ?>assets/js/jquery-ui-1.9.2.custom/css/custom-theme/jquery-ui-1.9.2.custom.min.css" />
	
	<script type='text/javascript'>
		jQuery.noConflict();
		jQuery(document).ready(function(){
			//jQuery(".datepicker").datepicker();
			//jQuery(".datepicker").datepicker( {dateFormat: "yy-mm-dd"} );
			//$("#birthday").datepicker( {dateFormat: "yy-mm-dd"} );
		});
		
		function addFilter(){
				var filter = ""
				+	"<div>"
				+		"<select class='combine' name='combine'>"
				+			"<option>AND</option>"
				+			"<option>OR</option>"
				+		"</select>"
				+		"<input class='keyword' name='keyword' type='text' value='' />"
				+		"<?php if(isset($searchOptions)) echo $searchOptions; ?>"
				+		"<input type='button' value='X' onclick='javascript:removeFilter(this);'>"
				+	"</div>"
				+ "";
			jQuery("#searchFilter").append(filter);
		}
		
		function removeFilter(el){
			jQuery(el).parent().remove();
		}
		
		function getFilters(){
			var combine = "";
			var keyword = "";
			var filters = "";
			jQuery("#searchFilter div").each(function(){
				if(jQuery(this).find("select.combine").val() != undefined)
					combine += ";" + jQuery(this).find("select.combine").val();
				
				if(keyword != "") keyword += ";";
				keyword += jQuery(this).find("input.keyword").val();
				
				if(filters != "") filters += ";";
				filters += "" + jQuery(this).find("select.filter").val()
			});
			document.getElementById("searchCombine").value = combine;
			document.getElementById("searchKeyword").value = keyword;
			document.getElementById("searchFilters").value = filters;
			document.getElementById('viewForm').submit();
		}
		
		function sortColumns(col){
			document.getElementById("sortColumn").value = col;
			document.getElementById('viewForm').submit();
		}
	</script>
</head>