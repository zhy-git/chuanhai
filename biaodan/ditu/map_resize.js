$(function() {
	// 设置窗口尺寸
	set_size();

	// 窗口尺寸变化时
	$(window).resize(function() {
		set_size();
	});

	// 显示搜索条件
	$("#show_more_btn").hover(function() {
		$(this).addClass('select_btn_on');
		$("#more_select").css("visibility", "visible");
	}, function() {
		$(this).removeClass('select_btn_on');
		$("#more_select").css("visibility", "hidden");
	});

	// 选择
	$("#select_item dl dd").click(function() {
		$(this).parent("dl").children("dd").removeClass('cur');
		$(this).addClass("cur");
	});

	// 清空当前条件
	$("#clear_cur_selected").click(function() {
		clear_selected_side();
		clear_select();

		$(".periods").children("span").each(function() {
			$(this).html($(this).attr('rel'));
		});

		clearParamsMap();
		showArea();
	});

	$("#close_side_btn").click(function() {
		close_side_bar();
	});

	// 快捷搜索
	$("#quick_search_btn").click(function(event) {
		$("#tool_more").hide();
		show_quick_menu("quick_search_btn", "quick_search_more");
	});

	// 工具
	$("#tool_btn").click(function(event) {
		$("#quick_search_more").hide();
		show_quick_menu("tool_btn", "tool_more");
	});

});

function show_quick_menu(click_obj, show_obj) {
	$("#" + click_obj).parent().addClass('active');
	$("#" + show_obj).show();

	// 点击其他区域隐藏
	$(document).one("click", function() { // 对document绑定一个影藏Div方法
		$("#" + show_obj).hide();
	});
	event.stopPropagation(); // 阻止事件向上冒泡
	$("#" + show_obj).click(function(event) {
		event.stopPropagation(); // 阻止事件向上冒泡
	});
}

// 清空侧边已选状态
function clear_selected_side() {
	$("#cur_selected").hide();
	$("#cur_selected>.txt").html("");
	set_size();
}

// 清空更多条件选择
function clear_select() {
	clear_selected_side();
	$("#select_item dl").each(function() {
		$(this).children('dd').removeClass('cur');
		$(this).children('dd').first().addClass('cur');
	});
	$('#floorDetail').hide();

	$('#keyword').val($('#keyword').attr('rel')).css('color', '#999');
	$('#keyword_f').val($('#keyword_f').attr('rel')).css('color', '#999');
}

function set_size() {
	// 获取初始化值
	var win_height = $(window).height();
	var win_width = $(window).width();
	var nav_height = $("#nav").height();
	var col_search_height = $("#col_search").height();
	var col_side_width = $("#col_side").width();

	// 判断侧栏状态
	var temp_side_hide = false;
	var temp_side_btn_status = $("#close_side_btn").attr("class");
	if (temp_side_btn_status.indexOf("close_side_active") != -1) {
		col_side_width = 0;
	}

	if (g_fullScreen == true) {
		col_search_height = 0;
		col_side_width = 0;
		nav_height = 0;
	}

	// console.log(col_search_height);

	// 计算尺寸===========================================================start
	// 设置地图
	$("#col_main").css({
		"top" : nav_height + col_search_height,
		"height" : win_height - nav_height - col_search_height,
		"width" : win_width - col_side_width
	});
	$("#col_main #allmap").css({
		"height" : win_height - nav_height - col_search_height,
		"width" : win_width - col_side_width
	});

	// 设置侧栏高度 & 坐标
	$("#col_side").css({
		"height" : win_height - nav_height - col_search_height,
		"top" : nav_height + col_search_height
	});

	// 设置选项列表高度
	//set_select_height();

	// 设置楼盘列表高度
	set_floor_list_height();

	function set_select_height() {
		var clear_btn_height = 0, submit_height = 0;
		if ($("#clear_selected").length > 0) {
			clear_btn_height = $("#clear_selected").outerHeight();
		}
		if ($("#submit_btn").length > 0) {
			submit_height = $("#submit_btn").outerHeight();
		}
		var temp_selects_height = 0;
		$("#select_item").children('dl').each(function(index, el) {
			temp_selects_height += $(this).outerHeight();
			// console.log(temp_selects_height);
		});
		var max_selects_height = win_height - nav_height - col_search_height
				- clear_btn_height - submit_height;
		// console.log(temp_selects_height + "-" + max_selects_height);
		var last_selects_height = temp_selects_height < max_selects_height ? temp_selects_height
				: max_selects_height;

		$("#select_item").css({
			"height" : last_selects_height
		});

		// 设置更多条件高度
		$("#more_select").css({
			"height" : last_selects_height + clear_btn_height + submit_height
		});
	}

	// 设置楼盘列表高度
	function set_floor_list_height() {
		var cur_selected_height = $("#cur_selected").outerHeight();
		if ($("#cur_selected>.txt").children('span').length == 0) {
			cur_selected_height = 0;
		}
		var find_result_tip_height = $("#find_result_tip").outerHeight();
		$("#floor_list").css(
				{
					"height" : win_height - nav_height - col_search_height
							- find_result_tip_height - cur_selected_height
				});
		// body...
	}

	// 计算尺寸==========================================================end
}

// 关闭&显示侧栏
function close_side_bar() {
	var temp_class = $("#close_side_btn").attr("class");
	var col_side_width = $("#col_side").width();
	var win_width = $(window).width();
	var speed = 200;

	if (temp_class.indexOf("close_side_active") == -1) {
		// 隐藏侧栏
		$("#close_side_btn").addClass('close_side_active');

		$("#col_side").animate({
			"right" : -col_side_width
		}, speed, function() {
			/* stuff to do after animation is complete */
		});
		$("#col_main").animate({
			"width" : win_width
		}, speed, function() {
			/* stuff to do after animation is complete */
		});
		$("#col_main #allmap").animate({
			"width" : win_width
		}, speed, function() {
			/* stuff to do after animation is complete */
		});

	} else {
		// 显示侧栏
		$("#close_side_btn").removeClass('close_side_active');
		$("#col_side").animate({
			"right" : 0
		}, speed, function() {
			/* stuff to do after animation is complete */
		});

		$("#col_main").animate({
			"width" : win_width - col_side_width
		}, speed, function() {
			/* stuff to do after animation is complete */
		});

		$("#col_main #allmap").animate({
			"width" : win_width - col_side_width
		}, speed, function() {
			/* stuff to do after animation is complete */
		});
	}
	// body...
}

/**
 * 全屏
 * 
 * @param flag
 */
function full_screen(flag) {
	var col_side_width = $("#col_side").width();
	var win_width = $(window).width();

	if (flag == true) {
		// 打开全屏
		$(this).addClass('full_screen_on');
		$("#map_main_search").fadeIn();
		$("#col_search").hide();
		$("#nav").hide();

		$("#col_main").width(win_width);
		$("#col_main #allmap").width(win_width);
		$("#col_side").hide();

		set_size();
	} else {
		// 关闭全屏
		$(this).removeClass('full_screen_on');
		$("#map_main_search").hide();
		$("#col_search").show();
		$("#nav").show();

		$("#col_main").width(win_width - col_side_width);
		$("#col_main #allmap").width(win_width - col_side_width);
		$("#col_side").show();

		set_size();
	}
}
