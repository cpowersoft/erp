<?php /* Smarty version 2.6.14, created on 2015-08-10 10:41:46
         compiled from purchase/purchaseorderAdd.tpl */ ?>
<html>
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
<script type="text/javascript" src="js/purchase/purchaseorderform.js"></script>
<script type="text/javascript">
Ext.onReady(function(){
var orderinfo = eval(<?php echo $this->_tpl_vars['order']; ?>
);
var order_status = [<?php echo $this->_tpl_vars['order_status']; ?>
];
	Ext.QuickTips.init();
	var PorderForm = new Ext.ux.PorderForm({
		title:'<center><b>'+((orderinfo.order_id)?'编辑采购订单':'新增采购订单')+':'+orderinfo.order_sn+'</b></center>',
		border:true,
		labelAlign: 'right',
        labelWidth: 75,
		goodsURL:'index.php?model=Purchaseorder&action=getgoods',
		delURL:'index.php?model=Purchaseorder&action=delgoods',
		listSupplierURL:'index.php?model=supplier&action=userlist',
		listUserURL:'index.php?model=User&action=UserList',
		goodsgirdURL:'index.php?model=goods&action=getgoodslist',
		catTreeURL:'index.php?model=goods&action=getcattree',
		order:orderinfo,
		orderstatus:order_status,
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