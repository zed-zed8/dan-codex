document.querySelectorAll(".dropdown-item").forEach((item) => {
	item.addEventListener("click", function (e) {
		e.preventDefault();

		let selectedText = this.textContent;
		let selectedValue = this.getAttribute("data-value");

		// Log value
		console.log("selectedText:", selectedText);
		console.log("User selected ID:", selectedValue);

		// mendapatkan semua produk
		let produk = [];
		document.querySelectorAll("[name='produk']").forEach((prdk) => {
			// console.log(prdk);
			produk.push(prdk);
		});
		// console.log(produk);

		// sortir bedasarkan nama
		if (selectedValue == "a-z" || selectedValue == "z-a") {
			let nama_produk = [];
			document
				.querySelectorAll("[name='nama-produk']")
				.forEach((name) => {
					// console.log(name);
					// console.log(name.textContent.trim());
					nama_produk.push(name.textContent.trim());
				});

			// ascending
			if (selectedValue == "a-z") {
				nama_produk.sort((a, b) => a.localeCompare(b));
			}
			// descending
			if (selectedValue == "z-a") {
				nama_produk.sort((a, b) => b.localeCompare(a));
			}
			// console.log(nama_produk);

			let produk_ordered = [];
			let no = 0;
			produk.forEach(() => produk_ordered.push(no++));
			produk.forEach((prdk) => {
				// console.log(prdk.querySelector("[name='nama-produk']").textContent.trim());
				nama_produk.forEach((name) => {
					if (
						prdk
							.querySelector("[name='nama-produk']")
							.textContent.trim() == name
					) {
						produk_ordered[nama_produk.indexOf(name)] = prdk;
					}
				});
			});
			console.log(produk_ordered);

			produk_data = document.querySelector("[name='produk-data']");
			produk_data.append(...produk_ordered);
		}

		// sortir bedasarkan harga
		if (selectedValue == "mahal" || selectedValue == "murah") {
			let harga_produk = [];
			document
				.querySelectorAll("[name='harga-produk']")
				.forEach((harga) => {
					// console.log(harga);
					// console.log(harga.textContent.trim());
					harga_produk.push(
						harga.textContent
							.trim()
							.substring(3)
							.replaceAll(".", ""),
					);
				});

			// ascending
			if (selectedValue == "mahal") {
				harga_produk.sort((a, b) => a - b);
			}
			// descending
			if (selectedValue == "murah") {
				harga_produk.sort((a, b) => b - a);
			}
			console.log("harga: " + harga_produk);

			let produk_ordered = [];
			let no = 0;
			produk.forEach(() => produk_ordered.push(no++));
			produk.forEach((prdk) => {
				// console.log(prdk.querySelector("[name='harga-produk']").textContent.trim());
				harga_produk.forEach((harga) => {
					if (
						prdk
							.querySelector("[name='harga-produk']")
							.textContent.trim()
							.substring(3)
							.replaceAll(".", "") == harga
					) {
						produk_ordered[harga_produk.indexOf(harga)] = prdk;
					}
				});
				console.log(
					prdk
						.querySelector("[name='harga-produk']")
						.textContent.trim()
						.substring(3)
						.replaceAll(".", ""),
				);
			});

			console.log(produk_ordered);

			produk_data = document.querySelector("[name='produk-data']");
			produk_data.append(...produk_ordered);
		}
	});
});

// console.log("test");
