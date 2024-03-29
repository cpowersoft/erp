/**
 * @class Ext.chooser.InfoPanel
 * @extends Ext.panel.Panel
 * @author Ed Spencer
 * 
 * This panel subclass just displays information about an image. We have a simple template set via the tpl property,
 * and a single function (loadRecord) which updates the contents with information about another image.
 */
Ext.define('Ext.chooser.InfoPanel', {
    extend: 'Ext.panel.Panel',
    alias : 'widget.infopanel',
    id: 'img-detail-panel',

    width: 150,
    minWidth: 150,

    tpl: [
        '<div class="details" style="padding:10px">',
            '<tpl for=".">',
                    (!Ext.isIE6? '<img height="75px" width="75px" src="{thumb}" />' : 
                    '<div style="width:74px;height:74px;filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src={thumb})"></div>'),
                '<div class="details-info">',
                    '<b>图片名称:</b>',
                    '<span>{name}</span>',
                    '<b>URL:</b>',
                    '<span><a href="http://dev.sencha.com/deploy/touch/examples/{url}" target="_blank">{url}</a></span>',
                    '<b>大小:</b>',
                    '<span>{type}</span>',
                '</div>',
            '</tpl>',
        '</div>'
    ],
    
    afterRender: function(){
        this.callParent();
        if (!Ext.isWebKit) {
            this.el.on('click', function(){
                alert('The Sencha Touch examples are intended to work on WebKit browsers. They may not display correctly in other browsers.');
            }, this, {delegate: 'a'});
        }    
    },

    /**
     * Loads a given image record into the panel. Animates the newly-updated panel in from the left over 250ms.
     */
    loadRecord: function(image) {
        this.body.hide();
        this.tpl.overwrite(this.body, image.data);
        this.body.slideIn('l', {
            duration: 150
        });
    },
    
    clear: function(){
        this.body.update('');
    }
});