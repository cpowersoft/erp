<?php /* Smarty version 2.6.14, created on 2015-08-28 13:37:04
         compiled from goods/attribute.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script type="text/javascript" src="js/normalgrid.js"></script>
<script type="text/javascript" src="js/goods/attribute.js"></script>
<script type="text/javascript">
var languages = object_Array([<?php echo $this->_tpl_vars['languages']; ?>
]);
function language_value(v) {
	return languages[v];
}
var option = object_Array([<?php echo $this->_tpl_vars['option']; ?>
]);
function language_option(v) {
	return option[v];
}
var tag = object_Array([<?php echo $this->_tpl_vars['tag']; ?>
]);
function language_tag(v) {
	return tag[v];
}
var option_value = [['1','是'],['0','否']];
var en_type = [<?php echo $this->_tpl_vars['attribute_option_type']; ?>
];
var en_type_all = [<?php echo $this->_tpl_vars['attribute_option_type']; ?>
];
en_type_all.push(['0','所有类型']);
Ext.onReady(function(){
	Ext.QuickTips.init();
    var AttributeGrid = Ext.create('Ext.ux.AttributeGrid',{
        title: '产品属性列表',
		id:'attrgrid',
		headers:['序号','属性编码','属性标签','是否必填','是否唯一','属性标签类型','提示更新','属性备注'],
        fields: ['attribute_id','attribute_code','attribute_label','default_value','is_required','is_unique','type_name','is_update_notice','note','entity_type_id','1_tag','2_tag','3_tag','4_tag','5_tag','6_tag','7_tag','8_tag','9_tag','10_tag'],
		autoWidht:true,
		frame:true,
		saveURL:'index.php?model=attribute&action=update',
		delURL:'index.php?model=attribute&action=delete',
		listURL:'index.php?model=attribute&action=list',
		windowTitle:'产品属性',
		windowWidth:420,
		autoHeight:true,
        renderTo: document.body
    });
	
    var AttributeValueGrid = Ext.create('Ext.ux.AttributeValueGrid',{
		id:'AttributeValueGrid',
        title: '产品属性值列表',
		headers:['序号','值','翻译状态','描述'],
        fields: ['value_id','value','option_id','is_default','language_id','2_value','3_value','4_value','5_value','6_value','7_value','8_value','9_value','10_value'],
		frame:true,
		pagesize:10,
		autoExpandColumn:'value',
		saveURL:'index.php?model=attribute&action=saveattrvalue',
		delURL:'index.php?model=attribute&action=valuedelete',
		clearURL:'index.php?model=attribute&action=valueclear',
		listURL:'index.php?model=attribute&action=getvaluelist',
		valueURL:'index.php?model=attribute&action=valueupdate',
		setURL:'index.php?model=attribute&action=setdefault',
        renderTo: document.body
    });
	AttributeGrid.getStore().load({
			params:{start:0,limit:AttributeGrid.pagesize}
			});	
	loadend();
});
</script>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>