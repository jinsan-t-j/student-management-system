/*
 *  Document   : tables_datatables.js
 *  Author     : Jinsan T J
 *  Description: Custom JS code used in Plugin Init Example Page
 */

const { data } = require("jquery");

// DataTables, for more examples you can check out https://www.datatables.net/
class pageTablesDatatables {
    /*
     * Init DataTables functionality
     *
     */
    static initDataTables() {
        // Override a few DataTable defaults
        jQuery.extend(jQuery.fn.dataTable.ext.classes, {
            sWrapper: "dataTables_wrapper dt-bootstrap4"
        });

        $(function () {
            var tables = $('#students').dataTable({
                processing: true,
                serverSide: true,
                ajax: $("#students").data('url'),
                columns: [
                    { data: "DT_RowIndex", name: 'DT_RowIndex', orderable: false, searchable: false },
                    { data: "Name", name: 'Name', searchable: true },
                    { data: "Age", name: 'Age', searchable: true },
                    { data: "Gender", name: 'Gender', searchable: true },
                    { data: "Reporting Teacher", name: 'Reporting Teacher', searchable: true },
                    { data: 'Action', name: 'Action', orderable: false, searchable: false },
                ],
                columnDefs: [
                    { className: 'text-center', targets: [0, 1, 2 , 3, 4] },
                ]
            })
        });

        $(document).on("click", ".tile-picker input", function (e) {
            if ($(this).is(":checked")) {
                $(this).closest(".tile-picker").addClass("active");
            } else {
                $(this).closest(".tile-picker").removeClass("active");
            }
        });

    }

    /*
     * Init functionality
     *
     */
    static init() {
        this.initDataTables();
    }
}

// Initialize when page loads
jQuery(() => { pageTablesDatatables.init(); });
