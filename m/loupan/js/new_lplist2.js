$(document).ready(function(){var searchBtn=$(".search-input-wrapper"),searchIns=null;searchBtn.on("click",function(){if(searchIns==null){var searchIns=new focusjs.data.focusSearch({cityPrefix:$("body").attr("data-city-prefix"),onshow:function(){$(".public-header").hide();$("#mainContent").hide();$(".public-breadcrumb-bottom").hide();$("footer").hide()},onhide:function(){$(".public-header").show();$("#mainContent").show();$(".public-breadcrumb-bottom").show();$("footer").show()}})}else{searchIns.show();searchIns.getFocus()}});$(".condition-item").on(focusjs.event.END_EV,function(){$(".show-list").css("display","none");if($(this).hasClass("condition-active")){$("."+$(this).attr("data-show-list")).css("display","none");$(this).removeClass("condition-active")}else{if(!$("."+$(this).attr("data-show-list")).hasClass("sigle-list")){var link_item=$("."+$(this).attr("data-show-list")).find(".detail-list-label a");var m=0;for(var i=1;i<=link_item.length;i++){if($(link_item[i]).hasClass("actived-item")){m=i;break}}if(m===0){if($("."+$(this).attr("data-show-list")).hasClass("filter-box4")){$(".filter-box4 .sub-box1").show();$(this).find(".detail-list-label").find("a").eq(1).addClass("actived-item")}if($("."+$(this).attr("data-show-list")).hasClass("filter-box1")){$(".filter-box1 .sub-box6").show();$(this).find(".detail-list-label").find("a").eq(1).addClass("actived-item")}}else{$("."+$(link_item[m]).attr("data-sublist")).show()}$("."+$(this).attr("data-show-list")).css("display","-webkit-box")}else{$("."+$(this).attr("data-show-list")).css("display","block")}$(this).parent().find(".condition-item").removeClass("condition-active");$(this).addClass("condition-active")}});function clickDataSublistFn(obj){if(!obj.hasClass("actived-item")){obj.parent().find(".link-item").removeClass("actived-item");obj.addClass("actived-item")}$(".sublist").hide();$("."+obj.attr("data-sublist")).show();var detail_list_label_height=obj.height()*(obj.parent().find("a").length);var pre_height=$("."+obj.attr("data-sublist")).height();var item_height=$("."+obj.attr("data-sublist")).find("a").height();var item_account=$("."+obj.attr("data-sublist")).find("a").length;var items_height=item_height*item_account;var expect_height;if(detail_list_label_height<items_height){expect_height=items_height}else{expect_height=detail_list_label_height}obj.parent().height(expect_height);$("."+obj.attr("data-sublist")).height(expect_height)}$("*[data-sublist]").on(focusjs.event.END_EV,function(){clickDataSublistFn($(this))});$(".filter-box .sub-box6 .send-ajax").on(focusjs.event.END_EV,function(){var districtId=$(this).attr("data-districtId");if(!$(this).hasClass("actived-item")){$(".filter-box .sub-box6 .link-item").removeClass("actived-item");$(this).addClass("actived-item")}$(".sub-box6-list .sublist").hide();$(".sub-box6-list").show();$(".sub-box6-list .sub-box6-list-area"+districtId).show()})});