<?php /* Smarty version 2.6.14, created on 2015-08-11 15:02:21
         compiled from order/collation.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script type="text/javascript" src="js/normalgrid.js"></script>
<script type="text/javascript" src="js/order/collation.js"></script>
<script type="text/javascript">
Ext.onReady(function(){
    Ext.QuickTips.init();
    Ext.form.Field.prototype.msgTarget = 'side';
    var OutdepotGrid = Ext.create('Ext.ux.OutdepotGrid',{
        id:'OutdepotGrid',
        title: '订单核对',
        headers:['id','产品编码','产品名称','库存位置','申请出库量','实际库存量','订单金额','账号','国家','链接','付款时间','发货方式'],
        fields: ['id','goods_img','goods_sn','goods_name', 'stock_place','out_qty','goods_qty','order_amount','sellerID','country','url','paid_time','shipping'],
        autoWidth:true,
        frame:true,
        listURL:'index.php?model=order&action=getcollation',
        checkURL:'index.php?model=order&action=checkcollation',
        costURL:'index.php?model=order&action=collationCost',
        renderTo: document.body
    });
    
    var simple = Ext.create('Ext.form.Panel',{
        labelWidth: 75,
        frame:true,
        title: '直接扫描录入追踪单号',
        bodyStyle:'padding:5px 5px 0',
        width: 350,
        defaults: {width: 150},
        defaultType: 'textfield',
        renderTo:document.body,
        items: [{
                fieldLabel: '订单号',
                xtype: 'textfield',
                width:250,
                enableKeyEvents:true,
                id:'order_sn',
                listeners:{
                    scope:this,
                    keypress:function(field,e){
                        var keyword = field.getValue();
                        if(e.getKey()==13 && keyword.length > 0){
                            keyword = keyword.replace(/#/,'%23');
                                Ext.Ajax.request({
                                       url: 'index.php?model=order&action=checkOrder&key='+keyword,
                                        success:function(response,opts){
                                            var res = Ext.decode(response.responseText);
                                            var weightid = Ext.getCmp('track_no');
                                                if(res.success){
                                                    weightid.setVisible(true);
                                                    weightid.setValue(res.msg);
                                                    weightid.focus();
                                                }else{
                                                    weightid.setVisible(false);
                                                    weightid.setValue(' ');
                                                    Ext.example.msg('ERROR',res.msg);
                                                    field.setValue('');
                                                    field.focus();
                                                }                        
                                            }
                                        });
                            }
                    }
                }
            },{
                fieldLabel: '追踪单号',
                xtype: 'textfield',
                hidden:true,
                width:250,
                hideMode:'visibility',
                enableKeyEvents:true,
                id:'track_no',
                listeners:{
                    scope:this,
                    keypress:function(field,e){
                        var keyword = field.getValue();
                        if(e.getKey()==13 ){
                                Ext.Ajax.request({
                                       url: 'index.php?model=order&action=savetrack&order_sn='+Ext.getCmp('order_sn').getValue()+'&track_no='+keyword,
                                        success:function(response,opts){
                                            var res = Ext.decode(response.responseText);
                                                if(res.success){
                                                    Ext.example.msg('提示','成功');
                                                    var orderid = Ext.getCmp('order_sn');
                                                    field.setVisible(false);
                                                    field.setValue('');
                                                    orderid.setValue('');
                                                    orderid.focus();
                                                }else{
                                                    Ext.example.msg('ERROR',res.msg);
                                                    field.setValue('');
                                                    field.focus();
                                                }                        
                                            }
                                        });
                            }
                    }
                }
            }
        ]
    });
    loadend();
});
</script>
<audio src="themes/default/images/failed.wav" id = 'sound2'>
您的浏览器不支持 audio 标签。
</audio>
<audio src="themes/default/images/success.wav" id = 'sound1'>
您的浏览器不支持 audio 标签。
</audio>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>