$("#dataTableBuilder").on("draw.dt", function (e, data) {
    if (data._iRecordsDisplay === 0) {
        $("#dataTableBuilder").DataTable().buttons(".buttons-print").disable();//Print
        $("#dataTableBuilder").DataTable().buttons(".buttons-collection").disable();//Export
    } else {
        $("#dataTableBuilder").DataTable().buttons(".buttons-print").enable();//Print
        $("#dataTableBuilder").DataTable().buttons(".buttons-collection").enable();//Export
    }
});
