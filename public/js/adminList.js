function confirmDelete(itemId) {
    // console.log(itemId);
    var deleteUrl = "destroy/".itemId;
    $.ajax({
        url: deleteUrl,
        type: "DELETE",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (data) {
            // Handle success (e.g., remove item from UI)
            $("#deleteModal" + itemId).modal("hide");
            // Add any other UI update logic as needed
        },
        error: function (xhr, status, error) {
            console.error(xhr.responseText);
            // Handle error (e.g., show an error message)
        },
    });
}
