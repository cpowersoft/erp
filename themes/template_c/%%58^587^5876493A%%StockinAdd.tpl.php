<?php /* Smarty version 2.6.14, created on 2015-08-10 10:52:39
         compiled from Inventory/StockinAdd.tpl */ ?>
﻿<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $this->_tpl_vars['cfg']['page']['title']; ?>
</title>
<meta name="description" content="" />
<meta name="keywords" content="" />
<link rel="stylesheet" type="text/css" href="common/lib/ext/resources/css/ext-all.css"/>
<link rel="stylesheet" type="text/css" href="common/lib/ext/resources/css/xtheme-gray.css"/>
<link rel="stylesheet" type="text/css" href="themes/default/css/common.css"/>
<script type="text/javascript" src="common/lib/ext/adapter/ext/ext-base.js"></script>
<script type="text/javascript" src="common/lib/ext/ext-all.js"></script>
<!--<script type="text/javascript" src="common/lib/ext/ext-all-debug.js"></script>-->
<script type="text/javascript" src="common/js/common1.js"></script>
<script type="text/javascript">
Ext.BLANK_IMAGE_URL = '<?php echo @CFG_PATH_IMAGES; ?>
s.gif';
</script>
</head>
<body>
<script type="text/javascript" src="js/billform-ext.js"></script>
<script type="text/javascript">
Ext.onReady(function(){
var orderinfo = eval(<?php echo $this->_tpl_vars['order']; ?>
);
var order_status = [<?php echo $this->_tpl_vars['order_status']; ?>
];
var Sales_channels = [<?php echo $this->_tpl_vars['Sales_channels']; ?>
];
var stocktype = [<?php echo $this->_tpl_vars['stockin_type']; ?>
];
var depot = [<?php echo $this->_tpl_vars['depot']; ?>
];
var pid = [<?php echo $this->_tpl_vars['pid']; ?>
];
	var user_action = object_Array([<?php echo $this->_tpl_vars['user_action']; ?>
]);
	Ext.QuickTips.init();
	var StockinForm = new Ext.ux.BillForm({
		title:'<center><b>'+((orderinfo.order_id)?'编辑入库单':'新增入库单')+':'+orderinfo.order_sn+'</b></center>',
		border:true,
		labelAlign: 'right',
        labelWidth: 75,
		saveURL:'index.php?model=stockin&action=save',
		addURL:'index.php?model=stockin&action=add',
		goodsURL:'index.php?model=Stockin&action=getgoods&<?php echo $this->_tpl_vars['from']; ?>
',
		delURL:'index.php?model=Stockin&action=delgoods',
		listSupplierURL:'index.php?model=supplier&action=userlist',
		listUserURL:'index.php?model=User&action=UserList',
		goodsgirdURL:'index.php?model=goods&action=getgoodslist',
		catTreeURL:'index.php?model=goods&action=getcattree',
		orderstatus:order_status,
		stocktype:stocktype,
		depot:depot,
		action:user_action,
		inout:1,
		pid:pid,
		Sales_channels:Sales_channels,
        autoWidth: true,
		autoHeight:true,
		order:orderinfo,
		renderTo:document.body
	});
	loadend();
});
</script>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>