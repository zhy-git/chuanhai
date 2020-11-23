/**
 * FullScreenControl
 * -----------------------------------------------------------------------------
 */

// 定义一个控件类,即function
function FullScreenControl() {
	// 默认停靠位置和偏移量
	this.defaultAnchor = BMAP_ANCHOR_TOP_RIGHT;
	this.defaultOffset = new BMap.Size(10, 10);
}

// 通过JavaScript的prototype属性继承于BMap.Control
FullScreenControl.prototype = new BMap.Control();

// 自定义控件必须实现自己的initialize方法,并且将控件的DOM元素返回
// 在本方法中创建个div元素作为控件的容器,并将其添加到地图容器中
FullScreenControl.prototype.initialize = function(map) {
	// 创建一个DOM元素
	var div = document.createElement("div");

	var html = '<div id="btn_fullscreen" class="fullscreen_0"></div>';

	div.innerHTML = html;

	// 设置样式
	div.style.width = "39px";
	div.style.height = "39px";
	div.style.cursor = "pointer";
	div.style.backgroundColor = "white";
	div.style.boxShadow = "2px 3px 2px rgba(0,0,0,.09)";

	// 绑定事件,点击一次放大两级
	div.onclick = function(e) {
		g_fullScreen = g_fullScreen == true ? false : true;

		if (g_fullScreen == true) {
			$('#btn_fullscreen').addClass('fullscreen_1');
			$('#btn_fullscreen').removeClass('fullscreen_0_on');

			$('#btn_fullscreen').attr('title', '普通模式');
		} else {
			$('#btn_fullscreen').removeClass('fullscreen_1');
			$('#btn_fullscreen').removeClass('fullscreen_1_on');

			$('#btn_fullscreen').attr('title', '全屏模式');
		}

		full_screen(g_fullScreen);
	}
	div.onmouseover = function(e) {
		// $('#btn_fullscreen').addClass('get_center_on');
		if (g_fullScreen == true) {
			$('#btn_fullscreen').addClass('fullscreen_1_on');
		} else {
			$('#btn_fullscreen').addClass('fullscreen_0_on');
		}
	}
	div.onmouseout = function(e) {
		// $('#btn_fullscreen').removeClass('get_center_on');
		if (g_fullScreen == true) {
			$('#btn_fullscreen').removeClass('fullscreen_1_on');
		} else {
			$('#btn_fullscreen').removeClass('fullscreen_0_on');
		}
	}

	// 添加DOM元素到地图中
	map.getContainer().appendChild(div);

	// 将DOM元素返回
	return div;
}

/**
 * ZoomControl
 * -----------------------------------------------------------------------------
 */

// 定义一个控件类,即function
function ZoomControl() {
	// 默认停靠位置和偏移量
	this.defaultAnchor = BMAP_ANCHOR_BOTTOM_RIGHT;
	this.defaultOffset = new BMap.Size(10, 80);
}

// 通过JavaScript的prototype属性继承于BMap.Control
ZoomControl.prototype = new BMap.Control();

// 自定义控件必须实现自己的initialize方法,并且将控件的DOM元素返回
// 在本方法中创建个div元素作为控件的容器,并将其添加到地图容器中
ZoomControl.prototype.initialize = function(map) {

	// zoom0
	// ----------------------------------------------------
	var div0 = document.createElement("div");
	var html = '<div id="btn_zoom0" class="zoom_btn get_center" title="返回大图"></div>';
	div0.innerHTML = html;

	div0.onclick = function(e) {
		clearParamsMap();
		showArea();
		clear_select();
		$('#floorDetail').hide();
	}
	div0.onmouseover = function(e) {
		$('#btn_zoom0').addClass('get_center_on');
	}
	div0.onmouseout = function(e) {
		$('#btn_zoom0').removeClass('get_center_on');
	}

	// zoom1
	// ----------------------------------------------------
	var div1 = document.createElement("div");
	var html = '<div id="btn_zoom1" class="zoom_btn zoom_lg" title="放大一级"></div>';
	div1.innerHTML = html;

	div1.onclick = function(e) {
		var zoom = map.getZoom();
		map.setZoom(++zoom);
	}
	div1.onmouseover = function(e) {
		$('#btn_zoom1').addClass('zoom_lg_on');
	}
	div1.onmouseout = function(e) {
		$('#btn_zoom1').removeClass('zoom_lg_on');
	}

	// zoom2
	// ----------------------------------------------------
	var div2 = document.createElement("div");
	var html = '<div id="btn_zoom2" class="zoom_btn zoom_sm" title="缩小一级"></div>';
	div2.innerHTML = html;

	div2.onclick = function(e) {
		var zoom = map.getZoom();
		map.setZoom(--zoom);
	}
	div2.onmouseover = function(e) {
		$('#btn_zoom2').addClass('zoom_sm_on');
	}
	div2.onmouseout = function(e) {
		$('#btn_zoom2').removeClass('zoom_sm_on');
	}

	// div
	var div = document.createElement("div");
	div.appendChild(div0);
	div.appendChild(div1);
	div.appendChild(div2);

	// 添加DOM元素到地图中
	map.getContainer().appendChild(div);

	// 将DOM元素返回
	return div;
}

/**
 * MapTypeControl
 * -----------------------------------------------------------------------------
 */

// 定义一个控件类,即function
function MapTypeControl() {
	// 默认停靠位置和偏移量
	this.defaultAnchor = BMAP_ANCHOR_BOTTOM_RIGHT;
	this.defaultOffset = new BMap.Size(10, 10);
}

// 通过JavaScript的prototype属性继承于BMap.Control
MapTypeControl.prototype = new BMap.Control();

// 自定义控件必须实现自己的initialize方法,并且将控件的DOM元素返回
// 在本方法中创建个div元素作为控件的容器,并将其添加到地图容器中
MapTypeControl.prototype.initialize = function(map) {
	var div = document.createElement("div");

	var html = '<div class="map_model"><div class="txt">卫星</div></div>';

	div.id = 'mapTypeCtrl';
	div.innerHTML = html;

	// 绑定事件,点击一次放大两级
	div.onclick = function(e) {
		g_mapType = g_mapType == 1 ? 2 : 1;

		if (g_mapType == 1) {
			map.setMapType(BMAP_NORMAL_MAP);

			$('#mapTypeCtrl .map_model').removeClass('map_model_1');
			$('#mapTypeCtrl .txt').text('卫星');
		} else if (g_mapType == 2) {
			map.setMapType(BMAP_HYBRID_MAP);

			$('#mapTypeCtrl .map_model').addClass('map_model_1');
			$('#mapTypeCtrl .txt').text('地图');
		}
	}
	div.onmouseover = function(e) {
		$('#mapTypeCtrl').children().addClass('map_model_on');
	}
	div.onmouseout = function(e) {
		$('#mapTypeCtrl').children().removeClass('map_model_on');
	}

	// 添加DOM元素到地图中
	map.getContainer().appendChild(div);

	// 将DOM元素返回
	return div;
}

/**
 * MapTagsControl
 * -----------------------------------------------------------------------------
 */

// 定义一个控件类,即function
function MapTagsControl() {
	// 默认停靠位置和偏移量
	this.defaultAnchor = BMAP_ANCHOR_TOP_LEFT;
	this.defaultOffset = new BMap.Size(20, 20);
}

// 通过JavaScript的prototype属性继承于BMap.Control
MapTagsControl.prototype = new BMap.Control();

// 自定义控件必须实现自己的initialize方法,并且将控件的DOM元素返回
// 在本方法中创建个div元素作为控件的容器,并将其添加到地图容器中
MapTagsControl.prototype.initialize = function(map) {
	var div = document.createElement("div");

	var html = '<div class="tags">';
	html += '<ul>';
	//html += '  <li><a href="javascript:void(0);" class="i1"></a></li>';
	//html += '  <li><a href="javascript:void(0);" class="i2"></a></li>';
	html += '  <li><a href="javascript:void(0);" class="i3"></a></li>';
	//html += '  <li><a href="javascript:void(0);" class="i4"></a></li>';
	html += '</ul>';
	html += '</div>';

	div.innerHTML = html;

	// 绑定事件,点击一次放大两级
	div.onclick = function(e) {

	}

	// 添加DOM元素到地图中
	map.getContainer().appendChild(div);

	// 将DOM元素返回
	return div;
}

/**
 * FccsPoint
 * -----------------------------------------------------------------------------
 */

function FccsPoint() {
	this.issueId = 0;
	this.mapX = 0;
	this.mapY = 0;
	this.floor = "";
	this.show = false;
	this.sellSchedule = 0;
	this.price = "";
}

/**
 * FccsAreaData
 * -----------------------------------------------------------------------------
 */

function FccsAreaData(areaId, area, mapX, mapY, count) {
	this.areaId = areaId;
	this.area = area;
	this.mapX = mapX;
	this.mapY = mapY;
	this.count = count;
}