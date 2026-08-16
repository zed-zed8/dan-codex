document.getElementById("pay-button").onclick = function () {
	snap.pay('<?= $snap_token ?? "" ?>', {
		onSuccess: function (result) {
			handleRedirect();
		},
		onPending: function (result) {
			handleRedirect();
		},
		onError: function (result) {
			handleRedirect();
		},
	});
};

function handleRedirect() {
	const json = JSON.stringify(result, null, 0);
	window.location =
		"proses.php?jumlah=" + "<?= $_POST['jumlah'] ?>" + "&json=" + json;
	// fetch("proses.php", {
	//     "method": "post",
	//     "headers": {
	//         "content-type": "application/json; charset=utf-8"
	//     },
	//     "body": json
	// });
}
