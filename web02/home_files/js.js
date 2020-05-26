// JavaScript Document
function lo(th, url) {
	$.ajax(url, { cache: false, success: function (x) { $(th).html(x) } })
}
function good(id, type) {
	$.post(`api.php?do=${type}`, { "id": id }, function () {
		if (type == "gdadd") {
			$("#vie" + id).text($("#vie" + id).text() * 1 + 1)
			$("#good" + id).text("收回讚").attr("onclick", "good('" + id + "','gdsub')")
		}
		else {
			$("#vie" + id).text($("#vie" + id).text() * 1 - 1)
			$("#good" + id).text("讚").attr("onclick", "good('" + id + "','gdadd')")
		}
	})
}