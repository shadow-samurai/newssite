
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                مدیریت کاربران
            </header>
            <div class="panel-body">
                <div id="jqGrid_container">
                <table id="jqGrid"></table>
                <div id="jqGridPager"></div>
            </div>
            <script type="text/javascript">
            $(document).ready(function () {
            var template = "<div style='margin-left:15px;'>";
                template += "<div> username: </div><div>{usrname} </div>";
                template += "<div> password: </div><div>{password} </div>";
                // template += "<div> make date </div><div>{PostalCode} </div>";
                template += "<div> role</div><div> {role} </div>";
                template += "<hr style='width:100%;'/>";
                template += "<div> {sData} {cData}  </div></div>";
                $("#jqGrid").jqGrid({
                url: 'users_query.php?type=showallusers',
                // we set the changes to be made at client side using predefined word clientArray
                editurl: 'clientArray',
                datatype: "json",
                colModel: [
                {
                label: 'ID',
                name: 'id',
                width: 40,
                key: true,
                editable: true,
                editrules : { required: true}
                },
                {
                label: 'UserName',
                name: 'username',
                width: 100,
                editable: true
                },
                {
                label : 'Password',
                name: 'password',
                width: 100,
                editable: true
                },
                {
                label: 'Make Date',
                name: 'make_date',
                width: 80,
                editable: true
                },
                {
                label: 'Role',
                name: 'role',
                width: 50,
                editable: true
                }
                ],
                shrinkToFit: true,
                autowidth: true,
                sortname: 'id',
                sortorder : 'asc',
                loadonce: true,
                viewrecords: true,
                width: "100%",
                height: 200,
                rowNum: 10,
                pager: "#jqGridPager"
                });
                $('#jqGrid').navGrid('#jqGridPager',
                // the buttons to appear on the toolbar of the grid
                { edit: true, add: true, del: true, search: false, refresh: false, view: false, position: "left", cloneToTop: false },
                // options for the Edit Dialog
                {
                editCaption: "The Edit Dialog",
                template: template,
                errorTextFormat: function (data) {
                return 'Error: ' + data.responseText
                }
                },
                // options for the Add Dialog
                {
                template: template,
                errorTextFormat: function (data) {
                return 'Error: ' + data.responseText
                }
                },
                // options for the Delete Dailog
                {
                errorTextFormat: function (data) {
                return 'Error: ' + data.responseText
                }
                });
                });
                $(window).bind('resize', function() {
                var width = $('#jqGrid_container').width();
                $('#jqGrid').setGridWidth(width);
                });
                </script>
            </div>
        </section>
    </div>
</div>