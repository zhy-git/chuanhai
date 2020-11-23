$(function() {
	$(".periods0").each(
			function() {
				var width_temp = "";
				var periods_width = $(this).children(".periods").width();
				var item_y = $(this).children(".periods_more").find(
						".p_m_items");
				var periods_more_width = $(this).children(".periods_more")
						.width();
				if (periods_width > periods_more_width)
					width_temp = periods_width;
				else
					width_temp = periods_more_width;
				$(this).children(".periods").width(width_temp);
				$(this).children(".periods_more").width(width_temp);

				item_y.mousedown(function() {
					var tempNum = $(this).index();
					var tempVal = $(this).attr("rel");
					var tempValY = $(this).attr("jup");
					var tempStr = $(this).text();
					var tempVal1 = $(this).html();

					if (tempStr == 'È«²¿') {
						tempStr = '';
					}

					if (tempNum == 0) {
						$(this).parent(".periods_more").prevAll(".periods")
								.children("span").html(
										$(this).parent(".periods_more")
												.prevAll(".periods").children(
														"span").attr("rel"));
						$(this).parent(".periods_more").prevAll("input").val(
								tempVal);
					} else {
						$(this).parent(".periods_more").prevAll(".periods")
								.children("span").html(tempVal1);
						$(this).parent(".periods_more").prevAll("input").val(
								tempVal);
					}

					$(".periods_more").css("visibility", "hidden");
					$(".periods").removeClass("periods_cur");

					if (tempValY == "y") {

						var obj = $(this).parent(".periods_more");
						$(obj).attr('rel_v', tempVal);

						var kk = $(obj).attr('rel_n');
						var kv = $(obj).attr('rel_v');

						if (kk == 'areaId') {
							if (tempVal == '') {
								showArea();
							} else {
								gotoArea(tempVal, tempStr, $(this)
										.attr('bmapx'), $(this).attr('bmapy'));
							}
						} else {
							// if (g_map.getZoom() == 14) {
							// g_map.setZoom(15);
							// }

							// if (g_viewMode == false) {
							selectObject(kk, kv, tempStr);
							// }
						}
					}
				});

			});

	$(".periods0").hover(function() {
		$(this).children(".periods_more").css("visibility", "visible");
		$(this).children(".periods").addClass("periods_cur");
	}, function() {
		$(this).children(".periods_more").css("visibility", "hidden");
		$(this).children(".periods").removeClass("periods_cur");
	});

	$(".p_m_items").mouseover(function() {
		$(this).addClass("cur");
	});

	$(".p_m_items").mouseout(function() {
		$(this).removeClass("cur");
	});

	$("#myform :reset").mousedown(function() {
		$(".periods span").each(function() {
			$(this).html($(this).attr("rel"));
		});
	});
});