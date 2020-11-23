$(function(){
	$('.easyui-tree a').click(function(){
			var tabTitle = $(this).text();
			var url = $(this).attr("cc");
			addTab(tabTitle,url);
			$('.easyui-accordion li div').removeClass("selected");
			$(this).parent().addClass("selected");
		}).hover(function(){
			$(this).parent().addClass("hover");
		},function(){
			$(this).parent().removeClass("hover");
		});
	
	$('.systemweb a').click(function(){
			var tabTitle = $(this).text();
			var url = $(this).attr("cc");
			addTab(tabTitle,url);
			$('.easyui-accordion li div').removeClass("selected");
			$(this).parent().addClass("selected");
		}).hover(function(){
			$(this).parent().addClass("hover");
		},function(){
			$(this).parent().removeClass("hover");
		});
	
	function addTab(subtitle,url){
		if(!$('#tt').tabs('exists',subtitle)){
			$('#tt').tabs('add',{
				title:subtitle,
				content:createFrame(url),
				cache: true,
				closable:true,
				width:$('#tt').width()-10,
				height:$('#tt').height()-26,
				tools: [{
                                            iconCls: 'icon-reload',
                                            handler: function() {
                                                //$('#tt').tabs("select", $(this).parent().parent().first().first().text());
                                                var tab = $('#tt').tabs('getSelected'); // get selected panel
                                                $('#tt').tabs('update', {
                                                    tab: tab,
                                                    options: {
                                                       // title: node.text,
                                                        //href://alert(url)//encodeURI(url)  // the new content URL
                                                    }
                                                });
                                            }
                                        }]
			});
		}else{
			$('#tt').tabs('select',subtitle);
		}
		//tabClose();
	}
	
	function createFrame(url)
	{
		var s = '<iframe name="mainFrame" id="mainFrame" scrolling="auto" frameborder="0"  src="'+url+'" overflow:scroll" style="width:100%;height:100%;"></iframe>';
		return s;
	}
	
	//ts
	$(".tree-title").hover(
		function(){
		$(this).find("s").show();
		$(this).find("s2").show();
			},
		function(){
		$(this).find("s").hide();
		$(this).find("s2").hide();
			}
		);
	$('.tree-title s').click(function(){
			alert("add");
		});
	$('.tree-title s2').click(function(){
			alert("add2");
		});
})
