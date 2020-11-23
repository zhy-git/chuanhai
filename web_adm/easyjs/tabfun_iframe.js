	function addTab2(subtitle,url){
		//alert (url);
		if(!parent.$('#tt').tabs('exists',subtitle)){
			parent.$('#tt').tabs('add',{
				title:subtitle,
				content:createFrame(url),
				closable:true
				//tools: [{
//                                            iconCls: 'icon-reload',
//                                            handler: function() {
//                                               // parent.$('#tt').tabs("select", $(this).parent().parent().first().first().text());
//                                                var tab = parent.$('#tt').tabs('getSelected'); // get selected panel
//                                                 parent.$('#tt').tabs('update', {
//                                                    tab: tab,
//                                                    options: {
//                                                       // title: node.text,
//                                                        href:alert(url)//encodeURI(url)  // the new content URL
//                                                    }
//                                                });
//                                            }
//                                        }]
			});
		}else{
			parent.$('#tt').tabs('select',subtitle);
		}
		//tabClose();
	}
	
	function createFrame(url)
	{
		var s = '<iframe name="mainFrame" id="mainFrame" scrolling="auto" frameborder="0"  src="'+url+'" overflow:scroll" style="width:100%;height:100%;"></iframe>';
		return s;
	}
	
	function onktab(tabTitle,url){
			addTab2(tabTitle,url);
			parent.$('.easyui-accordion li div').removeClass("selected");
			parent.$(this).parent().addClass("selected");
		}
	