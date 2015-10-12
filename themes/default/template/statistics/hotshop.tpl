﻿<!--{include file="header-3.3.tpl"}-->
<script type="text/javascript" src="common/lib/flashchart-php5-ofc-library/swfobject.js"></script>
<script type="text/javascript">
Ext.onReady(function(){
    Ext.QuickTips.init();
var Nowdate=new Date();
var arr=[
	 {
		xtype:'label',
		text: '开始时间：',
		style:'font-size:12px;font-family:Arial, Helvetica, sans-serif'
	},
	{
		xtype:'datefield',
		name: 'starttime',
		format:'Y-m-d',
		editable: false,
		value:new Date(Nowdate.getYear()+1900,Nowdate.getMonth(),1),
		allowBlank:false,
		blankText:'不能为空',
		invalidText:'格式错误！'
	},
	{
		xtype:'label',
		text: '截止时间：',
		style:'font-size:12px;font-family:Arial, Helvetica, sans-serif'
	},
	{
		xtype:'datefield',
		name: 'endtime',
		format:'Y-m-d',
		editable: false,
		allowBlank:false,
		value:Nowdate,
		blankText:'不能为空',
		invalidText:'格式错误！'
	},{
		xtype:'label',
		text: '显示数量：',
		style:'font-size:12px;font-family:Arial, Helvetica, sans-serif'
	},
	{
		xtype:'numberfield',
		value:5,
		name: 'limit',
		width:40
	},
	 {
		text:'查询',
		xtype:'button',
		iconCls:'x-tbar-search',
		style:'margin-left:20px',
		pressed:true,
		handler:function(){
			var form = Ext.getCmp("queryform").getForm();
			var widths=form.findField('limit').getValue()*70+50;
			if(form.isValid()) {
				swfobject.embedSWF(
					"common/lib/flashchart-php5-ofc-library/open-flash-chart.swf", "chart",
					widths, "400", "9.0.0", "expressInstall.swf",
					{"data-file":escape("index.php?model=statistics&action=getHotShop"+'&starttime='+form.findField('starttime').getValue().format('Y-m-d')+'&endtime='+form.findField('endtime').getValue().format('Y-m-d')+'&limit='+form.findField('limit').getValue())}
				);
				console.log("index.php?model=statistics&action=getHotShop"+'&starttime='+form.findField('starttime').getValue().format('Y-m-d')+'&endtime='+form.findField('endtime').getValue().format('Y-m-d')+'&limit='+form.findField('limit').getValue());
			}
		}
	 },{
		text:'导出统计结果',
		xtype:'button',
		iconCls:'x-tbar-import',
		style:'margin-left:20px',
		pressed:true,
		handler:function(){
			var form = Ext.getCmp("queryform").getForm();
			window.open().location.href="index.php?model=statistics&action=getHotShop"+'&type=export&starttime='+form.findField('starttime').getValue().format('Y-m-d')+'&endtime='+form.findField('endtime').getValue().format('Y-m-d')+'&limit='+form.findField('limit').getValue();
			}
	 }
 ];
var form = new Ext.FormPanel({
							 id:'queryform',
							 title:'账户订单量排行',
							 layout: 'column',
							 columns:3,
							 border:false,
							 frame:true,
							 items:arr,
							 renderTo: Ext.get('query_form')
							 });


	loadend();
});
</script>
<div id="query_form"></div>
<div id="chart"></div>
<!--{include file="footer.tpl"}-->