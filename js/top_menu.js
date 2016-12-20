// Set top menu selected

function set_selected_top_menu() {
	var search_query_param = get_query_param("search", window.location.href);

	if (search_query_param == "animals") {
		$("a.animals").css("color", "#be5730");
	} else if (search_query_param == "flower") {
		$("a.flower").css("color", "#be5730");
	} else if (search_query_param == "people") {
		$("a.people").css("color", "#be5730");
	}
}

set_selected_top_menu();