<div class="content-wrapper bg-white pt-4">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>TEST</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card my-shadow mb-4 h-auto">
                <div id="luckysheet" style="margin:0;padding:0;position:absolute;width:100%;height:500px;">
                </div>
            </div>
        </div>
    </section>
</div>

<!-- demo feature, non-production use -->
<script src="<?= base_url() ?>/assets/plugins/luckysheet/src/demoData/sheetFormula.js"></script>
<script src="<?= base_url() ?>/assets/plugins/luckysheet/src/demoData/sheetCell.js"></script>
<script src="<?= base_url() ?>/assets/plugins/luckysheet/src/demoData/sheetConditionFormat.js"></script>
<script src="<?= base_url() ?>/assets/plugins/luckysheet/src/demoData/sheetTable.js"></script>
<script src="<?= base_url() ?>/assets/plugins/luckysheet/src/demoData/sheetComment.js"></script>
<script src="<?= base_url() ?>/assets/plugins/luckysheet/src/demoData/sheetPivotTableData.js"></script>
<script src="<?= base_url() ?>/assets/plugins/luckysheet/src/demoData/sheetPivotTable.js"></script>
<script src="<?= base_url() ?>/assets/plugins/luckysheet/src/demoData/sheetSparkline.js"></script>
<script src="<?= base_url() ?>/assets/plugins/luckysheet/src/demoData/sheetChart.js"></script>
<script src="<?= base_url() ?>/assets/plugins/luckysheet/src/demoData/sheetPicture.js"></script>
<script src="<?= base_url() ?>/assets/plugins/luckysheet/src/demoData/sheetDataVerification.js"></script>
<script>
    $(function () {
        // According to the browser language
        //var lang = luckysheetDemoUtil.language() === 'zh' ? 'zh' : 'en';
        var options = {
            container: 'luckysheet',
            showinfobar: false,
            showtoolbar: false,
            sheetFormulaBar: false,
            enableAddRow: false,
            fullscreenmode: false,
            //lang: 'en',
            //forceCalculation:false,
            //plugins: ['chart'],
            /*
            fontList:[
                {
                    "fontName":"HanaleiFill",
                    "url": base_url+"assets/plugins/luckysheet/src/assets/iconfont/HanaleiFill-Regular.ttf"
                },
                {
                    "fontName":"Anton",
                    "url": base_url+"assets/plugins/luckysheet/src/assets/plugins/luckysheet/src/assets/iconfont/Anton-Regular.ttf"
                },
                {
                    "fontName":"Pacifico",
                    "url": base_url+"assets/plugins/luckysheet/src/assets/plugins/luckysheet/src/assets/iconfont/Pacifico-Regular.ttf"
                }
            ],
            /*
            hook:{
                rowTitleCellRenderBefore:function(rowNum,postion,ctx){
                    // console.log(rowNum);
                },
                rowTitleCellRenderAfter:function(rowNum,postion,ctx){
                    // console.log(ctx);
                },
                columnTitleCellRenderBefore:function(columnAbc,postion,ctx){
                    // console.log(columnAbc);
                },
                columnTitleCellRenderAfter:function(columnAbc,postion,ctx){
                    // console.log(postion);
                },
                cellRenderBefore:function(cell,postion,sheetFile,ctx){
                    // console.log(cell,postion,sheetFile,ctx);
                },
                cellRenderAfter:function(cell,postion,sheetFile,ctx){
                    // console.log(postion);
                },
                cellMousedownBefore:function(cell,postion,sheetFile,ctx){
                    // console.log(postion);
                },
                cellMousedown:function(cell,postion,sheetFile,ctx){
                    // console.log(sheetFile);
                },
                sheetMousemove:function(cell,postion,sheetFile,moveState,ctx){
                    // console.log(cell,postion,sheetFile,moveState,ctx);
                },
                sheetMouseup:function(cell,postion,sheetFile,moveState,ctx){
                    // console.log(cell,postion,sheetFile,moveState,ctx);
                },
                cellAllRenderBefore:function(data,sheetFile,ctx){
                    // console.info(data,sheetFile,ctx)
                },
                updated:function(operate){
                    // console.info(operate)
                },
                cellUpdateBefore:function(r,c,value,isRefresh){
                    // console.info('cellUpdateBefore',r,c,value,isRefresh)
                },
                cellUpdated:function(r,c,oldValue, newValue, isRefresh){
                    // console.info('cellUpdated',r,c,oldValue, newValue, isRefresh)
                },
                sheetActivate:function(index, isPivotInitial, isNewSheet){
                    // console.info(index, isPivotInitial, isNewSheet)
                },
                rangeSelect:function(index, sheet){
                    // console.info(index, sheet)
                },
                commentInsertBefore:function(r, c){
                    // console.info(r, c)
                },
                commentInsertAfter:function(r, c, cell){
                    // console.info(r, c, cell)
                },
                commentDeleteBefore:function(r, c, cell){
                    // console.info(r, c, cell)
                },
                commentDeleteAfter:function(r, c, cell){
                    // console.info(r, c, cell)
                },
                commentUpdateBefore:function(r, c, value){
                    // console.info(r, c, value)
                },
                commentUpdateAfter:function(r, c, oldCell, newCell ){
                    // console.info(r, c, oldCell, newCell)
                },
                cellEditBefore:function(range ){
                    // console.info(range)
                },
                workbookCreateAfter:function(json){
                    // console.info(json)
                },


            },
            */
            /*
            data: [
                sheetCell,
                //sheetFormula,
                //sheetConditionFormat,
                //sheetSparkline,
                //sheetTable,
                //sheetComment,
                //sheetPivotTableData,
                //sheetPivotTable,
                //sheetChart,
                //sheetPicture,
                //sheetDataVerification
            ]*/
        };
        luckysheet.create(options);

    })
</script>
