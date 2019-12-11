$(document).ready(function () {
    $("select, .filtro").on('change', function () {
        window.LaravelDataTables["dataTableBuilder"].draw();
    });
});
