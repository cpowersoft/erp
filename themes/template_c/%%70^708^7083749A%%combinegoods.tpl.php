<?php /* Smarty version 2.6.14, created on 2015-09-15 12:07:24
         compiled from goods/combinegoods.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script type="text/javascript" src="js/FCKeditor/fckeditor.js"></script>
<script type="text/javascript" src="js/Ext.FCKeditor.js"></script>
<script type="text/javascript" src="js/goods/combinegoodsform.js"></script>
<script type="text/javascript">
Ext.onReady(function(){
	Ext.QuickTips.init();
	var goods_status = [<?php echo $this->_tpl_vars['goods_status']; ?>
];
	var goods_cat = [['65535','组合产品']];
	var goods_brand = [<?php echo $this->_tpl_vars['goods_brand']; ?>
];
	var orderform = Ext.create('Ext.ux.goodsForm',{
		title:'产品信息',
		border:true,
		region:'center',
		labelAlign: 'right',
        labelWidth: 75,
		catURL:'index.php?model=goods&action=catList',
		brandURL:'index.php?model=goods&action=brandList',
		listURL:'index.php?model=goods&action=getcomgoods',
		goodsURL:'index.php?model=goods&action=getgoodslist',
		catTreeURL:'index.php?model=goods&action=getcattree',
		goods_data:[goods_status,goods_cat,goods_brand],
        autoWidth: true,
		autoHeight:true,
		renderTo:document.body
	});
	var tippanel = Ext.create('Ext.panel.Panel',{
				autoHeight:true,
				renderTo:document.body,
				html:'状态说明:<br>1.产品编码---如不填写，系统将会根据产品分类自动生成唯一的产品编码<br>2.SKU---如不填写，系统将会自动等同于产品编码<br>3.刊登描述---请等待网页编辑器加载完成再进行切换标签页面<br>'			
	});
	loadend();
});
</script>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>