var g_mapId = "allmap"; // 地图对象ID
var g_map = null; // 地图对象
var g_fullScreen = false; // 全屏模式
var g_mapType = 1; // 地图类型
var g_rightPageSize = 10; // 右侧每页显示条数
var g_page = 0; // 当前页码
var g_pageCount = 0; // 当前总共页数
var g_viewMode = false; // 单点查看模式
var g_viewModelBounds = null; // 单点模式区域数据
var g_viewModelPageCount = 0;

// 搜索参数
var g_paramsMap = {};

// 楼盘坐标数组
var g_pointArray = new Array();

// 创建控件
var g_fullScreenCtrl = null;
var g_zoomCtrl = null;
var g_mapTypeCtrl = null;
var g_mapTagsCtrl = null;

$(function() {

	// 百度地图API功能
	g_map = new BMap.Map(g_mapId, {
		// 设置地图可点
		enableMapClick : false

	}); // 创建Map实例

	// 初妈化地图
	initMap();

	// 地图事件
	g_map.addEventListener("zoomend", function() {
		var zoom = this.getZoom();
		// console.log('zoom:' + zoom + ' g_viewMode:' + g_viewMode);

		if (zoom <= g_bmapz) {
			showArea();
		} else if (zoom > g_bmapz) {
			if (zoom == (g_bmapz + 1)) {
				clearMap();
			}
			if (g_viewMode == false) {
				// console.log('-------------------------------------------1');
				searchMap();
			}
		}
	});

	g_map.addEventListener("dragend", function() {
		var zoom = this.getZoom();
		// console.log('zoom:' + zoom + ' g_viewMode:' + g_viewMode);

		if (zoom > g_bmapz) {
			if (g_viewMode == false) {
				// console.log('-------------------------------------------2');
				searchMap();
			}
		}
	});

	// 画区域
	showArea();

	// 滚动捕捉
	$('#floor_list').scroll(function() {
		viewH = $(this).height(),// 可见高度
		contentH = $(this).get(0).scrollHeight,// 内容高度
		scrollTop = $(this).scrollTop();// 滚动高度
		if (scrollTop / (contentH - viewH) >= 0.95) { //
			// console.log('======================>');
			searchFloor();
		}

	});

	$('#keywordSumit').click(function() {
		var obj = $('#keyword');
		var val = $(obj).val();
		if (val == $(obj).attr('rel')) {
			val = '';
		}
		// alert(val);
		selectObject('floor', val, val);
	});

	$('#keywordSumit_f').click(function() {
		var obj = $('#keyword_f');
		var val = $(obj).val();
		if (val == $(obj).attr('rel')) {
			val = '';
		}
		// alert(val);
		selectObject('floor', val, val);
	});

	// 搜索框文字
	$('.keywordText').each(function() {

		var searchDefaultValue = $(this).attr("rel");

		$(this).val(searchDefaultValue);
		$(this).css('color', '#999');

		$(this).focus(function() {
			if ($(this).val() == searchDefaultValue) {
				$(this).val('');
				$(this).css('color', '#000');
			}
		});

		$(this).blur(function() {
			if ($(this).val() == '') {
				$(this).val(searchDefaultValue);
				$(this).css('color', '#999');
			}
		});
	});

	// 搜索框楼盘下拉列表
	var keyword = "";
	$("#keyword").autocomplete("/loupan/sokey.php", {
		extraParams : {
			keyword : function() {
				keyword = $.trim($("#keyword").val());
				return keyword;
			},
			floorUse : g_floorUse
		},
		parse : function(data) {
			var parsed = [];
			var rows = data;
			for (var i = 0; i < rows.length; i++) {
				var row = rows[i];
				if (row) {
					parsed[parsed.length] = {
						value : row.floor,
						data : row,
						// result : row.floor
						result : row.floor.replace(/<[^>]+?>/g, '')
					};
				}
			}
			return parsed;
		},
		formatItem : function(row) {
			return row.floor;
		},
		scrollHeight : 480,
		width : 319,
		left : -9,
		dataType : "json"
	}).result(function(event, data, formatted) {
		// alert(keyword + '---' + data.issueId);
		// selectObject("floor", keyword);
		selectObject("issueId", data.issueId);
	});

	// 搜索框楼盘下拉列表
	var keyword = "";
	$("#keyword_f").autocomplete("/loupan/sokey.php", {
		extraParams : {
			keyword : function() {
				keyword = $.trim($("#keyword_f").val());
				return keyword;
			},
			floorUse : g_floorUse
		},
		parse : function(data) {
			var parsed = [];
			var rows = data;
			for (var i = 0; i < rows.length; i++) {
				var row = rows[i];
				if (row) {
					parsed[parsed.length] = {
						value : row.floor,
						data : row,
						// result : row.floor
						result : row.floor.replace(/<[^>]+?>/g, '')
					};
				}
			}
			return parsed;
		},
		formatItem : function(row) {
			return row.floor;
		},
		scrollHeight : 480,
		width : 388,
		left : -11,
		dataType : "json"
	}).result(function(event, data, formatted) {
		// alert(keyword + '---' + data.issueId);
		// selectObject("floor", keyword);
		selectObject("issueId", data.issueId);
	});

	// order
	$('#order').change(function() {
		selectObject('order', $(this).val());
	});

	// floor detail close
	$('#floorDetail .close').click(function() {
		// console.log('floorDetail close ==> g_viewMode:' + g_viewMode
		// + ' -- ' + g_bmapz);
		$('#floorDetail').hide();

		// 关闭
		if (g_viewMode == true) {
			g_map.setZoom(g_bmapz + 2);
			g_viewMode = false;
			clearParamsMap();
		}
	});

	// init by issueId
	if (g_issueId > 0) {
		close_side_bar();
		showFloorDetail(g_issueId, true);
	}

});

/**
 * 初始化地图
 * 
 * @param map
 * @param point
 */
function initMap() {
	var point = new BMap.Point(g_bmapx, g_bmapy);

	// 初始化地图,设置中心点坐标和地图级别
	g_map.centerAndZoom(point, g_bmapz);
	g_map.enableScrollWheelZoom(true); // 开启鼠标滚轮缩放

	// 全屏
	g_fullScreenCtrl = new FullScreenControl();
	g_map.addControl(g_fullScreenCtrl);

	// 缩放
	g_zoomCtrl = new ZoomControl();
	g_map.addControl(g_zoomCtrl);

	// 地图类型
	g_mapTypeCtrl = new MapTypeControl();
	g_map.addControl(g_mapTypeCtrl);

	// 地图标签
	g_mapTagsCtrl = new MapTagsControl();
	g_map.addControl(g_mapTagsCtrl);
}

/**
 * 显示区域
 * 
 * @param map
 * @returns
 */
function showArea() {
	if (g_issueId == 0) {
		setParamsMap("areaId", "");
		selectShow("areaId", "", "");

		g_map.centerAndZoom(new BMap.Point(g_bmapx, g_bmapy), g_bmapz);
		// g_map.centerAndZoom(new BMap.Point(g_bmapx, g_bmapy), 11);

		// 清除
		clearMap();

		// 显示
		for ( var i in g_areaArray) {
			var o = g_areaArray[i];
			if (o.count > 0) {
				mapDrawArea(o.mapX, o.mapY, o.area, o.areaId, o.count);
			}
		}
	}

	// 数量
	$('#find_result_tip span').text(g_totalCount);
	g_pageCount = Math.ceil(g_totalCount / g_rightPageSize);
	g_page = 0;
	searchFloor(true);
}

/**
 * 绘制区域
 * 
 * @param map
 * @param x
 * @param y
 * @param area
 * @param areaId
 * @param count
 */
function mapDrawArea(x, y, area, areaId, count) {
	var point = new BMap.Point(x, y);

	var html = '<div class="map_icon"><a href="#"><span>' + area
			+ '</span><br /><label>' + count + '个楼盘</label></a></div>';

	var richMarker = new BMapLib.RichMarker(html, point, {
		anchor : new BMap.Size(-48, -54)
	});

	richMarker.addEventListener("click", function(e) {
		gotoArea(areaId, area, x, y);
	});

	g_map.addOverlay(richMarker);
}

/**
 * 获取屏幕地图的坐标范围
 * 
 * @param map
 * @returns {Array}
 */
function gethdBounds() {
	var bounds = g_map.getBounds();
	var pointSw = g_map.pointToPixel(bounds.getSouthWest());
	var pointNe = g_map.pointToPixel(bounds.getNorthEast());
	var sw = g_map.pixelToPoint(new BMap.Pixel(pointSw.x + 8, pointSw.y - 8));
	var ne = g_map.pixelToPoint(new BMap.Pixel(pointNe.x - 8, pointNe.y + 8));
	return [ sw.lng, ne.lng, sw.lat, ne.lat ];
};

/**
 * 显示楼盘列表
 * 
 * @param map
 * @param areaId
 */
function searchMap(all) {
	var defPhoto = 'http://imgf1.fccs.com.cn/newhouse/v5/images/no_photo.gif';

	var bounds = gethdBounds().join(',');

	// 显示全部
	if (all == true) {
		bounds = '';
	}

	setParamsMap("bounds", bounds);

	$.getJSON('/loupan/mp.php?kk=1' + Date(), g_paramsMap, function(
			json) {
		g_pageCount = Math.ceil(json.page.rowCount / g_rightPageSize);
		g_page = 0;

		var str0 = "共找到 " + json.page.rowCount + " 个楼盘，page/pageCount:"
				+ g_page + "/" + g_pageCount + ' ====> '
				+ (json.page.rowCount / g_rightPageSize);
		// console.log(str0);

		// 检查数组是否已满，最大100个数据
		if (g_pointArray.length > 100) {
			g_pointArray = new Array();
		}

		// 把没有的对象加到数组中
		for ( var i in json.items) {
			var o = json.items[i];

			var flag = false;
			for ( var j in g_pointArray) {
				var oo = g_pointArray[j];
				if (oo.issueId == o.issueId) {
					flag = true;
				}
			}

			if (flag == false) {
				var p = new FccsPoint();
				p.issueId = o.issueId;
				p.mapX = o.mapX;
				p.mapY = o.mapY;
				p.floor = o.floor;
				p.show = false;
				p.sellSchedule = o.sellSchedule;

				// price
				var html0 = '';
				if (o.price && o.price.price > 0) {
					html0 += '<label class="price"><strong class="fb">';
					if (o.price.houseUse == '普通住宅') {
						html0 += o.price.buildingType;
					}
					html0 += o.price.houseUse;
					html0 += '</strong>&nbsp;<span class="w_c_1 fb">'
							+ o.price.price + '</span>' + o.price.priceUnit
							+ '&nbsp;' + o.price.priceUnitOther + '</label>';
				} else {
					html0 += '<label class="price">售价待定</label>';
				}
				p.price = html0;

				g_pointArray.push(p);
			}
		}

		// 显示楼盘
		var count = 0;
		var issueIdaaa = 0;
		for ( var j in g_pointArray) {
			var oo = g_pointArray[j];
			if (oo.show == false) {
				oo.show = true;
				drawFloor(oo.issueId, oo.mapX, oo.mapY, oo.floor,
						oo.sellSchedule, oo.price);
				count++;
				issueIdaaa=oo.issueId;
			}
		}

		// 数量
		$('#find_result_tip span').text(json.page.rowCount);

		if (json.page.rowCount == 1) {
			var fp = json.items[0];
			gotoPoint(fp.issueId, fp.mapX, fp.mapY, fp.sellSchedule, fp.floor);
		}

		g_viewMode = false;//false
		searchFloor(all);

	});

}

/**
 * 显示单个楼盘
 * 
 * @param map
 * @param item
 */
function drawFloor(issueId, mapX, mapY, floor, sellSchedule, price) {
	var point = new BMap.Point(mapX, mapY);
	var zoom = g_map.getZoom();
	// console.log('drawFloor.zoom ==> ' + zoom);

	var html = '<div onMouseOver="mouse_on(this);" onMouseOut="mouse_out(this);" class="floor_icon">';
	html += '<div class="floor_name floor_name_1"><div class="bg_l"></div><div class="bg_r"></div><div class="con">';
	html += '<label class="name">' + floor + '</label>';
	html += price;
	html += '</div></div><span class="dot';

	if (sellSchedule == 2) {
		html += ' dot_2';
	} else if (sellSchedule == 3) {
		html += ' dot_3';
	} else if (sellSchedule == 4) {
		html += ' dot_4';
	}

	html += '"></span></div>';

	var richMarker = new BMapLib.RichMarker(html, point, {
		anchor : new BMap.Size(-10, -10)
	});
	richMarker.addEventListener("click", function(e) {
		// alert('x');
		showFloorDetail(issueId);
	});

	g_map.addOverlay(richMarker);
}

var temp_floor_z_index = "";
var temp_floor_name_1 = false;
var temp_floor_show = false;

/**
 * mouse_on
 * 
 * @param e
 */
function mouse_on(e) {
	var $temp_obj = $(e);
	temp_floor_z_index = $temp_obj.parent().css("z-index");
	$temp_obj.parent().css("z-index", "100000");
	var temp_class = $temp_obj.children(".floor_name").attr("class");
	if (temp_class.indexOf("floor_name_1") != -1) {
		temp_floor_name_1 = true;
		$temp_obj.children().removeClass("floor_name_1");
	}
	if (temp_class.indexOf("dn") != -1) {
		temp_floor_show = true;
	} else {
		temp_floor_show = false;
	}
	$temp_obj.children(".floor_name").show();
}

/**
 * mouse_out
 * 
 * @param e
 */
function mouse_out(e) {
	var $temp_obj = $(e);
	$temp_obj.parent().css("z-index", temp_floor_z_index);
	if (temp_floor_name_1) {
		$temp_obj.children(".floor_name").addClass("floor_name_1");
	}
	if (temp_floor_show) {
		$temp_obj.children(".floor_name").hide();
	}
}

function searchFloor(all) {
	var defPhoto = 'http://imgf1.fccs.com.cn/newhouse/v5/images/no_photo.gif';

	var bounds = gethdBounds().join(',');

	if (g_viewMode == true) {
		bounds = g_viewModelBounds;
		g_pageCount = g_viewModelPageCount;
	}

	// 显示全部
	if (all == true) {
		bounds = '';
	}

	if (g_page == g_pageCount && g_page == 0) {
		// console.log('===============>>>> searchFloor return << g_page:'
		// + g_page + ' g_pageCount:' + g_pageCount);
		$('#floor_list').html('');
		return;
	}
	if (g_page > g_pageCount) {
		// console.log('===============>>>> searchFloor return << g_page:'
		// + g_page + ' g_pageCount:' + g_pageCount);
		return;
	}

	g_page = g_page + 1;
	// console.log('g_page/g_pageCount ==> ' + g_page + '/' + g_pageCount);

	setParamsMap("p", g_page);
	setParamsMap("pageSize", g_rightPageSize);

	$
			.getJSON(
					'/loupan/mpp.php?kk=1' + new Date(),
					g_paramsMap,
					function(json) {
						var page = json.page.page;
						// console.log('searchFloor>>>>>> found: '
						// + json.page.rowCount);

						// 楼盘列表
						var html = '<ul>';
						for (var i = 0; i < json.items.length; i++) {
							var o = json.items[i];

							var photo = o.photo;

							if (typeof (o.photo) == 'undefined') {
								photo = defPhoto;
							}

							html += '<li onclick="javascript:gotoPoint('
									+ o.issueId + ',' + o.mapX + ', ' + o.mapY
									+ ', ' + o.sellSchedule + ', \'' + o.floor
									+ '\');">';
							html += '<div class="pic fl">';
							if (o.price) {
								html += '<div class="num">' + o.price.houseUse
										+ '</div>';
							}
							html += '    <a href="javascript:void(0);"><img src="'
									+ photo
									+ '" width="140" height="95" border="0"></a>';
							html += '</div>';
							html += '<div class="info fl">';
							html += '    <div class="i1"><a href="javascript:void(0);">'
									+ o.floor + '</a></div>';

							// model
								html0 = '';
						if (o.appraiseCount > 0) {
							html0 += '<a href="/index.php/House/trends/id/'
									+ o.issueId
									+ '/catid/33.html" target="_blank">动态(<span class="w_c_1 td_un">'
									+ o.appraiseCount + '</span>)</a>';
						}
						if (o.photoCount > 0) {
							html0 += '<a href="/index.php/House/xiangce/id/'
									+ o.issueId
									+ '/catid/33.html" target="_blank">相册(<span class="w_c_1 td_un">'
									+ o.photoCount + '</span>)</a>';
						}
						if (o.modelCount > 0) {
							html0 += '<a href="/index.php/House/huxing/id/'
									+ o.issueId
									+ '/catid/33.html" target="_blank">户型(<span class="w_c_1 td_un">'
									+ o.modelCount + '</span>)</a>';
						}
						if (o.phoneCount > 0 || o.modelCount > 0
								|| o.appraiseCount > 0) {
							html += '<div class="i2 "">' + html0 + '</div>';
						}

							// price
							if (o.price && o.price.price > 0) {
								html += '    <div class="i3"><span class="w_c_1 fb">'
										+ o.price.price
										+ '</span> '
										+ o.price.priceUnit
										+ o.price.priceUnitOther + '</div>';
							} else {
								html += '    <div class="i3"><span class="w_c_1 fb">售价待定</span></div>';
							}

							html += '    <div class="i4">' + o.phone + '</div>';
							html += '</div>';
							html += '<div class="cb0"></div>';
							html += '</li>';
						}
						html += '</ul>';
						// alert(html);

						if (page == 1) {
							$('#floor_list').html('');
							$('#floor_list').html(html);
							// console.log('page:' + page + ' --> new');
						} else {
							$("#floor_list").children('ul').append(html);
							// console.log('page:' + page + ' --> append');
						}

					});
}

function searchFloor2(cityall) {
//	alert(cityall+"");
//	alert(1);
	var defPhoto = 'http://imgf1.fccs.com.cn/newhouse/v5/images/no_photo.gif';

	var bounds = gethdBounds().join(',');

	if (g_viewMode == true) {
		bounds = g_viewModelBounds;
		g_pageCount = g_viewModelPageCount;
	}

	// 显示全部
	if (all == true) {
		bounds = '';
	}

	if (g_page == g_pageCount && g_page == 0) {
		// console.log('===============>>>> searchFloor return << g_page:'
		// + g_page + ' g_pageCount:' + g_pageCount);
		$('#floor_list').html('');
		return;
	}
	if (g_page > g_pageCount) {
		// console.log('===============>>>> searchFloor return << g_page:'
		// + g_page + ' g_pageCount:' + g_pageCount);
		return;
	}

	g_page = g_page + 1;
	// console.log('g_page/g_pageCount ==> ' + g_page + '/' + g_pageCount);

	setParamsMap("p", g_page);
	setParamsMap("pageSize", g_rightPageSize);

	$
			.getJSON(
					'/loupan/mpp.php?kk=1&cityall_id='+cityall + new Date(),
					g_paramsMap,
					function(json) {
						var page = json.page.page;
						// console.log('searchFloor>>>>>> found: '
						// + json.page.rowCount);

						// 楼盘列表
						var html = '<ul>';
						for (var i = 0; i < json.items.length; i++) {
							var o = json.items[i];

							var photo = o.photo;

							if (typeof (o.photo) == 'undefined') {
								photo = defPhoto;
							}

							html += '<li onclick="javascript:gotoPoint('
									+ o.issueId + ',' + o.mapX + ', ' + o.mapY
									+ ', ' + o.sellSchedule + ', \'' + o.floor
									+ '\');">';
							html += '<div class="pic fl">';
							if (o.price) {
								html += '<div class="num">' + o.price.houseUse
										+ '</div>';
							}
							html += '    <a href="javascript:void(0);"><img src="'
									+ photo
									+ '" width="140" height="95" border="0"></a>';
							html += '</div>';
							html += '<div class="info fl">';
							html += '    <div class="i1"><a href="javascript:void(0);">'
									+ o.floor + '</a></div>';

							// model
								html0 = '';
						if (o.appraiseCount > 0) {
							html0 += '<a href="/index.php/House/trends/id/'
									+ o.issueId
									+ '/catid/33.html" target="_blank">动态(<span class="w_c_1 td_un">'
									+ o.appraiseCount + '</span>)</a>';
						}
						if (o.photoCount > 0) {
							html0 += '<a href="/index.php/House/xiangce/id/'
									+ o.issueId
									+ '/catid/33.html" target="_blank">相册(<span class="w_c_1 td_un">'
									+ o.photoCount + '</span>)</a>';
						}
						if (o.modelCount > 0) {
							html0 += '<a href="/index.php/House/huxing/id/'
									+ o.issueId
									+ '/catid/33.html" target="_blank">户型(<span class="w_c_1 td_un">'
									+ o.modelCount + '</span>)</a>';
						}
						if (o.phoneCount > 0 || o.modelCount > 0
								|| o.appraiseCount > 0) {
							html += '<div class="i2 "">' + html0 + '</div>';
						}

							// price
							if (o.price && o.price.price > 0) {
								html += '    <div class="i3"><span class="w_c_1 fb">'
										+ o.price.price
										+ '</span> '
										+ o.price.priceUnit
										+ o.price.priceUnitOther + '</div>';
							} else {
								html += '    <div class="i3"><span class="w_c_1 fb">售价待定</span></div>';
							}

							html += '    <div class="i4">' + o.phone + '</div>';
							html += '</div>';
							html += '<div class="cb0"></div>';
							html += '</li>';
						}
						html += '</ul>';
						// alert(html);

						if (page == 1) {
							$('#floor_list').html('');
							$('#floor_list').html(html);
							// console.log('page:' + page + ' --> new');
						} else {
							$("#floor_list").children('ul').append(html);
							// console.log('page:' + page + ' --> append');
						}

					});
}

function gotoPoint(issueId, mapX, mapY, sellSchedule, floor) {
	var point = new BMap.Point(mapX, mapY);

	// 清除
	g_map.clearOverlays();
	g_viewMode = true;
	if (g_viewModelBounds == null) {
		g_viewModelBounds = gethdBounds().join(',');
		g_viewModelPageCount = g_pageCount;
	}

	// console.log('-------------------------------------------00');

	// 初始化地图,设置中心点坐标和地图级别
	g_map.centerAndZoom(point, g_bmapz + 3);

	drawFloor(issueId, mapX, mapY, floor, sellSchedule, '');
	showFloorDetail(issueId);
}

/**
 * 跳转到指定区域
 * 
 * @param areaId
 */
function gotoArea(areaId, area, x, y) {
	setParamsMap("areaId", areaId);
	selectShow("areaId", areaId, area);

	// 清除
	clearMap();

	// 定位到该区域
	g_map.centerAndZoom(new BMap.Point(x, y), g_bmapz + 2);
	

	// 显示楼盘
	searchMap();
}

function setParamsMap(key, value) {
	// mapType
	if (g_pageMapType == 'office') {
		g_paramsMap['floorUse'] = 3;
	} else if (g_pageMapType == 'shop') {
		g_paramsMap['floorUse'] = 4;
	}

	g_paramsMap[key] = value;

	// console.log('--g_paramsMap --------------->>>');
	for ( var prop in g_paramsMap) {
		if (g_paramsMap.hasOwnProperty(prop)) {
			// console.log(prop + ' : ' + g_paramsMap[prop]);
		}
	}
}

function clearParamsMap() {
	g_paramsMap = {};

	// for ( var prop in g_paramsMap) {
	// if (g_paramsMap.hasOwnProperty(prop)) {
	// g_paramsMap[prop] = '';
	// }
	// }

	// console.log('--clearParamsMap --------------->>>');
}

/**
 * 清除地图
 */
function clearMap() {

	// 清除层
	g_map.clearOverlays();

	// 变量
	g_page = 0;
	g_viewMode = false;
	g_viewModelBounds = null;
	g_issueId = 0;

	// 清除楼盘数组
	g_pointArray = new Array();
}

/**
 * 更多条件搜索
 * 
 * @param name
 * @param value
 */
function selectObject(name, value, str) {
	$("#more_select").css("visibility", "hidden");

	setParamsMap(name, value);

	selectShow(name, value, str);

	clearMap();
	searchMap();
}

function selectShow(name, value, str) {
	// console.log('--------sel--------> ' + name + ' --> ' + value + ' --> '
	// + str);

	$cur_selected_txt = $("#cur_selected>.txt");

	// 当选择的条件为其他
	$("#cur_selected").show();
	var default_html = $cur_selected_txt.html();

	if (default_html.indexOf(name) != -1) {
		$cur_selected_txt.children("span[rel='" + name + "']").remove();
	}
	if (str != '' && typeof (str) != 'undefined') {
		$cur_selected_txt.append("<span rel='" + name + "' val='" + value
				+ "'>" + str + "</span>");
	}

	// 如果当前选中的条件为空隐藏
	if ($cur_selected_txt.children("span").length == 0) {
		$("#cur_selected").hide();
	}
}

/**
 * 显示楼盘详细
 * 
 * @param issueId
 */
function showFloorDetail(issueId, showFloorPoint) {
	$
			.getJSON(
					'/loupan/mppid.php?time=' + new Date(),
					{
						issueId : issueId
					},
					function(json) {
						// console.log('----> ' + json.floor);

						// show point
						if (showFloorPoint == true) {
							gotoPoint(json.issueId, json.mapX, json.mapY,
									json.sellSchedule, json.floor)
						}

						// img & phone
						var photo = json.photo;
						if (typeof (photo) == 'undefined') {
							photo = 'http://imgf1.fccs.com.cn/newhouse/v5/images/no_photo.gif';
						}
						$('#floorDetail .pic_tel .pic a')
								.attr('href', json.url).children('img').attr(
										'src', photo);
						if (json.price) {
							$('#floorDetail .pic_tel .pic .num').show();
							$('#floorDetail .pic_tel .pic .num').text(
									json.price.houseUse);
						} else {
							$('#floorDetail .pic_tel .pic .num').hide();
						}

						$('#floorDetail .pic_tel .tel label').text(json.phone);

						var html = '', html0 = '';

						// 1:floor
						html += '<div class="i1 ell"><a href="' + json.url
								+ '" target="_blank" class="w_l_2">'
								+ json.floor + '</a></div>';

						// 2:price
						html0 = '';
						if (json.price && json.price.price > 0) {
							/*
							 * if (json.price.houseUse == '普通住宅') { html0 +=
							 * json.price.buildingType; } html0 +=
							 * json.price.houseUse;
							 */
							html0 += '<span class="f24 w_c_1">'
									+ json.price.price + '</span> '
									+ json.price.priceUnit
									+ json.price.priceUnitOther;
						} else {
							html0 += '<span class="f24 w_c_1">售价待定</span>';
						}
						html += '<div class="i2 ell">' + html0 + '</div>';

						// 3:address
						html += '<div class="i3 ell" id="i3_1">' + json.address
								+ '</div>';

						// 3:model
					
html += '<div class="i1 ell">建筑形式： '+ 
								json.jzxs + '</div>';
						// 4:count
						html0 = '';
						if (json.appraiseCount > 0) {
							html0 += '<a href="/loupan/news_show.php?lpid='
									+ json.issueId
									+ '#/catid/33.html" target="_blank">动态(<span class="w_c_1 td_un">'
									+ json.appraiseCount + '</span>)</a>';
						}
						if (json.photoCount > 0) {
							html0 += '<a href="/loupan/loupan_pic.php?lpid='
									+ json.issueId
									+ '#/catid/33.html" target="_blank">相册(<span class="w_c_1 td_un">'
									+ json.photoCount + '</span>)</a>';
						}
						if (json.modelCount > 0) {
							html0 += '<a href="/loupan/loupan_pic.php?lpid='
									+ json.issueId
									+ '&pid_flag=xc1" target="_blank">户型(<span class="w_c_1 td_un">'
									+ json.modelCount + '</span>)</a>';
						}
						if (json.phoneCount > 0 || json.modelCount > 0
								|| json.appraiseCount > 0) {
							html += '<div class="i4 ell"">' + html0 + '</div>';
						}

						// 5:groupbuy
						html += '<div class="i5 ell">';
						html += '  <a href="'
								+ json.urlShort
								+ '#buy" target="_blank"><img src="/public/static/home/image/dianji.png" border="0" class="vm"></a>';
						
						html += '</div>';

						// output html
						$('#floorDetail .info').html(html);

						// show
						$('#floorDetail').show();

					});

}