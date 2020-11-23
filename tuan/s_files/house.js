$.divselect("#f1s", "#f1v");
	$.divselect("#f2s", "#f2v");
	$.divselect("#f3s", "#anjie");
	$.divselect("#f4s", "#loanradiotype");
	$.divselect("#f5s", "#years");
	function exc_js(fmobj, v) {
	    if(fmobj.name == "calc11") {
	        if(v == 1) {
	            document.getElementById("calc1_js_div1").style.display = '';
	            document.getElementById("calc1_js_div2").style.display = 'none';
	        } else {
	            document.getElementById("calc1_js_div1").style.display = 'none';
	            document.getElementById("calc1_js_div2").style.display = '';
	        }
	    }
	}
	function loanreset(fmobj) {
	    var loanradiotype = document.getElementsByName("loanradiotype");
	    var strloanradiotype;
	    for(var i = 0; i < loanradiotype.length; i++) {
	        if(loanradiotype.item(i).checked) {
	            strloanradiotype = loanradiotype.item(i).getAttribute("value");
	            break;
	        } else {
	            continue;
	        }
	    }
	    fmobj.reset();
	    exc_zuhe(fmobj, strloanradiotype);
	}
	function ext_loantotal(fmobj) {
	    var loanradiotype = document.getElementsByName("loanradiotype"); //取房贷计算
	    var price = parseInt(document.getElementById("price").value.toString()); //取房贷计算器单价
	    var sqm = parseInt(document.getElementById("sqm").value.toString()); //面积
	    var anjie = document.getElementById("anjie").value.toString(); //按揭成数
	    var daikuan = parseInt(document.getElementById("daikuan").value.toString()); //贷款总数
	    var years = document.getElementById("years").value.toString(); //按揭年数
	    //var lilv = document.getElementById("lilv").value.toString(); //利率
	    var radioben = document.getElementsByName("radioben"); //本金或者本息 1为本息，2为本金
	    var strradioben;
	    var loanTyep;
	    strRadiox = loanradiotype.item(0).getAttribute("value");
	    loanTyep = loanradiotype;
	    strradioben = $('#radioben').val();
	    //      while ((k = fmobj.month_money2.length - 1) >= 0) {
	    //          fmobj.month_money2.options.remove(k);
	    //      }
	    //月还款
	    var lilv_sd = fmobj.sdlv.value; //得到商贷利率
	    var lilv_gjj = fmobj.gjlv.value; //得到公积金利率
	    //由于真正的利率为 singlelv 这个,所以要判断商贷还是公积金来把上面的值赋予 singlelv 
	    if(strRadiox == 1) {
	        fmobj.singlelv.value = lilv_sd;
	    } else {
	        fmobj.singlelv.value = lilv_gjj;
	    }
	    var month = years * 12;
	    fmobj.month1.value = month + "(月)";
	    fmobj.month2.value = month + "(月)";
	    if(strRadiox == 3) { //判断是房贷计算 组合型
	        //--  组合型贷款(组合型贷款的计算，只和商业贷款额、和公积金贷款额有关，和按贷款总额计算无关)
	        if(!reg_Num(fmobj.zuhesy.value)) {
	            alert("混合型贷款请填写商贷比例");
	            fmobj.zuhesy.focus();
	            return false;
	        }
	        if(!reg_Num(fmobj.zuhegjj.value)) {
	            alert("混合型贷款请填写公积金比例");
	            fmobj.zuhegjj.focus();
	            return false;
	        }
	        if(fmobj.zuhesy.value == null) {
	            fmobj.zuhesy.value = 0;
	        }
	        if(fmobj.zuhegjj.value == null) {
	            fmobj.zuhegjj.value = 0;
	        }
	        var total_sy = fmobj.zuhesy.value;
	        var total_gjj = fmobj.zuhegjj.value;
	        fmobj.fangkuan_total1.value = "略"; //房款总额
	        fmobj.fangkuan_total2.value = "略"; //房款总额
	        fmobj.money_first1.value = 0; //首期付款
	        fmobj.money_first2.value = 0; //首期付款
	        //贷款总额
	        var total_sy = parseInt(fmobj.zuhesy.value);
	        var total_gjj = parseInt(fmobj.zuhegjj.value);
	        var daikuan_total = total_sy + total_gjj;
	        fmobj.daikuan_total1.value = daikuan_total;
	        fmobj.daikuan_total2.value = daikuan_total;
	        //月还款
	        var lilv_sd = fmobj.sdlv.value / 100; //得到商贷利率
	        var lilv_gjj = fmobj.gjlv.value / 100; //得到公积金利率
	        //由于真正的利率为 singlelv 这个,所以要判断商贷还是公积金来把上面的值赋予 singlelv 
	        if(loanradiotype == 1) {
	            fmobj.singlelv.value = lilv_sd;
	        } else {
	            fmobj.singlelv.value = lilv_gjj;
	        }
	        console(111)
	        console.log(loanradiotype);
	        console.log(fmobj.singlelv.value);
	        var all_total2 = 0;
	        var month_money2 = "";
	        for(j = 0; j < month; j++) {
	            //调用函数计算: 本金月还款额
	            huankuan = getMonthMoney2(lilv_sd, total_sy, month, j) + getMonthMoney2(lilv_gjj, total_gjj, month, j);
	            all_total2 += huankuan;
	            huankuan = Math.round(huankuan * 100) / 100;
	            //fmobj.month_money2.options[j] = new Option( (j+1) +"月," + huankuan + "(元)", huankuan);
	            month_money2 += (j + 1) + "月," + huankuan + "(元)\n";
	        }
	        fmobj.month_money2.value = month_money2;
	        //还款总额
	        fmobj.all_total2.value = Math.round(all_total2 * 100) / 100;
	        //支付利息款
	        fmobj.accrual2.value = Math.round((all_total2 - daikuan_total) * 100) / 100;
	        //2.本息还款
	        //月均还款
	        var month_money1 = getMonthMoney1(lilv_sd, total_sy, month) + getMonthMoney1(lilv_gjj, total_gjj, month); //调用函数计算
	        fmobj.month_money1.value = Math.round(month_money1 * 100) / 100 + "(元)";
	        //还款总额
	        var all_total1 = month_money1 * month;
	        fmobj.all_total1.value = Math.round(all_total1 * 100) / 100;
	        //支付利息款
	        fmobj.accrual1.value = Math.round((all_total1 - daikuan_total) * 100) / 100;
	    } else {
	        //--  商业贷款、公积金贷款
	        var lilv = fmobj.singlelv.value / 100; //得到利率
	        //          alert(fmobj.singlelv.value);
	        //------------ 根据贷款总额计算
	        var daikuan_total = Math.round((1 - $('#anjie').val() / 10) * $('#cite0').val());
	        //          console.log($('#cite0').val()/10);
	        var shoufu_total = Math.round(($('#anjie').val() / 10) * ($('#cite0').val()));
	        $('#shoufu').html(shoufu_total);
	        $('#daikuan').val(daikuan_total);
	        //          alert(shoufu_total);
	        if(fmobj.daikuan_total000.value.length == 0) {
	            alert("请填写贷款总额");
	            fmobj.daikuan_total000.focus();
	            return false;
	        }
	        //房款总额
	        fmobj.fangkuan_total1.value = "略";
	        fmobj.fangkuan_total2.value = "略";
	        //贷款总额
	        var daikuan_total = fmobj.daikuan_total000.value;
	        fmobj.daikuan_total1.value = daikuan_total;
	        $('#daikuan_total1s').html('贷款总额：' + daikuan_total);
	        fmobj.daikuan_total2.value = daikuan_total;
	        //首期付款
	        fmobj.money_first1.value = 0;
	        fmobj.money_first2.value = 0;
	        //1.本金还款
	        //月还款
	        var all_total2 = 0;
	        var month_money2 = "";
	        for(j = 0; j < month; j++) {
	            //调用函数计算: 本金月还款额
	            huankuan = getMonthMoney2(lilv, daikuan_total, month, j);
	            all_total2 += huankuan;
	            huankuan = Math.round(huankuan * 100) / 100;
	            //fmobj.month_money2.options[j] = new Option( (j+1) +"月," + huankuan + "(元)", huankuan);
	            month_money2 += (j + 1) + "月," + huankuan + "(元)\n";
	        }
	        fmobj.month_money2.value = month_money2;
	        //还款总额
	        fmobj.all_total2.value = Math.round(all_total2 * 100) / 100;
	        //支付利息款
	        fmobj.accrual2.value = Math.round((all_total2 - daikuan_total) * 100) / 100;
	        //$('#accrual2s').html('支付利息款：'+ fmobj.accrual2.value);
	        //console.log(fmobj.accrual2.value);
	        //2.本息还款
	        //月均还款
	        var month_money1 = getMonthMoney1(lilv, daikuan_total, month); //调用函数计算
	        $('#month_money1s').html(Math.round(month_money1 * 100) / 100 + "(元)");
	        fmobj.month_money1.value = Math.round(month_money1 * 100) / 100 + "(元)";
	        //还款总额
	        var all_total1 = month_money1 * month;
	        $('.all_total1').val(Math.round(all_total1 * 100) / 100);
	        //          fmobj.all_total1.value = ;
	        //支付利息款
	        fmobj.accrual1.value = Math.round((all_total1 - daikuan_total) * 100) / 100;
	        //$('#accrual2s').html('支付利息款：'+ fmobj.accrual1.value);
	        //console.log(fmobj.accrual1.value);
	        //console.log(Math.round(all_total1 * 100) / 100);
	    }
	    if(strradioben == 2) {
	        fmobj.fangkuan_total1.value = fmobj.fangkuan_total2.value;
	        fmobj.daikuan_total1.value = fmobj.daikuan_total2.value;
	        $('#daikuan_total1').html('贷款总额：'.daikuan_total);
	        fmobj.all_total1.value = fmobj.all_total2.value;
	        fmobj.accrual1.value = fmobj.accrual2.value;
	        fmobj.money_first1.value = fmobj.money_first2.value;
	        fmobj.month1.value = fmobj.month2.value;
	        fmobj.month_money3.value = fmobj.month_money2.value;
	    }
	    //这里才是真正的显示支付利息总数的!!!
	    $('#accrual2s').html('支付利息款：' + fmobj.accrual1.value);
	    //布码:代码执行时机改为点击“开始计算”成功返回计算结果后
	    var loanType, loanMonthMoney;
	    if(strRadiox == 1) {
	        loanType = "商业贷款";
	    } else if(strRadiox == 2) {
	        loanType = "公积金贷款";
	    } else {
	        loanType = "组合型贷款";
	    }
	    loanMonthMoney = fmobj.month_money1.value.replace("(元)", "");
	    var mmlilv_sd = fmobj.sdlv.value / 100; //得到商贷利率
	    var mmlilv_gjj = fmobj.gjlv.value / 100; //得到公积金利率
	    _ub.city = '海南'; //所在城市（中文）
	    _ub.biz = 'j'; //固定
	    _ub.location = 0; //方位 ，网通为0，电信为1，如果无法获取方位，记录0
	    if(strRadiox == 1) {
	        if(strradioben == 1) {
	            //本金还款
	            _ub.collect(146, {
	                'vwg.page': 'jrcalculatordk',
	                'vwj.unitprice': encodeURIComponent(document.getElementById("price").value.toString()),
	                'vwj.area': encodeURIComponent(document.getElementById("sqm").value.toString()),
	                'vwj.loanradio': encodeURIComponent(document.getElementById("anjie").value.toString()),
	                'vwj.loantime': encodeURIComponent($("#years").val().toString()),
	                'vwj.annualinterestrate': encodeURIComponent(document.getElementById("singlelv").value.toString()),
	                'vwj.repaymentmethod': encodeURIComponent('等额本息'),
	                'vwj.totalprice': encodeURIComponent(parseFloat(document.getElementById('fangkuan_total1').value) / 10000),
	                'vwj.loanamount': encodeURIComponent(fmobj.daikuan_total2.value.toString() + '元'),
	                'vwj.repaymentamount': encodeURIComponent(fmobj.all_total1.value.toString() + '元'),
	                'vwj.paymentinterest': encodeURIComponent(fmobj.accrual1.value.toString() + '元'),
	                'vwj.downpayment': encodeURIComponent(fmobj.money_first2.value.toString() + '元'),
	                'vwj.loantime': encodeURIComponent(fmobj.month2.value.toString()),
	                'vwj.monthlyrepayment': encodeURIComponent(loanMonthMoney)
	            });
	        } else if(strradioben == 2) {
	            //本息还款
	            _ub.collect(146, {
	                'vwg.page': 'jrcalculatordk',
	                'vwj.unitprice': encodeURIComponent(document.getElementById("price").value.toString()),
	                'vwj.area': encodeURIComponent(document.getElementById("sqm").value.toString()),
	                'vwj.loanradio': encodeURIComponent(document.getElementById("anjie").value.toString()),
	                'vwj.loantime': encodeURIComponent($("#years").val().toString()),
	                'vwj.annualinterestrate': encodeURIComponent(document.getElementById("singlelv").value.toString()),
	                'vwj.repaymentmethod': encodeURIComponent('等额本金'),
	                'vwj.totalprice': encodeURIComponent(parseFloat(document.getElementById('fangkuan_total1').value) / 10000),
	                'vwj.loanamount': encodeURIComponent(fmobj.daikuan_total1.value.toString() + '元'),
	                'vwj.repaymentamount': encodeURIComponent(fmobj.all_total1.value.toString() + '元'),
	                'vwj.paymentinterest': encodeURIComponent(fmobj.accrual1.value.toString() + '元'),
	                'vwj.downpayment': encodeURIComponent(fmobj.money_first1.value.toString() + '元'),
	                'vwj.loantime': encodeURIComponent(fmobj.month1.value.toString()),
	                'vwj.monthlyrepayment': encodeURIComponent(loanMonthMoney)
	            });
	        }
	    }
	    if(strRadiox == 2) {
	        if(strradioben == 1) {
	            //本金还款
	            _ub.collect(147, {
	                'vwg.page': 'jrcalculatordk',
	                'vwj.unitprice': encodeURIComponent(document.getElementById("price").value.toString()),
	                'vwj.area': encodeURIComponent(document.getElementById("sqm").value.toString()),
	                'vwj.loanradio': encodeURIComponent(document.getElementById("anjie").value.toString()),
	                'vwj.loantime': encodeURIComponent($("#years").val().toString()),
	                'vwj.annualinterestrate': encodeURIComponent(document.getElementById("singlelv").value.toString()),
	                'vwj.repaymentmethod': encodeURIComponent('等额本息'),
	                'vwj.totalprice': encodeURIComponent(parseFloat(document.getElementById('fangkuan_total1').value) / 10000),
	                'vwj.loanamount': encodeURIComponent(fmobj.daikuan_total2.value.toString() + '元'),
	                'vwj.repaymentamount': encodeURIComponent(fmobj.all_total1.value.toString() + '元'),
	                'vwj.paymentinterest': encodeURIComponent(fmobj.accrual1.value.toString() + '元'),
	                'vwj.downpayment': encodeURIComponent(fmobj.money_first2.value.toString() + '元'),
	                'vwj.loantime': encodeURIComponent(fmobj.month2.value.toString()),
	                'vwj.monthlyrepayment': encodeURIComponent(loanMonthMoney)
	            });
	        } else if(strradioben == 2) {
	            //本息还款
	            _ub.collect(147, {
	                'vwg.page': 'jrcalculatordk',
	                'vwj.unitprice': encodeURIComponent(document.getElementById("price").value.toString()),
	                'vwj.area': encodeURIComponent(document.getElementById("sqm").value.toString()),
	                'vwj.loanradio': encodeURIComponent(document.getElementById("anjie").value.toString()),
	                'vwj.loantime': encodeURIComponent($("#years").val().toString()),
	                'vwj.annualinterestrate': encodeURIComponent(mmlilv_sd + ',' + mmlilv_gjj),
	                'vwj.repaymentmethod': encodeURIComponent('等额本金'),
	                'vwj.totalprice': encodeURIComponent(parseFloat(document.getElementById('fangkuan_total1').value) / 10000),
	                'vwj.loanamount': encodeURIComponent(fmobj.daikuan_total1.value.toString() + '元'),
	                'vwj.repaymentamount': encodeURIComponent(fmobj.all_total1.value.toString() + '元'),
	                'vwj.paymentinterest': encodeURIComponent(fmobj.accrual1.value.toString() + '元'),
	                'vwj.downpayment': encodeURIComponent(fmobj.money_first1.value.toString() + '元'),
	                'vwj.loantime': encodeURIComponent(fmobj.month1.value.toString()),
	                'vwj.monthlyrepayment': encodeURIComponent(loanMonthMoney)
	            });
	        }
	    }
	    if(strRadiox == 3) {
	        if(strradioben == 1) {
	            //本金还款
	            _ub.collect(148, {
	                'vwg.page': 'jrcalculatordk',
	                'vwj.unitprice': encodeURIComponent(document.getElementById("price").value.toString()),
	                'vwj.area': encodeURIComponent(document.getElementById("sqm").value.toString()),
	                'vwj.loanradio': encodeURIComponent(document.getElementById("anjie").value.toString()),
	                'vwj.loantime': encodeURIComponent($("#years").val().toString()),
	                'vwj.annualinterestrate': encodeURIComponent(document.getElementById("singlelv").value.toString()),
	                'vwj.repaymentmethod': encodeURIComponent('等额本息'),
	                'vwj.totalprice': encodeURIComponent(parseFloat(document.getElementById('fangkuan_total1').value) / 10000),
	                'vwj.loanamount': encodeURIComponent(fmobj.daikuan_total2.value.toString() + '元'),
	                'vwj.repaymentamount': encodeURIComponent(fmobj.all_total1.value.toString() + '元'),
	                'vwj.paymentinterest': encodeURIComponent(fmobj.accrual1.value.toString() + '元'),
	                'vwj.downpayment': encodeURIComponent(fmobj.money_first2.value.toString() + '元'),
	                'vwj.loantime': encodeURIComponent(fmobj.month2.value.toString()),
	                'vwj.monthlyrepayment': encodeURIComponent(loanMonthMoney),
	                'vwj.loanamount': encodeURIComponent(fmobj.zuhesy.value + ',' + fmobj.zuhegjj.value)
	            });
	        } else if(strradioben == 2) {
	            //本息还款
	            _ub.collect(148, {
	                'vwg.page': 'jrcalculatordk',
	                'vwj.unitprice': encodeURIComponent(document.getElementById("price").value.toString()),
	                'vwj.area': encodeURIComponent(document.getElementById("sqm").value.toString()),
	                'vwj.loanradio': encodeURIComponent(document.getElementById("anjie").value.toString()),
	                'vwj.loantime': encodeURIComponent($("#years").val().toString()),
	                'vwj.annualinterestrate': encodeURIComponent(document.getElementById("singlelv").value.toString()),
	                'vwj.repaymentmethod': encodeURIComponent('等额本金'),
	                'vwj.totalprice': encodeURIComponent(parseFloat(document.getElementById('fangkuan_total1').value) / 10000),
	                'vwj.loanamount': encodeURIComponent(fmobj.daikuan_total1.value.toString() + '元'),
	                'vwj.repaymentamount': encodeURIComponent(fmobj.all_total1.value.toString() + '元'),
	                'vwj.paymentinterest': encodeURIComponent(fmobj.accrual1.value.toString() + '元'),
	                'vwj.downpayment': encodeURIComponent(fmobj.money_first1.value.toString() + '元'),
	                'vwj.loantime': encodeURIComponent(fmobj.month1.value.toString()),
	                'vwj.monthlyrepayment': encodeURIComponent(loanMonthMoney),
	                'vwj.loanamount': encodeURIComponent(fmobj.zuhesy.value + ',' + fmobj.zuhegjj.value)
	            });
	        }
	    }
	    //扇形图的显示
	    $('#main-baidu').remove();
	    $('#bb-baidu').html('<div id="main-baidu" style="height:400px;"></div>');
	    $('#bb-baidu').attr("style", "");
	    $('#bb-baidu').css({
	        'display': 'block'
	    });
	    var myChart;
	    myChart = echarts.init(document.getElementById('main-baidu'));
	    var option = {
	        tooltip: {
	            trigger: 'item',
	            formatter: "{a} <br/>{b} : {c} ({d}%)"
	        },
	        series: [{
	            name: '贷款明细 (万元)',
	            type: 'pie',
	            radius: '40%',
	            center: ['30%', '60%'],
	            data: [{
	                    value: shoufu_total,
	                    name: '首付'
	                }, //这里!! 数据!!
	                {
	                    value: daikuan_total,
	                    name: '贷款'
	                }, {
	                    value: (fmobj.accrual1.value),
	                    name: '利息'
	                },
	            ],
	            visualMap: {
	                show: false,
	                min: 80,
	                max: 600,
	                inRange: {
	                    colorLightness: [0, 1]
	                }
	            },
	            color: ['#f7e7e6', '#e2eff7', '#fcf8e2', '#d48265'],
	            itemStyle: {
	                emphasis: {
	                    shadowBlur: 20,
	                    shadowOffsetX: 0,
	                    shadowColor: 'rgba(0, 0, 0, 0.5)'
	                },
	                normal: {
	                    label: {
	                        show: false
	                    },
	                    labelLine: {
	                        show: false
	                    }
	                }
	            }
	        }]
	    };
	    myChart.setOption(option);
	    $(function() {
	        $('#bb-baidu').css({
	            'position': 'absolute',
	            'top': '-25%',
	            'left': ' 46%',
	            'background': 'url("http://static1.ljcdn.com/pc/asset/img/xinfang/detail/pie-bg.png") 17% 67% / 205px 169px no-repeat'
	        });
	    })
	}
	function ext_loanbenjin(fmobj, v) {
	    if(fmobj.name == "calc11") {
	        if(v == 2) {
	            document.getElementById("benxi").style.display = 'none';
	            document.getElementById("benjin").style.display = '';
	        } else {
	            document.getElementById("benxi").style.display = '';
	            document.getElementById("benjin").style.display = 'none';
	        }
	    }
	}
	//验证是否为数字
	function reg_Num(str) {
	    if(str.length == 0) {
	        return false;
	    }
	    var Letters = "1234567890.";
	    for(i = 0; i < str.length; i++) {
	        var CheckChar = str.charAt(i);
	        if(Letters.indexOf(CheckChar) == -1) {
	            return false;
	        }
	    }
	    return true;
	}
	//得到利率
	function getlilv(lilv_class, type, years) {
	    var lilv_class = parseInt(lilv_class);
	    if(years <= 5) {
	        return lilv_array[lilv_class][type][5];
	    } else {
	        return lilv_array[lilv_class][type][10];
	    }
	}
	//本金还款的月还款额(参数: 年利率 / 贷款总额 / 贷款总月份 / 贷款当前月0～length-1)
	function getMonthMoney2(lilv, total, month, cur_month) {
	    var lilv_month = lilv / 12; //月利率
	    //return total * lilv_month * Math.pow(1 + lilv_month, month) / ( Math.pow(1 + lilv_month, month) -1 );
	    var benjin_money = total / month;
	    return(total - benjin_money * cur_month) * lilv_month + benjin_money;
	}
	//本息还款的月还款额(参数: 年利率/贷款总额/贷款总月份)
	function getMonthMoney1(lilv, total, month) {
	    var lilv_month = lilv / 12; //月利率
	    return total * lilv_month * Math.pow(1 + lilv_month, month) / (Math.pow(1 + lilv_month, month) - 1);
	}
	function calc11(fmobj, month, lt) {
	    var loanradiostr = document.getElementsByName("loanradiotype");
	    var loanradiotype = $('#loanradiotype').val();
	    var indexNumSd = getArrayIndexFromYear(month, 1); // 商贷
	    var indexNumGj = getArrayIndexFromYear(month, 2); // 公积金
	    if(loanradiotype == 1) {
	        $('#singlelv').val(myround(lilv_array[lt][1][indexNumSd] * 100, 2));
	    } else if(loanradiotype == 2) {
	        $('#singlelv').val(myround(lilv_array[lt][2][indexNumGj] * 100, 2));
	    } else {
	        $('#singlelv').val(myround(lilv_array[lt][2][indexNumGj] * 100, 2));
	    }
	    $('#sdlv').val(myround(lilv_array[lt][1][indexNumSd] * 100, 2));
	    $('#gjlv').val(myround(lilv_array[lt][2][indexNumGj] * 100, 2));
	}
	function myround(v, e) {
	    var t = 1;
	    e = Math.round(e);
	    for(; e > 0; t *= 10, e--);
	    for(; e < 0; t /= 10, e++);
	    return Math.round(v * t) / t;
	}
	function getArrayIndexFromYear(year, dkType) {
	    var indexNum = 0;
	    if(dkType == 1) {
	        if(year == 1) {
	            indexNum = 1;
	        } else if(year > 1 && year <= 3) {
	            indexNum = 3;
	        } else if(year > 3 && year <= 5) {
	            indexNum = 5;
	        } else {
	            indexNum = 10;
	        }
	    } else if(dkType == 2) {
	        if(year > 5) {
	            indexNum = 10;
	        } else {
	            indexNum = 5;
	        }
	    }
	    return indexNum;
	}
	function displaySubMenu(li) {
	    var subMenu = li.getElementsByTagName("ul")[0];
	    subMenu.style.display = "block";
	}
	function hideSubMenu(li) {
	    var subMenu = li.getElementsByTagName("ul")[0];
	    subMenu.style.display = "none";
	}
	function toggleCity() {
	    $("#citydiv").toggle();
	}
	function getMonthMoney2(lilv, total, month, cur_month) {
	    var lilv_month = lilv / 12; //月利率
	    //return total * lilv_month * Math.pow(1 + lilv_month, month) / ( Math.pow(1 + lilv_month, month) -1 );
	    var benjin_money = total / month;
	    return(total - benjin_money * cur_month) * lilv_month + benjin_money;
	}
	//本息还款的月还款额(参数: 年利率/贷款总额/贷款总月份)
	function getMonthMoney1(lilv, total, month) {
	    var lilv_month = lilv / 12; //月利率
	    return total * lilv_month * Math.pow(1 + lilv_month, month) / (Math.pow(1 + lilv_month, month) - 1);
	}
//沙盘
    var $shapanIA = $("#shapan-i a")
    , $hxInfoDl   = $("#hx-info dl")
    , hxBack      = $("#hxback");

    $('#shapan-i').jqDrag({ attachment: '#shapan'})

    .find('.sha-dot').each(function() {
        var aShapan = $(this).attr('data-shapan').split(',');
        $(this).css({left:parseInt(aShapan[0]),top:parseInt(aShapan[1])})
    })

    $shapanIA.click(function(e) {
        $(this).toggleClass('act').siblings().removeClass('act')
        $hxInfoDl.eq($shapanIA.index(this)).toggleClass('act').show().siblings().hide().removeClass('act');
        hxBack.show();
        e.stopPropagation();
    })

    $hxInfoDl.click(function(e) {
        $(this).toggleClass('act').show().siblings().hide().removeClass('act')
        $shapanIA.eq($hxInfoDl.index(this)).toggleClass('act').siblings().removeClass('act');
        hxBack.show();
        e.stopPropagation();
    }).find('dd').click(function(e) {
        e.stopPropagation();
    });

    $(document).on('click', function () {
        $shapanIA.removeClass('act');
        $hxInfoDl.removeClass('act').show();
        hxBack.hide();
    });
    $(document).on('click','.closesaoma',function(){
        $('#saoma').hide();
    });
    $(".open_sq").on('click', function () {
        $('#LRMINIWIN').css('display','block');
    });
    function lrminiMin(){
    	$('#LRMINIWIN').css('display','none');
    }
 	function refreshVerify() {
        var ts = Date.parse(new Date())/1000;
        var img = document.getElementById('verify_img');
        img.src = "/captcha?id="+ts;
    }