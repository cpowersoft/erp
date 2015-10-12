<?php /* Smarty version 2.6.14, created on 2015-08-28 10:16:46
         compiled from goods/category.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <style type="text/css">
        body .x-panel {
            margin:0;
        }
    </style>
<script type="text/javascript" src="js/normalgrid.js"></script>
<script type="text/javascript" src="js/goods/category.js"></script>
<script type="text/javascript">
var account = [<?php echo $this->_tpl_vars['allaccount']; ?>
];
var all_account = [<?php echo $this->_tpl_vars['allaccount']; ?>
];
all_account.push(['0','请选择']);
var group = [<?php echo $this->_tpl_vars['group']; ?>
];
var value = object_Array([<?php echo $this->_tpl_vars['value']; ?>
]);
Ext.onReady(function() {
	Ext.QuickTips.init();
	Ext.form.Field.prototype.msgTarget = 'side';
    var CategoryGrid = Ext.create('Ext.ux.CategoryGrid',{
		id:'CategoryGrid',
        title: '产品分类列表',
		headers:['序号','分类代码','分类','运费','包装费','申报价值','报关英文名称','报关中文名称','海关编码','采购员','产品开发员','产品运营员','产品质检员','产品侵权审核员','所属分类','parent_id','haschild','ali_cat_id','attribute_group_id'],
        fields: ['cat_id','code','cat_name','shipping_fee','package_fee','Declared_value','dec_cn_name','dec_en_name','customs_code','parent_name','parent_id','haschild','ali_cat_id','attribute_group_id','product_purchaser','products_developers','product_operation','product_quality_inspector','product_rights_checker'],
		frame:true,
		arr_data:[account],
		saveURL:'index.php?model=goods&action=catupdate',
		delURL:'index.php?model=goods&action=catdel',
		listURL:'index.php?model=goods&action=catList',
		windowTitle:'产品分类',
		windowWidth:650,
        renderTo: document.body
    });
	
	CategoryGrid.getStore().load({
			params:{start:0,limit:CategoryGrid.pagesize}
			});
	loadend();
});
    </script>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>