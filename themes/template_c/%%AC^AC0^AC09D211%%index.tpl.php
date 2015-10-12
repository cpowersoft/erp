<?php /* Smarty version 2.6.14, created on 2015-08-10 10:53:25
         compiled from goods/index.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <style type="text/css">
#tab11_item .x-panel-body{
	background: white;
	font: 11px Arial, Helvetica, sans-serif;
}
#tab11_item .thumb{
	background: #dddddd;
	padding: 3px;
}
#tab11_item .thumb img{
	height: 80px;
	width: 80px;
}
#tab11_item .thumb-wrap{
	float: left;
	margin: 4px;
	margin-right: 0;
	padding: 5px;
}
#tab11_item .thumb-wrap span{
	display: block;
	overflow: hidden;
	text-align: center;
	
}

#tab11_item .x-view-over{
    border:1px solid #dddddd;
    background: #efefef url(common/lib/ext/resources/images/default/grid/row-over.gif) repeat-x left top;
	padding: 4px;
}

#tab11_item .x-view-selected{
	background: #eff5fb url(themes/default/images/selected.gif) no-repeat right bottom;
	border:1px solid #99bbe8;
	padding: 4px;
}
#tab11_item .x-view-selected .thumb{
	background:transparent;
}
    </style>
<link rel="stylesheet" type="text/css" href="themes/default/css/uploadgoods.css"/>
<script type="text/javascript" src="js/goods/goodslist.js"></script>
<script type="text/javascript" src="js/celltooltip.js"></script>
<script type="text/javascript">
Ext.onReady(function(){
	Ext.QuickTips.init();
	var allaccount = [<?php echo $this->_tpl_vars['allaccount']; ?>
];
	var goods_status = [<?php echo $this->_tpl_vars['goods_status']; ?>
];
	var goods_cat = [<?php echo $this->_tpl_vars['goods_cat']; ?>
];
	var goods_brand = [<?php echo $this->_tpl_vars['goods_brand']; ?>
];
	var languages = [<?php echo $this->_tpl_vars['languages']; ?>
];
	var sizedata = [<?php echo $this->_tpl_vars['goods_size']; ?>
];
	var colordata = [<?php echo $this->_tpl_vars['goods_color']; ?>
];
	var aliaccount = [<?php echo $this->_tpl_vars['aliaccount']; ?>
];
	var user_action = object_Array([<?php echo $this->_tpl_vars['user_action']; ?>
]);
	goods_status.push(['0','All Status']);
	allaccount.push(['0','All Officers']);
	var sizecombo = newcombo(sizedata);
	var colorbombo = newcombo(colordata);
	function sizing(v){
		return object_Array(sizedata)[v];
		}
	function coloring(v){
		return object_Array(colordata)[v];
		}
	function newcombo(sdata){
		return new Ext.form.ComboBox({
						typeAhead: true,
						triggerAction: 'all',
						mode: 'local',
						store: Ext.create('Ext.data.ArrayStore',{
							id: 0,
							fields: [
								'myId',
								'displayText'
							],
							data: sdata
						}),
						width:250,
						editable:false,
						valueField: 'myId',
						displayField: 'displayText',
						lazyRender: true,
						listClass: 'x-combo-list-small'
					});
	}
	function showStatus(val){
		return object_Array(goods_status)[val];
	}
	function alicombo(){
		return new Ext.form.ComboBox({
						typeAhead: true,
						triggerAction: 'all',
						mode: 'local',
						store: Ext.create('Ext.data.ArrayStore',{
							id: 0,
							fields: [
								'myId',
								'displayText'
							],
							data: aliaccount
						}),
						width:250,
						editable:false,
						valueField: 'myId',
						displayField: 'displayText',
						lazyRender: true,
						listClass: 'x-combo-list-small'
					});
	}
	goods_cat.push(['0','所有分类']);
	goods_brand.push(['0','所有品牌']);
	function showgroup(v){
		return (v == 0)?'NO':'Yes';
	}
	var viewport = Ext.create('Ext.ux.GoodsView',{
		headers:['goods_id','产品编码', '名称','SKU','库存位置','库存数量','库存下限','所属分类','状态','录入时间'],
        fields: ['goods_id','goods_sn','goods_name','SKU','stock_place','goods_qty','warn_qty','cat_name','status','add_time'],
		renderers:[showStatus,showgroup],
		arrdata:[goods_status,goods_cat,goods_brand,languages,aliaccount,allaccount],
		listURL:'index.php?model=goods&action=getgoodslist',
		catTreeURL:'index.php?model=goods&action=getcattree&com=1',
		updatesurl:'index.php?model=goods&action=Uploadgoodsimg',
		windowTitle:'高级搜索',
		rendererlist:[sizing,coloring],
		windowWidth:320,
		windowHeight:300,
		action:user_action,
		pagesize:15
	});
	loadend();
});
</script>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>