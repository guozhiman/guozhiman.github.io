var cat_id;
function category(catid, id) {
	cat_id = id; category_catid[id] = catid;
	$.get(AJPath+'?action=category&category_title='+category_title[id]+'&category_moduleid='+category_moduleid[id]+'&category_extend='+category_extend[id]+'&category_deep='+category_deep[id]+'&cat_id='+cat_id+'&catid='+catid, function(data){																																																								  		$('#catid_'+cat_id).val(category_catid[cat_id]);
		if(data) $('#category_'+cat_id).html(data);
																																																										  });
}