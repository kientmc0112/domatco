function selectTag(id) {
	var idx = "#" + id;
	if($(idx).css("background-color") == "rgb(221, 221, 221)") {
		$(idx).css("background-color", "rgb(145, 145, 145)");
		tag[id] = $(idx).attr("id");
	}
	else {
		$(idx).css("background-color", "rgb(221, 221, 221)");
		tag[id] = 0;
	}
}

function remove(x) {
	var idd = "#" + x;
	$.post("View/article/delete_tag.php", {id: x}, function(result) {
		if(result == 1) $(idd).parent().empty();
		else alert("error2");
	});
}