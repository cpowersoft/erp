<?php /* Smarty version 2.6.14, created on 2015-08-11 15:32:14
         compiled from system/express.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script type="text/javascript" src="js/normalgrid.js"></script>
<script type="text/javascript" src="js/system/express.js"></script>
<style type="text/css">
<style type="text/css">

.x-grid-cell.user-offline
{
color: #00F00F;
} 
</style>
    <script type="text/javascript">
Ext.onReady(function() {
	Ext.QuickTips.init();
	var shipping = [<?php echo $this->_tpl_vars['shipping']; ?>
];
	var express_rule = [<?php echo $this->_tpl_vars['express_rule']; ?>
];
	var depot = [<?php echo $this->_tpl_vars['depot']; ?>
];
	var country = [<?php echo $this->_tpl_vars['country']; ?>
];
	var area = [<?php echo $this->_tpl_vars['area']; ?>
];
	var allaccount = [<?php echo $this->_tpl_vars['allaccount']; ?>
];
	var Sales_channels = [<?php echo $this->_tpl_vars['Sales_channels']; ?>
];
	var currency = [<?php echo $this->_tpl_vars['currency']; ?>
];
	var allaccountarr = object_Array(allaccount);
	var currencyarr = object_Array(currency);
	var areaarr = object_Array(area);
	var shippingarr = object_Array(shipping);
	var express_rulearr = object_Array(express_rule);
	function allaccount_ren(val){
		return allaccountarr[val];
	}
	function currency_ren(val){
		return currencyarr[val];
	}
	function area_ren(val){
		return areaarr[val];
	}
	function shipping_ren(val){
		return shippingarr[val];
	}
	function rule_ren(val){
		return express_rulearr[val];
	}
    var ExpressRuleGrid = Ext.create('Ext.ux.ExpressRuleGrid',{
		id:'ExpressRuleGrid',
        title: '快递规则列表',
		headers:['序号','规则','规则','值','快递方式','先后排序','启用/停用'],
        fields: ['id','rule_id','rule','value','express_id','order_by','is_action'],
		renderers:[shipping_ren,rule_ren,area_ren,currency_ren,allaccount_ren],
		arrdata:[shipping,express_rule,allaccount,Sales_channels,currency],
		country:country,
		area:area,
		height:420,
		saveURL:'index.php?model=express&action=Update',
		delURL:'index.php?model=express&action=delete',
		listURL:'index.php?model=express&action=List',
		windowTitle:'快递规则',
		windowWidth:850,
		windowHeight:480,
        renderTo: document.body
    });
    var ExpressDepotGrid = Ext.create('Ext.ux.ExpressDepotGrid',{
		id:'ExpressDepotGrid',
        title: '仓库分配',
		headers:['序号','快递方式','发货仓库'],
        fields: ['id','shipping_id','depot','depot_id'],
		renderers:shipping_ren,
		arrdata:shipping,
		depot:depot, 
		width:800,
		height:420,
		saveURL:'index.php?model=express&action=depotUpdate',
		delURL:'index.php?model=express&action=depotdelete',
		listURL:'index.php?model=express&action=depotList',
		windowTitle:'快递分配仓库',
		windowWidth:350,
		windowHeight:180,
        renderTo: document.body
    });
    var ExpressCostGrid = Ext.create('Ext.ux.ExpressCostGrid',{
		id:'ExpressCostGrid',
        title: '运费计算公式,参数:{weight},重量为G',
		headers:['序号','快递方式','计算公式'],
        fields: ['id','express_id','value'],
		renderers:shipping_ren,
		arrdata:shipping, 
		width:800,
		height:420,
		saveURL:'index.php?model=express&action=CostUpdate',
		delURL:'index.php?model=express&action=Costdelete',
		listURL:'index.php?model=express&action=CostList',
		windowTitle:'运费规则',
		windowWidth:550,
		windowHeight:180,
        renderTo: document.body
    });
    var ExpressMarkGrid = Ext.create('Ext.ux.ExpressMarkGrid',{
		id:'ExpressMarkGrid',
        title: 'Ebay标记对应名称',
		headers:['序号','快递方式','Ebay Carrier Name','标记名','标记查询链接'],
        fields: ['id','express_id','value','name','url'],
		renderers:shipping_ren,
		arrdata:shipping,
		width:800,
		height:450,
		saveURL:'index.php?model=express&action=MarkUpdate',
		delURL:'index.php?model=express&action=Markdelete',
		listURL:'index.php?model=express&action=MarkList',
		windowTitle:'订单标记规则',
		windowWidth:350,
		windowHeight:250,
        renderTo: document.body
    });
   var UnMarkGrid = Ext.create('Ext.ux.UnMarkGrid',{
		id:'UnMarkGrid',
        title: '为获取单号标记发货',
		headers:['序号','快递方式'],
        fields: ['id','express_id'],
		renderers:shipping_ren,
		arrdata:shipping,
		width:800,
		height:420,
		saveURL:'index.php?model=express&action=UnMarkUpdate',
		delURL:'index.php?model=express&action=UnMarkdelete',
		listURL:'index.php?model=express&action=UnMarkList',
		windowTitle:'快递规则',
		windowWidth:350,
		windowHeight:180,
        renderTo: document.body
    });
    var NtMarkGrid = Ext.create('Ext.ux.NtMarkGrid',{
		id:'NtMarkGrid',
        title: '必须有追踪号标记发货',
		headers:['序号','快递方式'],
        fields: ['id','express_id'],
		renderers:shipping_ren,
		arrdata:shipping, 
		width:800,
		height:420,
		saveURL:'index.php?model=express&action=NtMarkUpdate',
		delURL:'index.php?model=express&action=NtMarkdelete',
		listURL:'index.php?model=express&action=NtMarkList',
		windowTitle:'快递规则',
		windowWidth:350,
		windowHeight:180,
        renderTo: document.body
    });
    var ExpressAreaGrid = Ext.create('Ext.ux.ExpressAreaGrid',{
		id:'ExpressAreaGrid',
        title: '快递区域设置',
		headers:['序号','快递方式'],
        fields: ['id','area','content'],
		width:800,
		height:420,
		saveURL:'index.php?model=express&action=areaUpdate',
		delURL:'index.php?model=express&action=areadelete',
		listURL:'index.php?model=express&action=areaList',
		windowTitle:'快递区域',
		windowWidth:350,
		windowHeight:240,
        renderTo: document.body
    });
	loadend();
});
    </script>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>