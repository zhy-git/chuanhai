define(['jquery'], function($) {
	$(document).ready(function(){
		var compare = $('.f-fixed.compare'),
			hd = compare.find('.hd'),
			bd = compare.find('.bd'),
			tab = compare.find('.tab'),
			house_diff = $('.house_diff'),
			compare_records_id = $('#compare_records_id'),
			show = function() {
				tab.addClass('f-dn');
				hd.removeClass('f-dn');
				bd.removeClass('f-dn');
			},
			hide = function() {
				tab.removeClass('f-dn');
				hd.addClass('f-dn');
				bd.addClass('f-dn');
			},
			search_input_duibu = $('#search_input_duibu'),
			search_ul_duibi = $('#search_ul_duibi'),
			httpCall,
			clear_all = $('#clear_all'),
			compare_btn_id = $('#compare_btn_id'),
			compateUrl='/duibi/',
			house_list_panel_id = $('#house_list_panel_id'),
			around_item = $('.around input.duibi'),
			around_btn = $('.around .duibi_btn');


		/* 显示和隐藏对比 */
		compare.on('click', function(e) {
			var e = e || event,
				target = $(e.target)
			if(target.hasClass('open')) {
				show();
			}
			else if(target.hasClass('close') && e.target.nodeName.toLowerCase() === 'span') {
				hide();
			}
		});

		/* 选中对比 */
		house_diff.each(function() {
			var li = '';
			if(this.checked) {
				li = '<li><i class="icon close" data-id="'+this.dataset.id+'" title="取消比较">×</i><label>'+this.dataset.name+'</label></li>';
				compare_records_id.append(li);
			}
			$(this).on('change', function() {
				if(this.checked) {
					li = '<li><i class="icon close" data-id="'+this.dataset.id+'" title="取消比较">×</i><label>'+this.dataset.name+'</label></li>';
					if(compare_records_id.find('li').length >= 4) {						
						layer.alert('最多选中四个楼盘比对！', {icon: 5});
						this.checked = false;
						return false;
					}
					if(!compare.find('.tab').hasClass('f-dn')) {
						show();
					}
					compare_records_id.append(li);
				}else {
					var item = compare_records_id.find('li');
					for(var i = 0; i < item.length; i++) {
						var name = item.eq(i).find('label').text();
						if(this.dataset.name === name) {
							item.eq(i).remove();
							break;
						}
					}
				}
			})
		});

		/* 搜索对比楼盘 */
	    search_input_duibu.bind('keyup focus',function(event){
	        search_ul_duibi.empty();
	        var kw = $.trim(search_input_duibu.val());
	        if(kw =='') {   
	            return false;
	        }
	        if(httpCall) httpCall.abort();
	        httpCall = $.ajax({
	            type:"get",
	            data:{"kw":kw},
	            url :"/api/search_data/",
	            beforeSend:function(){
	                search_ul_duibi.slideDown("500");
	                search_ul_duibi.html("<li><a>查询中...</a><li/>");
	            },
	            success:function(str){
	                search_ul_duibi.html(str);
	            }
	        })
	    });

	    /* 隐藏搜索结果 */
	    $(document).on('click',function(e){
	       	var e = e || event,
	       		target = $(e.target);
	       	if(target.attr('id') !== 'search_input_duibu' && target.parents('#search_ul_duibi').length === 0)
	            search_ul_duibi.empty();
	    });

	    /* 选择搜索结果 */
	    var setSearchNamed2 = function(name, id) {
	    	var li = '<li><i class="icon close" data-id="'+id+'" title="取消比较">×</i><label>'+name+'</label></li>',have = false;
			if(compare_records_id.find('li').length >= 4) {
				layer.alert('最多选中四个楼盘比对！', {icon: 5});
				return false;
			}
			house_diff.each(function() {
				if(this.dataset.name === name) {
					if(this.checked)
						have = true;
					else
						this.checked = true;
					return false;
				}
			});
			$('#search_ul_duibi').hide();
			$('#search_input_duibu').val(name);
			if(!have)
			compare_records_id.append(li);
			search_ul_duibi.empty();
	    }
	    window.setSearchNamed2 = setSearchNamed2;
	    /* 删除对比选项 */
	    compare_records_id.on('click', 'li .close', function() {
	    	var id = this.dataset.id;
	    	house_diff.each(function() {
				if(this.dataset.id == id) {
					this.checked = false;
					return false;
				}
			});
	    	$(this).parent().remove();
	    });

	    /* 全部清空选项 */
	    clear_all.on('click', function() {
	    	var item = compare_records_id.find('li');
	    	if(item.length === 0) {
	    		return false;
	    	}
	    	house_diff.each(function() {
	    		if(this.checked)
	    			this.checked = false;
	    	});
	    	compare_records_id.empty();
	    });

	    /* 开始对比 */
	    compare_btn_id.on('click', function(e) {
	    	var e = e || event,
	    		item = compare_records_id.find('li'),
	    		arr = [];
	    	if(item.length < 1) {
	    		e.preventDefault();
	    		layer.alert('请选择对比楼盘', {icon: 5});
	    		return false;
	    	}
	    	for(var i = 0; i < item.length; i++) {
	    		arr.push(item.eq(i).find('i').data('id'));
	    	}
	    	compare_btn_id.attr('href', compateUrl + arr.join('_')+'.html');
	    });

	    /* 详细页对比 */
	    around_btn.on('click', function(e) {
	    	var e = e || event,
	    		arr = [];
	    	around_item.each(function() {
	    		if(this.checked)
	    			arr.push(this.value);
	    	});
	    	if(arr.length === 0) {
	    		e.preventDefault();	    		
	    		layer.alert('最多选中四个楼盘比对！', {icon: 5});
	    		return false;
	    	}
	    	arr.push(this.dataset.id);
	    	around_btn.attr('href', compateUrl + arr.join('_')+'.html');
	    });
    });
});